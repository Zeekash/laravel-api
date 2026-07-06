<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\StateToCityimportJob;
use App\Models\State;
use App\Models\CityPage;
use App\Models\StateToCityRoute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\StateToCityMoveSizeCost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class StateToCityRouteController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any state to city route !');
        }
        $trashedCount = StateToCityRoute::onlyTrashed()->count();

        if ($request->ajax()) {
            $routes = StateToCityRoute::with(['stateFrom', 'cityTo', 'createdBy'])->select('state_to_city_routes.*');
            return DataTables::of($routes)
                ->addIndexColumn()
                ->addColumn('page', function ($r) {
                    return $r->stateFrom && $r->cityTo ? 'Moving from ' . $r->stateFrom->name . ' to ' . $r->cityTo->name : 'N/A';
                })
                ->addColumn('state_from', fn($r) => $r->stateFrom?->name ?? 'N/A')
                ->addColumn('city_to', fn($r) => $r->cityTo?->name ?? 'N/A')
                ->addColumn('created_by', fn($r) => $r->createdBy?->name ?? 'N/A')
                ->addColumn('action', function ($r) {
                    $action = '<div style="display:flex;justify-content:center;">';
                    $action .= '<a class="btn btn-success text-white mr-1" href="' .
                        route('route.dynamic', [
                            strtolower($r->stateFrom->abv),
                            strtolower($r->cityTo->state->abv),
                            $r->stateFrom->slug,
                            $r->cityTo->slug
                        ]) . '" target="_blank"><i class="fa fa-eye"></i></a>';

                    if ($this->user && $this->user->can('state-to-city-route.edit')) {
                        $action .= '<a class="btn btn-primary text-white mr-1" href="' .
                            route('admin.state-to-city-routes.edit', $r->id) .
                            '"><i class="fa fa-edit"></i></a>';
                    }

                    if ($this->user && $this->user->can('state-to-city-route.delete')) {
                        $csrf = csrf_token();
                        $deleteUrl = route('admin.state-to-city-routes.destroy', $r->id);
                        $action .= '<form method="POST" action="' . $deleteUrl . '" style="display:inline-block;margin:0;padding:0;">';
                        $action .= '<input type="hidden" name="_token" value="' . $csrf . '">';
                        $action .= '<input type="hidden" name="_method" value="DELETE">';
                        $action .= '<button type="submit" class="btn btn-danger text-white show_confirm"><i class="fa fa-trash"></i></button>';
                        $action .= '</form>';
                    }

                    $action .= '</div>';
                    return $action;
                })
                ->filterColumn('page', function ($query, $keyword) {
                    $keyword = trim($keyword);
                    $query->whereRaw("CONCAT('Moving from ', (SELECT name FROM states WHERE id = state_to_city_routes.state_from_id), ' to ', (SELECT name FROM city_pages WHERE id = state_to_city_routes.city_to_id)) LIKE ?", ["%{$keyword}%"]);
                })
                ->filterColumn('state_from', function ($query, $keyword) {
                    $query->whereHas('stateFrom', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->filterColumn('city_to', function ($query, $keyword) {
                    $query->whereHas('cityTo', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->filterColumn('created_by', function ($query, $keyword) {
                    $query->whereHas('createdBy', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->orderColumn('page', function ($query, $order) {
                    $query->join('states as sf', 'state_to_city_routes.state_from_id', '=', 'sf.id')
                        ->join('city_pages as ct', 'state_to_city_routes.city_to_id', '=', 'ct.id')
                        ->orderBy('sf.name', $order)
                        ->orderBy('ct.name', $order)
                        ->select('state_to_city_routes.*');
                })
                ->orderColumn('state_from', function ($query, $order) {
                    $query->join('states as sf2', 'state_to_city_routes.state_from_id', '=', 'sf2.id')
                        ->orderBy('sf2.name', $order)
                        ->select('state_to_city_routes.*');
                })
                ->orderColumn('city_to', function ($query, $order) {
                    $query->join('city_pages as ct2', 'state_to_city_routes.city_to_id', '=', 'ct2.id')
                        ->orderBy('ct2.name', $order)
                        ->select('state_to_city_routes.*');
                })
                ->orderColumn('created_by', function ($query, $order) {
                    $query->leftJoin('admins as admin', 'state_to_city_routes.create_by_id', '=', 'admin.id')
                        ->orderBy('admin.name', $order)
                        ->select('state_to_city_routes.*');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $routesCount = StateToCityRoute::count();



        return view('backend.pages.route_modules.state-to-city-routes.index', compact('routesCount', 'trashedCount'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any state to city route !');
        }
        $states = State::all();
        $cities = CityPage::all();
        return view('backend.pages.route_modules.state-to-city-routes.create', compact('states', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_from_id' => [
                'required',
                Rule::unique('state_to_city_routes')->where(function ($query) use ($request) {
                    return $query->where('state_from_id', $request->state_from_id)
                                ->where('city_to_id', $request->city_to_id);
                }),
            ],
            'city_to_id' => 'required',
        ],
        [
            'state_from_id.unique' => 'This state to city route already exists.',
        ]);

        $route = new StateToCityRoute();
        // $route->title = $request->title;
        // $route->slug = Str::slug($request->slug);
        // $route->meta_title = $request->meta_title;
        // $route->meta_description = $request->meta_description;
        $route->miles = $request->miles;
        // $route->min_cost = $request->min_cost;
        // $route->max_cost = $request->max_cost;
        // $route->upper_content = $request->upper_content;
        // $route->middle_content = $request->middle_content;
        // $route->bottom_content = $request->bottom_content;
        $route->create_by_id = auth()->guard('admin')->id();
        $route->state_from_id = $request->state_from_id;
        $route->city_to_id = $request->city_to_id;
        $route->save();

        Alert::success('Created', 'State To City Route Created Successfully');
        return redirect()->route('admin.state-to-city-routes.index');
    }

    public function edit(StateToCityRoute $stateToCityRoute)
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any state to city route !');
        }
        $states = State::all();
        $cities = CityPage::all();

        return view('backend.pages.route_modules.state-to-city-routes.edit', compact('stateToCityRoute', 'states', 'cities'));
    }

    public function update(Request $request, StateToCityRoute $stateToCityRoute)
    {
        $request->validate([
            'state_from_id' => [
                'required',
                Rule::unique('state_to_city_routes')->where(function ($query) use ($request) {
                    return $query->where('state_from_id', $request->state_from_id)
                                ->where('city_to_id', $request->city_to_id);
                })->ignore($stateToCityRoute->id),
            ],
            'city_to_id' => 'required',
            'miles' => 'nullable',
        ],
        [
            'state_from_id.unique' => 'This State to city route already exists.',
        ]);

        // $stateToCityRoute->title = $request->title;
        // $stateToCityRoute->slug = Str::slug($request->slug);
        // $stateToCityRoute->meta_title = $request->meta_title;
        // $stateToCityRoute->meta_description = $request->meta_description;
        $stateToCityRoute->miles = $request->miles;
        // $stateToCityRoute->min_cost = $request->min_cost;
        // $stateToCityRoute->max_cost = $request->max_cost;
        // $stateToCityRoute->upper_content = $request->upper_content;
        // $stateToCityRoute->middle_content = $request->middle_content;
        // $stateToCityRoute->bottom_content = $request->bottom_content;
        $stateToCityRoute->state_from_id = $request->state_from_id;
        $stateToCityRoute->city_to_id = $request->city_to_id;
        $stateToCityRoute->save();

        Alert::success('Updated', 'State To City Route Updated Successfully');
        return redirect()->route('admin.state-to-city-routes.index');
    }



    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any state to city route !');
        }
        $route = StateToCityRoute::find($id);
        $route->deleted_by_id = auth()->guard('admin')->id();
        $route->save();
        $route->delete();

        Alert::success('Deleted', 'State To City Route Deleted Successfully');
        return redirect()->back();
    }

    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.view-trash')) {
            abort(403, 'Sorry !! You are Unauthorized to view any trash state to city route !');
        }
        $stateToCityRoutes = StateToCityRoute::onlyTrashed()->with('deletedBy')->orderBy('deleted_at', 'desc')->get();
        return view('backend.pages.route_modules.state-to-city-routes.trashed', compact('stateToCityRoutes'));
    }

    public function restore($id)
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.restore')) {
            abort(403, 'Sorry !! You are Unauthorized to restore any state to city route !');
        }
        $stateToCityRoute = StateToCityRoute::withTrashed()->findOrFail($id);
        $stateToCityRoute->deleted_by_id = null;
        $stateToCityRoute->save();
        $stateToCityRoute->restore();
        Alert::success('Restored', 'State To City Route restored successfully.');
        return back();
    }

    public function forceDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.force-delete')) {
            abort(403, 'Sorry !! You are Unauthorized to force delete any state to city route !');
        }
        $stateToCityRoute = StateToCityRoute::withTrashed()->findOrFail($id);

        $stateToCityRoute->forceDelete();
        Alert::success('Deleted', 'State To City Route deleted permanently.');
        return back();
    }

    public function moveSizeCostIndex(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any move size cost !');
        }
        if ($request->ajax()) {
            $move_size_costs = StateToCityMoveSizeCost::query()
                ->with(['stateToCityRoute.stateFrom', 'stateToCityRoute.cityTo'])
                ->select('state_to_city_move_size_costs.*');

            return DataTables::of($move_size_costs)
                ->addIndexColumn()
                ->addColumn('route_title', function ($m) {
                    if ($m->stateToCityRoute?->stateFrom && $m->stateToCityRoute?->cityTo) {
                        return $m->stateToCityRoute->stateFrom->name . ' to ' . $m->stateToCityRoute->cityTo->name;
                    }
                    return 'N/A';
                })
                ->editColumn('moving_company_studio_bedroom', fn($m) => $m->moving_company_studio_bedroom ?? 'Not Provided')
                ->editColumn('moving_container_studio_bedroom', fn($m) => $m->moving_container_studio_bedroom ?? 'Not Provided')
                ->editColumn('rental_truck_studio_bedroom', fn($m) => $m->rental_truck_studio_bedroom ?? 'Not Provided')
                ->editColumn('moving_company_2_3_bedroom', fn($m) => $m->moving_company_2_3_bedroom ?? 'Not Provided')
                ->editColumn('moving_container_2_3_bedroom', fn($m) => $m->moving_container_2_3_bedroom ?? 'Not Provided')
                ->editColumn('rental_truck_2_3_bedroom', fn($m) => $m->rental_truck_2_3_bedroom ?? 'Not Provided')
                ->editColumn('moving_company_4_bedroom', fn($m) => $m->moving_company_4_bedroom ?? 'Not Provided')
                ->editColumn('moving_container_4_bedroom', fn($m) => $m->moving_container_4_bedroom ?? 'Not Provided')
                ->editColumn('rental_truck_4_bedroom', fn($m) => $m->rental_truck_4_bedroom ?? 'Not Provided')
                ->addColumn('action', function ($m) {
                    $action = '';

                    if ($this->user && $this->user->can('state-to-city-route.edit')) {
                        $action .= '<a class="btn btn-primary text-white mr-1" href="' .
                            route('admin.state-to-city-routes.move-size-cost.edit', $m->id) .
                            '"><i class="fa fa-edit"></i></a>';
                    }

                    if ($this->user && $this->user->can('state-to-city-route.delete')) {
                        $csrf = csrf_token();
                        $deleteUrl = route('admin.state-to-city-routes.move-size-cost.destroy', $m->id);
                        $action .= '<form method="POST" action="' . $deleteUrl . '" style="display:inline-block;margin:0;padding:0;">';
                        $action .= '<input type="hidden" name="_token" value="' . $csrf . '">';
                        $action .= '<input type="hidden" name="_method" value="DELETE">';
                        $action .= '<button type="submit" class="btn btn-danger text-white show_confirm"><i class="fa fa-trash"></i></button>';
                        $action .= '</form>';
                    }

                    return '<div style="display:flex;justify-content:center;gap:5px;">' . $action . '</div>';
                })
                ->filterColumn('route_title', function ($query, $keyword) {
                    $keyword = trim($keyword);

                    if (preg_match('/([a-z\s]+?)\s+to\s+([a-z\s]+)/i', $keyword, $matches)) {
                        $fromState = trim($matches[1]);
                        $toCity   = trim($matches[2]);

                        $query->whereHas('stateToCityRoute.stateFrom', fn($q) =>
                            $q->where('name', 'like', "%{$fromState}%")
                        )->whereHas('stateToCityRoute.cityTo', fn($q) =>
                            $q->where('name', 'like', "%{$toCity}%")
                        );
                    } else {
                        $query->where(function ($q) use ($keyword) {
                            $q->whereHas('stateToCityRoute.stateFrom', fn($s) =>
                                $s->where('name', 'like', "%{$keyword}%")
                            )->orWhereHas('stateToCityRoute.cityTo', fn($s) =>
                                $s->where('name', 'like', "%{$keyword}%")
                            );
                        });
                    }
                })
                ->orderColumn('route_title', function ($query, $order) {
                    $query->join('state_to_city_routes as routes', 'routes.id', '=', 'state_to_city_move_size_costs.state_to_city_route_id')
                        ->join('states as sf', 'routes.state_from_id', '=', 'sf.id')
                        ->join('city_pages as ct', 'routes.city_to_id', '=', 'ct.id')
                        ->orderBy('sf.name', $order)
                        ->orderBy('ct.name', $order)
                        ->select('state_to_city_move_size_costs.*');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.route_modules.state-to-city-routes.move-size-cost.index');
    }

    public function moveSizeCostCreate()
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any move size cost !');
        }
        $state_to_city_routes = StateToCityRoute::all();
        return view('backend.pages.route_modules.state-to-city-routes.move-size-cost.create', compact('state_to_city_routes'));
    }

    public function moveSizeCostStore(Request $request)
    {
        $request->validate([
            'state_to_city_route_id' => 'required|unique:state_to_city_move_size_costs,state_to_city_route_id',
        ],
        [
            'state_to_city_route_id.unique' => 'A move size cost record already exists for this route.',
        ]);

        $moveSizeCost = new StateToCityMoveSizeCost();
        $moveSizeCost->state_to_city_route_id = $request->state_to_city_route_id;
        $moveSizeCost->moving_company_studio_bedroom = $request->moving_company_studio_bedroom;
        $moveSizeCost->moving_container_studio_bedroom = $request->moving_container_studio_bedroom;
        $moveSizeCost->rental_truck_studio_bedroom = $request->rental_truck_studio_bedroom;
        $moveSizeCost->moving_company_2_3_bedroom = $request->moving_company_2_3_bedroom;
        $moveSizeCost->moving_container_2_3_bedroom = $request->moving_container_2_3_bedroom;
        $moveSizeCost->rental_truck_2_3_bedroom = $request->rental_truck_2_3_bedroom;
        $moveSizeCost->moving_company_4_bedroom = $request->moving_company_4_bedroom;
        $moveSizeCost->moving_container_4_bedroom = $request->moving_container_4_bedroom;
        $moveSizeCost->rental_truck_4_bedroom = $request->rental_truck_4_bedroom;
        $moveSizeCost->save();

        Alert::success('Created', 'State To City Move Size Cost Created Successfully');
        return redirect()->route('admin.state-to-city-routes.move-size-cost.index');
    }

    public function moveSizeCostEdit(StateToCityMoveSizeCost $moveSizeCost)
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any move size cost !');
        }
        $state_to_city_routes = StateToCityRoute::all();
        return view('backend.pages.route_modules.state-to-city-routes.move-size-cost.edit', compact('moveSizeCost', 'state_to_city_routes'));
    }

    public function moveSizeCostUpdate(Request $request, StateToCityMoveSizeCost $moveSizeCost)
    {
        $request->validate([
            'state_to_city_route_id' => [
                'required',
                Rule::unique('state_to_city_move_size_costs', 'state_to_city_route_id')
                    ->ignore($moveSizeCost->id),
            ],
        ],
        [
            'state_to_city_route_id.unique' => 'A move size cost record already exists for this route.',
        ]);

        $moveSizeCost->state_to_city_route_id = $request->state_to_city_route_id;
        $moveSizeCost->moving_company_studio_bedroom = $request->moving_company_studio_bedroom;
        $moveSizeCost->moving_container_studio_bedroom = $request->moving_container_studio_bedroom;
        $moveSizeCost->rental_truck_studio_bedroom = $request->rental_truck_studio_bedroom;
        $moveSizeCost->moving_company_2_3_bedroom = $request->moving_company_2_3_bedroom;
        $moveSizeCost->moving_container_2_3_bedroom = $request->moving_container_2_3_bedroom;
        $moveSizeCost->rental_truck_2_3_bedroom = $request->rental_truck_2_3_bedroom;
        $moveSizeCost->moving_company_4_bedroom = $request->moving_company_4_bedroom;
        $moveSizeCost->moving_container_4_bedroom = $request->moving_container_4_bedroom;
        $moveSizeCost->rental_truck_4_bedroom = $request->rental_truck_4_bedroom;
        $moveSizeCost->save();

        Alert::success('Updated', 'State To City Move Size Cost Updated Successfully');
        return redirect()->route('admin.state-to-city-routes.move-size-cost.index');
    }

    public function moveSizeCostDestroy($id)
    {
        if (is_null($this->user) || !$this->user->can('state-to-city-route.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any move size cost !');
        }
        $moveSizeCost = StateToCityMoveSizeCost::find($id);
        $moveSizeCost->delete();

        Alert::success('Deleted', 'State To City Move Size Cost Deleted Successfully');
        return redirect()->route('admin.state-to-city-routes.move-size-cost.index');
    }

    // for import 
    public function import(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $filePath = $request->file('file')->store('imports');
        StateToCityimportJob::dispatch($filePath, auth()->id());

        return back()->with('success', 'Import processing, Please wait a few moment ... ');
    }
}
