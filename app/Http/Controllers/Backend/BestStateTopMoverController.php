<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BestStatePage;
use App\Models\BestStateTopMover;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BestStateTopMoverController extends Controller
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
    {
        if (is_null($this->user) || !$this->user->can('best-state-top-mover.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any best state top mover!');
        }
        $top_movers = BestStateTopMover::all();

        return view('backend.pages.best-state-pages.top-movers.index', compact('top_movers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('best-state-top-mover.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any best state top mover!');
        }
        $best_state_pages = BestStatePage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);

        return view('backend.pages.best-state-pages.top-movers.create', compact('companies', 'best_state_pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('best-state-top-mover.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any best state top mover!');
        }
        $request->validate([
            'company_id' => 'required',
            'best_state_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
        ]);

        $topMover = new BestStateTopMover();
        $topMover->company_id = $request->company_id;
        $topMover->best_state_page_id = $request->best_state_page_id;
        $topMover->heading = $request->heading;
        $topMover->point_one = $request->point_one;
        $topMover->point_two = $request->point_two;
        $topMover->point_three = $request->point_three;
        $topMover->position = $request->position;
        $topMover->save();
        Alert::success('Created', 'Best State Top Mover Created Successfully');
        return redirect()->route('admin.best-state.top-mover.index')->with('success', 'Best State Top Mover Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('best-state-top-mover.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any best state top mover!');
        }
        $topMover = BestStateTopMover::find($id);
        $best_state_pages = BestStatePage::get(['id', 'title']);
        $companies = Company::get(['id', 'company_name']);
        return view('backend.pages.best-state-pages.top-movers.edit', compact('topMover', 'best_state_pages', 'companies'));
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
        if (is_null($this->user) || !$this->user->can('best-state-top-mover.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update any best state top mover!');
        }
        $request->validate([
            'company_id' => 'required',
            'best_state_page_id' => 'required',
            'heading' => 'required',
            'position' => 'required',
        ]);
        $topMover = BestStateTopMover::find($id);

        $topMover->company_id = $request->company_id;
        $topMover->best_state_page_id = $request->best_state_page_id;
        $topMover->heading = $request->heading;
        $topMover->point_one = $request->point_one;
        $topMover->point_two = $request->point_two;
        $topMover->point_three = $request->point_three;
        $topMover->position = $request->position;
        $topMover->save();

        Alert::success('Updated', 'Best State Top Mover Updated Successfully');
        return redirect()->route('admin.best-state.top-mover.index')->with('success', 'Best State Top Mover Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('best-state-top-mover.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any best state top mover!');
        }
        $topMover = BestStateTopMover::find($id);
        $topMover->delete();
        Alert::success('Deleted', 'Best State Top Mover deleted successfully');
        return redirect()->route('admin.best-state.top-mover.index')->with('success', 'Best State Top Mover deleted successfully');
    }
}
