<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Jobs\CityToCityImportJob;
use App\Models\CityPage;
use App\Models\CityToCityMoveSizeCost;
use App\Models\CityToCityRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CityToCityRouteController extends Controller
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
        if (is_null($this->user) || !$this->user->can('city-to-city-route.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any city to city route!');
        }
        $trashedCount = CityToCityRoute::onlyTrashed()->count();

        // If AJAX request, return DataTables response
        if ($request->ajax()) {
            $routes = CityToCityRoute::with(['cityFrom', 'cityTo', 'createdBy'])->select('city_to_city_routes.*');

            return DataTables::of($routes)
                ->addIndexColumn()
                ->addColumn('page', function ($r) {
                    return $r->cityFrom && $r->cityTo ? 'Moving from ' . $r->cityFrom->name . ' to ' . $r->cityTo->name : 'N/A';
                })
                ->addColumn('city_from', function ($r) {
                    return $r->cityFrom?->name ?? 'N/A';
                })
                ->addColumn('city_to', function ($r) {
                    return $r->cityTo?->name ?? 'N/A';
                })
                ->editColumn('miles', fn($r) => $r->miles ?? '')
                ->addColumn('created_by', function ($r) {
                    return $r->createdBy?->name ?? '';
                })
                ->addColumn('action', function ($r) {
                    $action = '';
                    $action .= '<a class="btn btn-success text-white mr-1" href="'
                        . route('route.dynamic', [
                            strtolower($r->cityFrom->state->abv),
                            strtolower($r->cityTo->state->abv),
                            $r->cityFrom->slug,
                            $r->cityTo->slug
                        ]) . '" target="_blank"><i class="fa fa-eye"></i></a>';
                    if ($this->user && $this->user->can('city-to-city-route.edit')) {
                        $action .= '<a class="btn btn-primary text-white mr-1" href="' . route('admin.city-to-city-routes.edit', $r->id) . '"><i class="fa fa-edit"></i></a>';
                    }
                    if ($this->user && $this->user->can('city-to-city-route.delete')) {
                        $csrf = csrf_token();
                        $deleteUrl = route('admin.city-to-city-routes.destroy', $r->id);
                        $action .= '<form method="POST" action="' . $deleteUrl . '" style="display:inline-block;margin:0;padding:0;">';
                        $action .= '<input type="hidden" name="_token" value="' . $csrf . '">';
                        $action .= '<input type="hidden" name="_method" value="DELETE">';
                        $action .= '<button type="submit" class="btn btn-danger text-white show_confirm"><i class="fa fa-trash"></i></button>';
                        $action .= '</form>';
                    }
                    return '<div style="display:flex;justify-content: center">' . $action . '</div>';
                })
                ->filterColumn('page', function ($query, $keyword) {
                    $keyword = trim($keyword);
                    $query->whereRaw("CONCAT('Moving from ', (SELECT name FROM city_pages WHERE id = city_to_city_routes.city_from_id), ' to ', (SELECT name FROM city_pages WHERE id = city_to_city_routes.city_to_id)) LIKE ?", ["%{$keyword}%"]);
                })
                ->filterColumn('city_from', function ($query, $keyword) {
                    $query->whereHas('cityFrom', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->filterColumn('city_to', function ($query, $keyword) {
                    $query->whereHas('cityTo', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->filterColumn('created_by', function ($query, $keyword) {
                    $query->whereHas('createdBy', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->orderColumn('page', function ($query, $order) {
                    $query
                        ->join('city_pages as cf', 'city_to_city_routes.city_from_id', '=', 'cf.id')
                        ->join('city_pages as ct', 'city_to_city_routes.city_to_id', '=', 'ct.id')
                        ->orderBy('cf.name', $order)
                        ->orderBy('ct.name', $order)
                        ->select('city_to_city_routes.*');
                })
                ->orderColumn('city_from', function ($query, $order) {
                    $query
                        ->join('city_pages as cf2', 'city_to_city_routes.city_from_id', '=', 'cf2.id')
                        ->orderBy('cf2.name', $order)
                        ->select('city_to_city_routes.*');
                })
                ->orderColumn('city_to', function ($query, $order) {
                    $query
                        ->join('city_pages as ct2', 'city_to_city_routes.city_to_id', '=', 'ct2.id')
                        ->orderBy('ct2.name', $order)
                        ->select('city_to_city_routes.*');
                })
                ->orderColumn('created_by', function ($query, $order) {
                    $query
                        ->leftJoin('admins as admin', 'city_to_city_routes.create_by_id', '=', 'admin.id')
                        ->orderBy('admin.name', $order)
                        ->select('city_to_city_routes.*');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $routesCount = CityToCityRoute::count();
        return view('backend.pages.route_modules.city-to-city-routes.index', compact('routesCount', 'trashedCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city to city route!');
        }
        $city_pages = CityPage::all();
        return view('backend.pages.route_modules.city-to-city-routes.create', compact('city_pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city to city route!');
        }
        $request->validate([
            'city_from_id' => [
                'required',
                'different:city_to_id',
                Rule::unique('city_to_city_routes')->where(function ($query) use ($request) {
                    return $query
                        ->where('city_from_id', $request->city_from_id)
                        ->where('city_to_id', $request->city_to_id);
                }),
            ],
            'city_to_id' => 'required',
            'miles' => 'nullable',
        ],
            [
                'city_from_id.unique' => 'This city to city route already exists.',
                'city_from_id.different' => 'The origin and destination cities must be different.',
            ]);

        $cityToCityRoute = new CityToCityRoute();
        // $cityToCityRoute->title = $request->title;
        // $cityToCityRoute->slug = Str::slug($request->slug);
        // $cityToCityRoute->meta_title = $request->meta_title;
        // $cityToCityRoute->meta_description = $request->meta_description;
        $cityToCityRoute->miles = $request->miles;
        // $cityToCityRoute->min_cost = $request->min_cost;
        // $cityToCityRoute->max_cost = $request->max_cost;
        // $cityToCityRoute->upper_content = $request->upper_content;
        // $cityToCityRoute->middle_content = $request->middle_content;
        // $cityToCityRoute->bottom_content = $request->bottom_content;
        $cityToCityRoute->create_by_id = auth()->guard('admin')->id();
        $cityToCityRoute->city_from_id = $request->city_from_id;
        $cityToCityRoute->city_to_id = $request->city_to_id;
        $cityToCityRoute->save();
        return redirect()->route('admin.city-to-city-routes.index')->with('success', 'City To City Route Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CityToCityRoute $cityToCityRoute)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit city to city route!');
        }
        $city_pages = CityPage::all();
        return view('backend.pages.route_modules.city-to-city-routes.edit', compact('cityToCityRoute', 'city_pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityToCityRoute $cityToCityRoute)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update city to city route!');
        }
        $request->validate([
            'city_from_id' => [
                'required',
                Rule::unique('city_to_city_routes')->where(function ($query) use ($request) {
                    return $query
                        ->where('city_from_id', $request->city_from_id)
                        ->where('city_to_id', $request->city_to_id);
                })->ignore($cityToCityRoute->id),
            ],
            'city_to_id' => 'required',
            'miles' => 'nullable',
        ],
            [
                'city_from_id.unique' => 'This City to city route already exists.',
            ]);

        // $cityToCityRoute->title = $request->title;
        // $cityToCityRoute->slug = Str::slug($request->slug);
        // $cityToCityRoute->meta_title = $request->meta_title;
        // $cityToCityRoute->meta_description = $request->meta_description;
        $cityToCityRoute->miles = $request->miles;
        // $cityToCityRoute->min_cost = $request->min_cost;
        // $cityToCityRoute->max_cost = $request->max_cost;
        // $cityToCityRoute->upper_content = $request->upper_content;
        // $cityToCityRoute->middle_content = $request->middle_content;
        // $cityToCityRoute->bottom_content = $request->bottom_content;
        $cityToCityRoute->city_from_id = $request->city_from_id;
        $cityToCityRoute->city_to_id = $request->city_to_id;
        $cityToCityRoute->save();

        return redirect()->route('admin.city-to-city-routes.index')->with('success', 'City To City Route Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete city to city route!');
        }
        $cityToCityRoute = CityToCityRoute::find($id);
        $cityToCityRoute->deleted_by_id = auth()->guard('admin')->id();
        $cityToCityRoute->save();
        $cityToCityRoute->delete();
        Alert::success('Deleted', 'City To City Route Deleted Successfully.');
        return redirect()->back();
    }

    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.view-trash')) {
            abort(403, 'Sorry !! You are Unauthorized to view any trashed city to city route!');
        }

        $cityToCityRoutes = CityToCityRoute::onlyTrashed()->get();
        return view('backend.pages.route_modules.city-to-city-routes.trashed', compact('cityToCityRoutes'));
    }

    public function restore($id)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.restore')) {
            abort(403, 'Sorry !! You are Unauthorized to restore city to city route!');
        }

        $cityToCityRoute = CityToCityRoute::withTrashed()->findOrFail($id);
        $cityToCityRoute->deleted_by_id = null;
        $cityToCityRoute->save();
        $cityToCityRoute->restore();
        return back()->with('success', 'City to City Route Restored Successfully');
    }

    public function forceDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.force-delete')) {
            abort(403, 'Sorry !! You are Unauthorized to force delete city to city route!');
        }
        $cityToCityRoute = CityToCityRoute::withTrashed()->findOrFail($id);
        $cityToCityRoute->forceDelete();
        Alert::success('Deleted', 'City To City Route deleted permanently.');
        return back();
    }

    public function moveSizeCostIndex(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view this!');
        }
        if ($request->ajax()) {
            $move_size_costs = CityToCityMoveSizeCost::with(['cityToCityRoute.cityFrom', 'cityToCityRoute.cityTo'])->select('city_to_city_move_size_costs.*');

            return DataTables::of($move_size_costs)
                ->addIndexColumn()
                ->addColumn('route_title', function ($m) {
                    if ($m->cityToCityRoute && $m->cityToCityRoute->cityFrom && $m->cityToCityRoute->cityTo) {
                        return $m->cityToCityRoute->cityFrom->name . ' to ' . $m->cityToCityRoute->cityTo->name;
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
                    if ($this->user && $this->user->can('city-to-city-route.edit')) {
                        $action .= '<a class="btn btn-primary text-white mr-1" href="' . route('admin.city-to-city-routes.move-size-cost.edit', $m->id) . '"><i class="fa fa-edit"></i></a>';
                    }
                    if ($this->user && $this->user->can('city-to-city-route.delete')) {
                        $csrf = csrf_token();
                        $deleteUrl = route('admin.city-to-city-routes.move-size-cost.destroy', $m->id);
                        $action .= '<form method="POST" action="' . $deleteUrl . '" style="display:inline-block;margin:0;padding:0;">';
                        $action .= '<input type="hidden" name="_token" value="' . $csrf . '">';
                        $action .= '<input type="hidden" name="_method" value="DELETE">';
                        $action .= '<button type="submit" class="btn btn-danger text-white show_confirm"><i class="fa fa-trash"></i></button>';
                        $action .= '</form>';
                    }
                    return '<div style="display:flex;justify-content: center">' . $action . '</div>';
                })
                ->filterColumn('route_title', function ($query, $keyword) {
                    $keyword = trim($keyword);

                    if (preg_match('/([a-z\s]+?)\s+to\s+([a-z\s]+)/i', $keyword, $matches)) {
                        $fromCity = trim($matches[1]);
                        $toCity = trim($matches[2]);

                        $query->whereHas('cityToCityRoute.cityFrom', fn($q) =>
                                $q->where('name', 'like', "%{$fromCity}%"))->whereHas('cityToCityRoute.cityTo', fn($q) =>
                            $q->where('name', 'like', "%{$toCity}%"));
                    } else {
                        $query->where(function ($q) use ($keyword) {
                            $q->whereHas('cityToCityRoute.cityFrom', fn($s) =>
                                    $s->where('name', 'like', "%{$keyword}%"))->orWhereHas('cityToCityRoute.cityTo', fn($s) =>
                                $s->where('name', 'like', "%{$keyword}%"));
                        });
                    }
                })
                ->orderColumn('route_title', function ($query, $order) {
                    $query
                        ->join('city_to_city_routes as routes', 'routes.id', '=', 'city_to_city_move_size_costs.city_to_city_route_id')
                        ->join('city_pages as cf', 'routes.city_from_id', '=', 'cf.id')
                        ->join('city_pages as ct', 'routes.city_to_id', '=', 'ct.id')
                        ->orderBy('cf.name', $order)
                        ->orderBy('ct.name', $order)
                        ->select('city_to_city_move_size_costs.*');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.route_modules.city-to-city-routes.move-size-cost.index');
    }

    public function moveSizeCostCreate()
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create this!');
        }
        $city_to_city_routes = CityToCityRoute::all();
        return view('backend.pages.route_modules.city-to-city-routes.move-size-cost.create', compact('city_to_city_routes'));
    }

    public function moveSizeCostStore(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create this!');
        }
        $request->validate([
            'city_to_city_route_id' => 'required|unique:city_to_city_move_size_costs,city_to_city_route_id',
        ],
            [
                'city_to_city_route_id.unique' => 'A move size cost record already exists for this route.',
            ]);

        $moveSizeCost = new CityToCityMoveSizeCost();
        $moveSizeCost->city_to_city_route_id = $request->city_to_city_route_id;
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
        return redirect()->route('admin.city-to-city-routes.move-size-cost.index')->with('success', 'City To City Move Size Cost Created Successfully');
    }

    public function moveSizeCostEdit(CityToCityMoveSizeCost $moveSizeCost)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit this!');
        }
        $city_to_city_routes = CityToCityRoute::all();
        return view('backend.pages.route_modules.city-to-city-routes.move-size-cost.edit', compact('moveSizeCost', 'city_to_city_routes'));
    }

    public function moveSizeCostUpdate(Request $request, CityToCityMoveSizeCost $moveSizeCost)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update this!');
        }
        $request->validate([
            'city_to_city_route_id' => [
                'required',
                Rule::unique('city_to_city_move_size_costs', 'city_to_city_route_id')
                    ->ignore($moveSizeCost->id),
            ],
        ],
            [
                'city_to_city_route_id.unique' => 'A move size cost record already exists for this route.',
            ]);

        $moveSizeCost->city_to_city_route_id = $request->city_to_city_route_id;
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
        return redirect()->route('admin.city-to-city-routes.move-size-cost.index')->with('success', 'City To City Move Size Cost Updated Successfully');
    }

    public function moveSizeCostDestroy($id)
    {
        if (is_null($this->user) || !$this->user->can('city-to-city-route.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete this!');
        }
        $moveSizeCost = CityToCityMoveSizeCost::find($id);
        $moveSizeCost->delete();
        Alert::success('Deleted', 'City To City Move Size Cost Deleted Successfully.');
        return redirect()->route('admin.city-to-city-routes.move-size-cost.index')->with('success', 'City To City Move Size Cost Deleted Successfully');
    }

    // for import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $filePath = $request->file('file')->store('imports');
        CityToCityImportJob::dispatch($filePath, auth()->id());

        return back()->with('success', 'Import processing, Please wait a few moment ... ');
    }
}
