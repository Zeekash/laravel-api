<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StateLifeStyle;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StateLifeStyleController extends Controller
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
        if (is_null($this->user) || !$this->user->can('state-life-style.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any state life style !');
        }
        $stateLifeStyles = StateLifeStyle::all();
        return view('backend.pages.state-lifestyle.index', compact('stateLifeStyles'));
    }

    public function create()
    {   if (is_null($this->user) || !$this->user->can('state-life-style.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any state life style !');
        }
        // Fetch all states for the dropdown
        $states = State::all();

        return view('backend.pages.state-lifestyle.create', compact('states'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'state_id' => 'required|exists:states,id',
            'population' => 'nullable|string',
            'political_leaning' => 'nullable|string',
            'summer_high' => 'nullable|string',
            'winter_low' => 'nullable|string',
            'annual_rain' => 'nullable|string',
            'annual_snow' => 'nullable|string',
            'crime_index' => 'nullable|string',
            'transportation_score' => 'nullable|string',
            'walkability_score' => 'nullable|string',
            'bike_friendliness_score' => 'nullable|string',
        ]);

        StateLifeStyle::create($validated);

        Alert::success('Added', 'State Life Style added successfully.');

        return redirect()->route('admin.state-life-style.index')->with('success', 'State Life Style added successfully');
    }

   public function edit(StateLifeStyle $stateLifeStyle)
    {   if (is_null($this->user) || !$this->user->can('state-life-style.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any state life style !');
        }
        $states = State::all();
        return view('backend.pages.state-lifestyle.edit', compact('stateLifeStyle', 'states'));
    } 

    public function update(Request $request, StateLifeStyle $stateLifeStyle)
    {
        $validated = $request->validate([
            'state_id' => 'required|exists:states,id',
            'population' => 'nullable|string',
            'political_leaning' => 'nullable|string',
            'summer_high' => 'nullable|string',
            'winter_low' => 'nullable|string',
            'annual_rain' => 'nullable|string',
            'annual_snow' => 'nullable|string',
            'crime_index' => 'nullable|string',
            'transportation_score' => 'nullable|string',
            'walkability_score' => 'nullable|string',
            'bike_friendliness_score' => 'nullable|string',
        ]);

        $stateLifeStyle->update($validated);

        Alert::success('Updated', 'State Life Style updated successfully.');

        return redirect()->route('admin.state-life-style.index')->with('success', 'Updated successfully');
    }

    public function destroy($id)
{   if (is_null($this->user) || !$this->user->can('state-life-style.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any state life style !');
        }
    $stateLifeStyle = StateLifeStyle::find($id);

    $stateLifeStyle->delete();

    Alert::success('Deleted', 'State Life Style deleted successfully');

    
    return redirect()->route('admin.state-life-style.index');
}
}
