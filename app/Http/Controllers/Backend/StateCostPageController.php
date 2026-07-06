<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StateCostPage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StateCostPageController extends Controller
{
     public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index()
    {
         if (is_null($this->user) || !$this->user->can('state-cost-page.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any state cost page !');
        }
        $state_cost_pages = StateCostPage::all();
        return view('backend.pages.state-cost-pages.index', compact('state_cost_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if (is_null($this->user) || !$this->user->can('state-cost-page.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any state cost page !');
        }
        $states = State::get(['id', 'name']);
        return view('backend.pages.state-cost-pages.create', compact('states'));
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
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'state_id' => 'required',
        ]);

        $stateCostPage = new StateCostPage();

        $stateCostPage->title = $request->title;
        $stateCostPage->description = $request->description;
        $stateCostPage->slug = Str::slug($request->slug);
        $stateCostPage->meta_title = $request->meta_title;
        $stateCostPage->meta_description = $request->meta_description;
        $stateCostPage->local_moving_company_cost = $request->local_moving_company_cost;
        $stateCostPage->interstate_moving_company_cost = $request->interstate_moving_company_cost;
        $stateCostPage->moving_containers_cost = $request->moving_containers_cost;
        $stateCostPage->cost_to_rent_moving_truck = $request->cost_to_rent_moving_truck;
        $stateCostPage->factors_that_affect_the_cost = $request->factors_that_affect_the_cost;
        $stateCostPage->simple_ways_to_save_money = $request->simple_ways_to_save_money;
        $stateCostPage->cheapest_way_to_move = $request->cheapest_way_to_move;
        $stateCostPage->most_accurate_moving_quote = $request->most_accurate_moving_quote;
        $stateCostPage->state_id = $request->state_id;

        $stateCostPage->save();

        return redirect()->route('admin.state-cost-pages.index')
            ->with('success', 'State cost page created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StateCostPage $stateCostPage)
    {    if (is_null($this->user) || !$this->user->can('state-cost-page.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any state cost page !');
        }
        $states = State::get(['id', 'name']);
        return view('backend.pages.state-cost-pages.edit', compact('stateCostPage', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StateCostPage $stateCostPage)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'state_id' => 'required',
        ]);

        $stateCostPage->title = $request->title;
        $stateCostPage->description = $request->description;
        $stateCostPage->slug = Str::slug($request->slug);
        $stateCostPage->meta_title = $request->meta_title;
        $stateCostPage->meta_description = $request->meta_description;
        $stateCostPage->local_moving_company_cost = $request->local_moving_company_cost;
        $stateCostPage->interstate_moving_company_cost = $request->interstate_moving_company_cost;
        $stateCostPage->moving_containers_cost = $request->moving_containers_cost;
        $stateCostPage->cost_to_rent_moving_truck = $request->cost_to_rent_moving_truck;
        $stateCostPage->factors_that_affect_the_cost = $request->factors_that_affect_the_cost;
        $stateCostPage->simple_ways_to_save_money = $request->simple_ways_to_save_money;
        $stateCostPage->cheapest_way_to_move = $request->cheapest_way_to_move;
        $stateCostPage->most_accurate_moving_quote = $request->most_accurate_moving_quote;
        $stateCostPage->state_id = $request->state_id;

        $stateCostPage->save();

        return redirect()->route('admin.state-cost-pages.index')
            ->with('success', 'State cost page created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (is_null($this->user) || !$this->user->can('state-cost-page.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any state cost page !');
        }
        $stateCostPage = StateCostPage::find($id);
        $stateCostPage->delete();

        return redirect()->back()
            ->with('success', 'State cost page deleted successfully.');
    }
}
