<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\StateToStateMoveSizeCost;
use Illuminate\Support\Str;
use App\Models\StateToStateRoute;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class StateToStateRouteController extends Controller
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
        if (is_null($this->user) || !$this->user->can('state-to-state-route.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any state to state route !');
        }
        $trashedCount = StateToStateRoute::onlyTrashed()->count();

        if ($request->ajax()) {
            $routes = StateToStateRoute::with(['stateFrom', 'stateTo', 'createdBy'])->select('state_to_state_routes.*');
            return DataTables::of($routes)
                ->addIndexColumn()
                ->addColumn('page', function ($r) {
                    return $r->stateFrom && $r->stateTo ? 'Moving from ' . $r->stateFrom->name . ' to ' . $r->stateTo->name : 'N/A';
                })
                ->addColumn('state_from', fn($r) => $r->stateFrom?->name ?? 'N/A')
                ->addColumn('state_to', fn($r) => $r->stateTo?->name ?? 'N/A')
                ->addColumn('created_by', fn($r) => $r->createdBy?->name ?? 'N/A')
                ->addColumn('action', function ($r) {
                    $action = '<div style="display:flex;justify-content:center;">';
                    $action .= '<a class="btn btn-success text-white mr-1" href="' .
                        route('route.state-to-state.show', [
                            strtolower($r->stateFrom->abv ?? ''),
                            strtolower($r->stateTo->abv ?? '')
                        ]) . '" target="_blank"><i class="fa fa-eye"></i></a>';

                    if ($this->user && $this->user->can('state-to-state-route.edit')) {
                        $action .= '<a class="btn btn-primary text-white mr-1" href="' .
                            route('admin.state-to-state-routes.edit', $r->id) .
                            '"><i class="fa fa-edit"></i></a>';
                    }

                    if ($this->user && $this->user->can('state-to-state-route.delete')) {
                        $csrf = csrf_token();
                        $deleteUrl = route('admin.state-to-state-routes.destroy', $r->id);
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
                    $query->whereRaw("CONCAT('Moving from ', (SELECT name FROM states WHERE id = state_to_state_routes.state_from_id), ' to ', (SELECT name FROM states WHERE id = state_to_state_routes.state_to_id)) LIKE ?", ["%{$keyword}%"]);
                })
                ->filterColumn('state_from', function ($query, $keyword) {
                    $query->whereHas('stateFrom', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->filterColumn('state_to', function ($query, $keyword) {
                    $query->whereHas('stateTo', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->filterColumn('created_by', function ($query, $keyword) {
                    $query->whereHas('createdBy', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
                })
                ->orderColumn('page', function ($query, $order) {
                    $query->join('states as sf', 'state_to_state_routes.state_from_id', '=', 'sf.id')
                        ->join('states as st', 'state_to_state_routes.state_to_id', '=', 'st.id')
                        ->orderBy('sf.name', $order)
                        ->orderBy('st.name', $order)
                        ->select('state_to_state_routes.*');
                })
                ->orderColumn('state_from', function ($query, $order) {
                    $query->join('states as sf2', 'state_to_state_routes.state_from_id', '=', 'sf2.id')
                        ->orderBy('sf2.name', $order)
                        ->select('state_to_state_routes.*');
                })
                ->orderColumn('state_to', function ($query, $order) {
                    $query->join('states as st2', 'state_to_state_routes.state_to_id', '=', 'st2.id')
                        ->orderBy('st2.name', $order)
                        ->select('state_to_state_routes.*');
                })
                ->orderColumn('created_by', function ($query, $order) {
                    $query->leftJoin('admins as admin', 'state_to_state_routes.create_by_id', '=', 'admin.id')
                        ->orderBy('admin.name', $order)
                        ->select('state_to_state_routes.*');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $routesCount = StateToStateRoute::count();
        return view('backend.pages.route_modules.state-to-state-routes.index', compact('routesCount', 'trashedCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any state to state route !');
        }
        $states = State::all();

        return view('backend.pages.route_modules.state-to-state-routes.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'state_from_id' => [
                'required',
                'different:state_to_id',
                'unique:state_to_state_routes,state_from_id,NULL,id,state_to_id,' . $request->state_to_id,
            ],
            'state_to_id' => 'required',
        ], [
            'state_from_id.unique' => 'This state to state route already exists.',
            'state_from_id.different' => 'The origin and destination states must be different.',
        ]);

        $stateToStateRoute = new StateToStateRoute();
        // $stateToStateRoute->title = $request->title;
        // $stateToStateRoute->slug = Str::slug($request->slug);
        // $stateToStateRoute->meta_title = $request->meta_title;
        // $stateToStateRoute->meta_description = $request->meta_description;
        // $stateToStateRoute->miles = $request->miles;
        // $stateToStateRoute->min_cost = $request->min_cost;
        // $stateToStateRoute->max_cost = $request->max_cost;
        // $stateToStateRoute->upper_content = $request->upper_content;
        // $stateToStateRoute->middle_content = $request->middle_content;
        // $stateToStateRoute->bottom_content = $request->bottom_content;
        $stateToStateRoute->create_by_id = auth()->guard('admin')->id();
        $stateToStateRoute->state_from_id = $request->state_from_id;
        $stateToStateRoute->state_to_id = $request->state_to_id;
        $stateToStateRoute->save();
        Alert::success('Created', 'State To State Route Created Successfully');
        return redirect()->route('admin.state-to-state-routes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StateToStateRoute $stateToStateRoute)
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any state to state route !');
        }
        $states = State::all();
        return view('backend.pages.route_modules.state-to-state-routes.edit', compact('stateToStateRoute', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StateToStateRoute $stateToStateRoute)
    {
        $request->validate([
            'state_from_id' => [
                'required',
                'different:state_to_id',
                'unique:state_to_state_routes,state_from_id,' . $stateToStateRoute->id . ',id,state_to_id,' . $request->state_to_id,
            ],
            'state_to_id' => 'required',
        ], [
            'state_from_id.unique' => 'This state to state route already exists.',
            'state_from_id.different' => 'The origin and destination states must be different.',
        ]);

        // $stateToStateRoute->title = $request->title;
        // $stateToStateRoute->slug = Str::slug($request->slug);
        // $stateToStateRoute->meta_title = $request->meta_title;
        // $stateToStateRoute->meta_description = $request->meta_description;
        // $stateToStateRoute->miles = $request->miles;
        // $stateToStateRoute->min_cost = $request->min_cost;
        // $stateToStateRoute->max_cost = $request->max_cost;
        // $stateToStateRoute->upper_content = $request->upper_content;
        // $stateToStateRoute->middle_content = $request->middle_content;
        // $stateToStateRoute->bottom_content = $request->bottom_content;
        $stateToStateRoute->state_from_id = $request->state_from_id;
        $stateToStateRoute->state_to_id = $request->state_to_id;
        $stateToStateRoute->save();

        Alert::success('Updated', 'State To State Route Updated Successfully');
        return redirect()->route('admin.state-to-state-routes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any state to state route !');
        }
        $stateToStateRoute = StateToStateRoute::find($id);
        $stateToStateRoute->deleted_by_id = auth()->guard('admin')->id();
        $stateToStateRoute->save();
        $stateToStateRoute->delete();
        Alert::success('Deleted', 'State To State Route Deleted Successfully');
        return redirect()->back();
    }

    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.view-trash')) {
            abort(403, 'Sorry !! You are Unauthorized to view any trash state to state route !');
        }
        $state_to_state_routes = StateToStateRoute::onlyTrashed()->with('deletedBy')->orderBy('deleted_at', 'desc')->get();
        return view('backend.pages.route_modules.state-to-state-routes.trashed', compact('state_to_state_routes'));
    }

    public function restore($id)
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.restore')) {
            abort(403, 'Sorry !! You are Unauthorized to restore any state to state route !');
        }
        $stateToStateRoute = StateToStateRoute::withTrashed()->findOrFail($id);
        $stateToStateRoute->deleted_by_id = null;
        $stateToStateRoute->save();
        $stateToStateRoute->restore();
        Alert::success('Restored', 'State To State Route restored successfully.');
        return back();
    }

    public function forceDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.force-delete')) {
            abort(403, 'Sorry !! You are Unauthorized to force delete any state to state route !');
        }
        $stateToStateRoute = StateToStateRoute::withTrashed()->findOrFail($id);

        $stateToStateRoute->forceDelete();
        Alert::success('Deleted', 'State To State Route deleted permanently.');
        return back();
    }

    public function moveSizeCostIndex(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any move size cost !');
        }
        if ($request->ajax()) {
            $move_size_costs = StateToStateMoveSizeCost::query()
                ->with(['stateToStateRoute.stateFrom', 'stateToStateRoute.stateTo'])
                ->select('state_to_state_move_size_costs.*');

            return DataTables::of($move_size_costs)
                ->addIndexColumn()
                ->addColumn('route_title', function ($m) {
                    if ($m->stateToStateRoute?->stateFrom && $m->stateToStateRoute?->stateTo) {
                        return $m->stateToStateRoute->stateFrom->name . ' to ' . $m->stateToStateRoute->stateTo->name;
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

                    if ($this->user && $this->user->can('state-to-state-route.edit')) {
                        $action .= '<a class="btn btn-primary text-white mr-1" href="' .
                            route('admin.state-to-state-routes.move-size-cost.edit', $m->id) .
                            '"><i class="fa fa-edit"></i></a>';
                    }

                    if ($this->user && $this->user->can('state-to-state-route.delete')) {
                        $csrf = csrf_token();
                        $deleteUrl = route('admin.state-to-state-routes.move-size-cost.destroy', $m->id);
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
                        $toState   = trim($matches[2]);

                        $query->whereHas('stateToStateRoute.stateFrom', fn($q) =>
                            $q->where('name', 'like', "%{$fromState}%")
                        )->whereHas('stateToStateRoute.stateTo', fn($q) =>
                            $q->where('name', 'like', "%{$toState}%")
                        );
                    } else {
                        $query->where(function ($q) use ($keyword) {
                            $q->whereHas('stateToStateRoute.stateFrom', fn($s) =>
                                $s->where('name', 'like', "%{$keyword}%")
                            )->orWhereHas('stateToStateRoute.stateTo', fn($s) =>
                                $s->where('name', 'like', "%{$keyword}%")
                            );
                        });
                    }
                })
                ->orderColumn('route_title', function ($query, $order) {
                    $query->join('state_to_state_routes as routes', 'routes.id', '=', 'state_to_state_move_size_costs.state_to_state_route_id')
                        ->join('states as sf', 'routes.state_from_id', '=', 'sf.id')
                        ->join('states as st', 'routes.state_to_id', '=', 'st.id')
                        ->orderBy('sf.name', $order)
                        ->orderBy('st.name', $order)
                        ->select('state_to_state_move_size_costs.*');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.route_modules.state-to-state-routes.move-size-cost.index');
    }

    public function moveSizeCostCreate()
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any move size cost !');
        }
        $state_to_state_routes = StateToStateRoute::all();
        return view('backend.pages.route_modules.state-to-state-routes.move-size-cost.create', compact('state_to_state_routes'));
    }

    public function moveSizeCostStore(Request $request)
    {
        $request->validate([
            'state_to_state_route_id' => 'required|unique:state_to_state_move_size_costs,state_to_state_route_id',
        ],
        [
            'state_to_state_route_id.unique' => 'A move size cost record already exists for this route.',
        ]);

        $moveSizeCost = new StateToStateMoveSizeCost();
        $moveSizeCost->state_to_state_route_id = $request->state_to_state_route_id;
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

        Alert::success('Created', 'State To State Move Size Cost Created Successfully');
        return redirect()->route('admin.state-to-state-routes.move-size-cost.index');
    }

    public function moveSizeCostEdit(StateToStateMoveSizeCost $moveSizeCost)
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any move size cost !');
        }
        $state_to_state_routes = StateToStateRoute::all();
        return view('backend.pages.route_modules.state-to-state-routes.move-size-cost.edit', compact('moveSizeCost', 'state_to_state_routes'));
    }

    public function moveSizeCostUpdate(Request $request, StateToStateMoveSizeCost $moveSizeCost)
    {
        $request->validate([
            'state_to_state_route_id' => [
                'required',
                Rule::unique('state_to_state_move_size_costs', 'state_to_state_route_id')
                    ->ignore($moveSizeCost->id),
            ],
        ],
        [
            'state_to_state_route_id.unique' => 'A move size cost record already exists for this route.',
        ]);

        $moveSizeCost->state_to_state_route_id = $request->state_to_state_route_id;
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

        Alert::success('Updated', 'State To State Move Size Cost Updated Successfully');
        return redirect()->route('admin.state-to-state-routes.move-size-cost.index');
    }

    public function moveSizeCostDestroy($id)
    {
        if (is_null($this->user) || !$this->user->can('state-to-state-route.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any move size cost !');
        }
        $moveSizeCost = StateToStateMoveSizeCost::find($id);
        $moveSizeCost->delete();

        Alert::success('Deleted', 'State To State Move Size Cost Deleted Successfully.');
        return redirect()->route('admin.state-to-state-routes.move-size-cost.index');
    }
}
