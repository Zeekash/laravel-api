<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\CityToStateImportJob;
use App\Models\CityPage;
use App\Models\CityToStateMoveSizeCost;
use App\Models\CityToStateRoute;
use App\Models\State;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CityToStateRouteController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any city to state route !');
        }
        $trashedCount = CityToStateRoute::onlyTrashed()->count();

        if ($request->ajax()) {
            $routes = CityToStateRoute::with(['cityFrom', 'stateTo', 'createdBy'])->select('city_to_state_routes.*');
            return DataTables::of($routes)
                ->addIndexColumn()
                ->addColumn('page', function ($r) {
                    return $r->cityFrom && $r->stateTo ? 'Moving from ' . $r->cityFrom->name . ' to ' . $r->stateTo->name : 'N/A';
                })
                ->addColumn('city_from', fn($r) => $r->cityFrom?->name ?? 'N/A')
                ->addColumn('state_to', fn($r) => $r->stateTo?->name ?? 'N/A')
                ->addColumn('created_by', fn($r) => $r->createdBy?->name ?? 'N/A')
                ->addColumn('action', function ($r) {
                    $action = '<div style="display:flex;justify-content:center;">';
                    $action .= '<a class="btn btn-success text-white mr-1" href="' .
                        route('route.dynamic', [
                            strtolower($r->cityFrom->state->abv),
                            strtolower($r->stateTo->abv),
                            $r->cityFrom->slug,
                            $r->stateTo->slug
                        ]) . '" target="_blank"><i class="fa fa-eye"></i></a>';

                    if ($this->user && $this->user->can('city-to-state-route.edit')) {
                        $action .= '<a class="btn btn-primary text-white mr-1" href="' .
                            route('admin.city-to-state-routes.edit', $r->id) .
                            '"><i class="fa fa-edit"></i></a>';
                    }

                    if ($this->user && $this->user->can('city-to-state-route.delete')) {
                        $csrf = csrf_token();
                        $deleteUrl = route('admin.city-to-state-routes.destroy', $r->id);
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
                    $query->whereRaw("CONCAT('Moving from ', (SELECT name FROM city_pages WHERE id = city_to_state_routes.city_from_id), ' to ', (SELECT name FROM states WHERE id = city_to_state_routes.state_to_id)) LIKE ?", ["%{$keyword}%"]);
                })
                ->filterColumn('city_from', function ($query, $keyword) {
                    $query->whereHas('cityFrom', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->filterColumn('state_to', function ($query, $keyword) {
                    $query->whereHas('stateTo', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->filterColumn('created_by', function ($query, $keyword) {
                    $query->whereHas('createdBy', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->orderColumn('page', function ($query, $order) {
                    $query->join('city_pages as cf', 'city_to_state_routes.city_from_id', '=', 'cf.id')
                        ->join('states as st', 'city_to_state_routes.state_to_id', '=', 'st.id')
                        ->orderBy('cf.name', $order)
                        ->orderBy('st.name', $order)
                        ->select('city_to_state_routes.*');
                })
                ->orderColumn('city_from', function ($query, $order) {
                    $query->join('city_pages as cf2', 'city_to_state_routes.city_from_id', '=', 'cf2.id')
                        ->orderBy('cf2.name', $order)
                        ->select('city_to_state_routes.*');
                })
                ->orderColumn('state_to', function ($query, $order) {
                    $query->join('states as st2', 'city_to_state_routes.state_to_id', '=', 'st2.id')
                        ->orderBy('st2.name', $order)
                        ->select('city_to_state_routes.*');
                })
                ->orderColumn('created_by', function ($query, $order) {
                    $query->leftJoin('admins as admin', 'city_to_state_routes.create_by_id', '=', 'admin.id')
                        ->orderBy('admin.name', $order)
                        ->select('city_to_state_routes.*');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $routesCount = CityToStateRoute::count();
        return view('backend.pages.route_modules.city-to-state-routes.index', compact('routesCount', 'trashedCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city to state route!');
        }
        $cities = CityPage::all();
        $states = State::all();
        return view('backend.pages.route_modules.city-to-state-routes.create', compact('cities', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city to state route!');
        }
        $request->validate([
            'city_from_id' => [
                'required',
                Rule::unique('city_to_state_routes')->where(function ($query) use ($request) {
                    return $query->where('city_from_id', $request->city_from_id)
                                ->where('state_to_id', $request->state_to_id);
                }),
            ],
            'state_to_id' => 'required',
            'miles' => 'nullable',
        ],
        [
            'city_from_id.unique' => 'This city to state route already exists.',
        ]);

        $cityToStateRoute = new CityToStateRoute();
        // $cityToStateRoute->title = $request->title;
        // $cityToStateRoute->slug = Str::slug($request->slug);
        // $cityToStateRoute->meta_title = $request->meta_title;
        // $cityToStateRoute->meta_description = $request->meta_description;
        $cityToStateRoute->miles = $request->miles;
        // $cityToStateRoute->min_cost = $request->min_cost;
        // $cityToStateRoute->max_cost = $request->max_cost;
        // $cityToStateRoute->upper_content = $request->upper_content;
        // $cityToStateRoute->middle_content = $request->middle_content;
        // $cityToStateRoute->bottom_content = $request->bottom_content;
        $cityToStateRoute->create_by_id = auth()->guard('admin')->id();
        $cityToStateRoute->city_from_id = $request->city_from_id;
        $cityToStateRoute->state_to_id = $request->state_to_id;
        $cityToStateRoute->save();
        Alert::success('Created', 'City To State Route Created Successfully');
        return redirect()->route('admin.city-to-state-routes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CityToStateRoute $cityToStateRoute)
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit city to state route!');
        }
        $cities = CityPage::all();
        $states = State::all();
        return view('backend.pages.route_modules.city-to-state-routes.edit', compact('cityToStateRoute', 'cities', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityToStateRoute $cityToStateRoute)
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update city to state route!');
        }
        $request->validate([
            'city_from_id' => [
                'required',
                Rule::unique('city_to_state_routes')->where(function ($query) use ($request) {
                    return $query->where('city_from_id', $request->city_from_id)->where('state_to_id', $request->state_to_id);
                })->ignore($cityToStateRoute->id),
            ],
            'state_to_id' => 'required',
            'miles' => 'nullable',
        ],
        [
            'city_from_id.unique' => 'This City to state route already exists.',
        ]);
        
        // $cityToStateRoute->title = $request->title;
        // $cityToStateRoute->slug = Str::slug($request->slug);
        // $cityToStateRoute->meta_title = $request->meta_title;
        // $cityToStateRoute->meta_description = $request->meta_description;
        $cityToStateRoute->miles = $request->miles;
        // $cityToStateRoute->min_cost = $request->min_cost;
        // $cityToStateRoute->max_cost = $request->max_cost;
        // $cityToStateRoute->upper_content = $request->upper_content;
        // $cityToStateRoute->middle_content = $request->middle_content;
        // $cityToStateRoute->bottom_content = $request->bottom_content;
        $cityToStateRoute->city_from_id = $request->city_from_id;
        $cityToStateRoute->state_to_id = $request->state_to_id;
        $cityToStateRoute->save();

        Alert::success('Updated', 'City To State Route Updated Successfully');
        return redirect()->route('admin.city-to-state-routes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete city to state route!');
        }
        $cityToStateRoute = CityToStateRoute::find($id);
        $cityToStateRoute->deleted_by_id = auth()->guard('admin')->id();
        $cityToStateRoute->save();
        $cityToStateRoute->delete();
        Alert::success('Deleted', 'City To State Route Deleted Successfully');
        return redirect()->back();
    }

    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.view-trash')) {
            abort(403, 'Sorry !! You are Unauthorized to view any trashed city to state route!');
        }
        $city_to_state_routes = CityToStateRoute::onlyTrashed()->with('deletedBy')->orderBy('deleted_at', 'desc')->get();
        return view('backend.pages.route_modules.city-to-state-routes.trashed', compact('city_to_state_routes'));
    }

    public function restore($id)
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.restore')) {
            abort(403, 'Sorry !! You are Unauthorized to restore city to state route!');
        }
        $cityToStateRoute = CityToStateRoute::withTrashed()->findOrFail($id);
        $cityToStateRoute->deleted_by_id = null;
        $cityToStateRoute->save();
        $cityToStateRoute->restore();
        Alert::success('Restored', 'City To State Route restored successfully.');
        return back();
    }

    public function forceDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.force-delete')) {
            abort(403, 'Sorry !! You are Unauthorized to force delete city to state route!');
        }
        $cityToStateRoute = CityToStateRoute::withTrashed()->findOrFail($id);
        
        $cityToStateRoute->forceDelete();
        Alert::success('Deleted', 'City To State Route deleted permanently.');
        return back();
    }

    // public function moveSizeCostIndex() 
    // {
    //     if (is_null($this->user) || !$this->user->can('city-to-state-route.view')) {
    //         abort(403, 'Sorry !! You are Unauthorized to view this page!');
    //     }
    //     $move_size_costs = CityToStateMoveSizeCost::all();
    //     return view('backend.pages.route_modules.city-to-state-routes.move-size-cost.index', compact('move_size_costs'));
    // }

    public function moveSizeCostIndex(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any move size cost !');
        }
        if ($request->ajax()) {
            $move_size_costs = CityToStateMoveSizeCost::query()
                ->with(['cityToStateRoute.cityFrom', 'cityToStateRoute.stateTo'])
                ->select('city_to_state_move_size_costs.*');

            return DataTables::of($move_size_costs)
                ->addIndexColumn()
                ->addColumn('route_title', function ($m) {
                    if ($m->cityToStateRoute?->cityFrom && $m->cityToStateRoute?->stateTo) {
                        return $m->cityToStateRoute->cityFrom->name . ' to ' . $m->cityToStateRoute->stateTo->name;
                    }
                    return 'N/A';
                })
                ->editColumn('moving_company_studio_bedroom', fn($m) => $m->moving_company_studio_bedroom ?? '')
                ->editColumn('moving_container_studio_bedroom', fn($m) => $m->moving_container_studio_bedroom ?? '')
                ->editColumn('rental_truck_studio_bedroom', fn($m) => $m->rental_truck_studio_bedroom ?? '')
                ->editColumn('moving_company_2_3_bedroom', fn($m) => $m->moving_company_2_3_bedroom ?? '')
                ->editColumn('moving_container_2_3_bedroom', fn($m) => $m->moving_container_2_3_bedroom ?? '')
                ->editColumn('rental_truck_2_3_bedroom', fn($m) => $m->rental_truck_2_3_bedroom ?? '')
                ->editColumn('moving_company_4_bedroom', fn($m) => $m->moving_company_4_bedroom ?? '')
                ->editColumn('moving_container_4_bedroom', fn($m) => $m->moving_container_4_bedroom ?? '')
                ->editColumn('rental_truck_4_bedroom', fn($m) => $m->rental_truck_4_bedroom ?? '')
                ->addColumn('action', function ($m) {
                    $action = '';

                    if ($this->user && $this->user->can('city-to-state-route.edit')) {
                        $action .= '<a class="btn btn-primary text-white mr-1" href="' .
                            route('admin.city-to-state-routes.move-size-cost.edit', $m->id) .
                            '"><i class="fa fa-edit"></i></a>';
                    }

                    if ($this->user && $this->user->can('city-to-state-route.delete')) {
                        $csrf = csrf_token();
                        $deleteUrl = route('admin.city-to-state-routes.move-size-cost.destroy', $m->id);
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
                        $fromCity = trim($matches[1]);
                        $toState   = trim($matches[2]);

                        $query->whereHas(
                            'cityToStateRoute.cityFrom',
                            fn($q) =>
                            $q->where('name', 'like', "%{$fromCity}%")
                        )->whereHas(
                            'cityToStateRoute.stateTo',
                            fn($q) =>
                            $q->where('name', 'like', "%{$toState}%")
                        );
                    } else {
                        $query->where(function ($q) use ($keyword) {
                            $q->whereHas(
                                'cityToStateRoute.cityFrom',
                                fn($s) =>
                                $s->where('name', 'like', "%{$keyword}%")
                            )->orWhereHas(
                                'cityToStateRoute.stateTo',
                                fn($s) =>
                                $s->where('name', 'like', "%{$keyword}%")
                            );
                        });
                    }
                })
                ->orderColumn('route_title', function ($query, $order) {
                    $query->join('city_to_state_routes as routes', 'routes.id', '=', 'city_to_state_move_size_costs.city_to_state_route_id')
                        ->join('city_pages as cf', 'routes.city_from_id', '=', 'cf.id')
                        ->join('states as st', 'routes.state_to_id', '=', 'st.id')
                        ->orderBy('cf.name', $order)
                        ->orderBy('st.name', $order)
                        ->select('city_to_state_move_size_costs.*');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.route_modules.city-to-state-routes.move-size-cost.index');
    }

    public function moveSizeCostCreate() 
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create this!');
        }
        $city_to_state_routes = CityToStateRoute::all();
        return view('backend.pages.route_modules.city-to-state-routes.move-size-cost.create',compact('city_to_state_routes'));
    }

    public function moveSizeCostStore(Request $request) 
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create this!');
        }   
        $request->validate([
            'city_to_state_route_id' => 'required',
        ]);

        $moveSizeCost = new CityToStateMoveSizeCost();
        $moveSizeCost->city_to_state_route_id = $request->city_to_state_route_id;
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

        Alert::success('Created', 'City To State Move Size Cost Created Successfully');
        return redirect()->route('admin.city-to-state-routes.move-size-cost.index');
    }

    public function moveSizeCostEdit(CityToStateMoveSizeCost $moveSizeCost) 
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit this!');
        }
        $city_to_state_routes = CityToStateRoute::all();
        return view('backend.pages.route_modules.city-to-state-routes.move-size-cost.edit',compact('moveSizeCost','city_to_state_routes'));
    }

    public function moveSizeCostUpdate(Request $request, CityToStateMoveSizeCost $moveSizeCost) 
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update this!');
        }
        $request->validate([
            'city_to_state_route_id' => 'required',
        ]);

        $moveSizeCost->city_to_state_route_id = $request->city_to_state_route_id;
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

        Alert::success('Updated', 'City To State Move Size Cost Updated Successfully');
        return redirect()->route('admin.city-to-state-routes.move-size-cost.index');
    }

    public function moveSizeCostDestroy($id) 
    {
        if (is_null($this->user) || !$this->user->can('city-to-state-route.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete this!');
        }
        $moveSizeCost = CityToStateMoveSizeCost::find($id);
        $moveSizeCost->delete();
        
        Alert::success('Deleted', 'City To State Move Size Cost Deleted Successfully.');
        return redirect()->route('admin.city-to-state-routes.move-size-cost.index');
    }

    // for import 
    public function import(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $filePath = $request->file('file')->store('imports');
        CityToStateImportJob::dispatch($filePath, auth()->id());

        return back()->with('success', 'Import processing, Please wait a few moment ... ');
    }
}
