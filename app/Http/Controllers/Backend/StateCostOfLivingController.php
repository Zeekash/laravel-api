<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\StateCostOfLiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StateCostOfLivingController extends Controller
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
        if (is_null($this->user) || !$this->user->can('state-cost-of-living.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any state cost of living !');
        }
        $state_cost_of_livings = StateCostOfLiving::all();
        return view('backend.pages.state_cost-of-living.index', compact('state_cost_of_livings'));
    }
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('state-cost-of-living.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any state cost of living !');
        }
        $states = State::all();
        return view('backend.pages.state_cost-of-living.create', compact('states'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
        ]);

        $StateCost = new StateCostOfLiving();
        $StateCost->state_id = $request->state_id;
        $StateCost->average_rent_cost = $request->average_rent_cost;
        $StateCost->average_home_cost = $request->average_home_cost;
        $StateCost->average_income_per_capita = $request->average_income_per_capita;
        $StateCost->cost_of_living_single = $request->cost_of_living_single;
        $StateCost->cost_of_living_index = $request->cost_of_living_index;
        $StateCost->cost_of_living_family_of_four = $request->cost_of_living_family_of_four;
        $StateCost->unemployment_rate = $request->unemployment_rate;
        $StateCost->sales_tax = $request->sales_tax;
        $StateCost->state_income_tax = $request->state_income_tax;
        $StateCost->save();

        Alert::success('Created', 'State Cost Of Living successfully created.');

        return redirect()->route('admin.stateCostOfLiving.index')->with('success', 'Cost Of Living Created Successfully');
    }
    public function edit(StateCostOfLiving $stateCostOfLiving)
    {
        if (is_null($this->user) || !$this->user->can('state-cost-of-living.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any state cost of living !');
        }
        $states = State::all();
        return view('backend.pages.state_cost-of-living.edit', compact('stateCostOfLiving', 'states'));
    }
    public function update(Request $request, StateCostOfLiving $stateCostOfLiving)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
        ]);

        $stateCostOfLiving->state_id = $request->state_id;
        $stateCostOfLiving->average_rent_cost = $request->average_rent_cost;
        $stateCostOfLiving->average_home_cost = $request->average_home_cost;
        $stateCostOfLiving->average_income_per_capita = $request->average_income_per_capita;
        $stateCostOfLiving->cost_of_living_single = $request->cost_of_living_single;
        $stateCostOfLiving->cost_of_living_index = $request->cost_of_living_index;
        $stateCostOfLiving->cost_of_living_family_of_four = $request->cost_of_living_family_of_four;
        $stateCostOfLiving->unemployment_rate = $request->unemployment_rate;
        $stateCostOfLiving->sales_tax = $request->sales_tax;
        $stateCostOfLiving->state_income_tax = $request->state_income_tax;
        $stateCostOfLiving->save();

        Alert::success('Updated', 'State Cost Of Living updated successfully.');
        return redirect()->route('admin.stateCostOfLiving.index')->with('success', 'Cost Of Living Updated Successfully');
    }
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('state-cost-of-living.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any state cost of living !');
        }
        StateCostOfLiving::findOrFail($id)->delete();
        Alert::success('Deleted', 'State Cost Of Living deleted successfully!.');
        return back()->with('success', 'Cost Of Living deleted successfully!');
    }
}
