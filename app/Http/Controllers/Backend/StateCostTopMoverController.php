<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\StateCostPage;
use App\Models\StateCostTopMover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StateCostTopMoverController extends Controller
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
    public function index()
    { if (is_null($this->user) || !$this->user->can('state-cost-top-mover.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any state cost top mover !');
        }
        $top_movers = StateCostTopMover::all();

        return view('backend.pages.state-cost-pages.top-movers.index', compact('top_movers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {if (is_null($this->user) || !$this->user->can('state-cost-top-mover.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any state cost top mover !');
        }
        $state_cost_pages = StateCostPage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);

        return view('backend.pages.state-cost-pages.top-movers.create', compact('companies', 'state_cost_pages'));
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
            'company_id' => 'required',
            'state_cost_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
        ]);

        $topMover = new StateCostTopMover();
        $topMover->company_id = $request->company_id;
        $topMover->state_cost_page_id = $request->state_cost_page_id;
        $topMover->heading = $request->heading;
        $topMover->point_one = $request->point_one;
        $topMover->point_two = $request->point_two;
        $topMover->point_three = $request->point_three;
        $topMover->position = $request->position;
        $topMover->save();
        Alert::success('Created', 'State Cost Top Mover Created Successfully');
        return redirect()->route('admin.state-cost.top-mover.index')->with('success', 'State Cost Top Mover Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('state-cost-top-mover.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any state cost top mover !');
        }
        $topMover = StateCostTopMover::find($id);
        $state_cost_pages = StateCostPage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);
        return view('backend.pages.state-cost-pages.top-movers.edit', compact('topMover', 'state_cost_pages', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required',
            'state_cost_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
        ]);
        $topMover = StateCostTopMover::find($id);

        $topMover->company_id = $request->company_id;
        $topMover->state_cost_page_id = $request->state_cost_page_id;
        $topMover->heading = $request->heading;
        $topMover->point_one = $request->point_one;
        $topMover->point_two = $request->point_two;
        $topMover->point_three = $request->point_three;
        $topMover->position = $request->position;
        $topMover->save();

        Alert::success('Updated', 'State Cost Top Mover Updated Successfully');
        return redirect()->route('admin.state-cost.top-mover.index')->with('success', 'State Cost Top Mover Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('state-cost-top-mover.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any state cost top mover !');
        }
        $topMover = StateCostTopMover::find($id);
        $topMover->delete();
        Alert::success('Deleted', 'State Cost Top Mover deleted successfully');
        return redirect()->route('admin.state-cost.top-mover.index')->with('success', 'State Cost Top Mover deleted successfully');
    }
}
