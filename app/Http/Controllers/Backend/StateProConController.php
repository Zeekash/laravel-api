<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\StateProCon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StateProConController extends Controller
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
    {   if (is_null($this->user) || !$this->user->can('state-pros-cons.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any state pros cons !');
        }
        $state_pro_cons = StateProCon::all();
        return view('backend.pages.state-pros-cons.index', compact('state_pro_cons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { if (is_null($this->user) || !$this->user->can('state-pros-cons.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any state pros cons !');
        }
        $states = State::get(['id', 'name']);
        return view('backend.pages.state-pros-cons.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'inputs.*.pros' => 'required',
                'inputs.*.cons' => 'required',
                'inputs.*.state_id' => 'required'
            ],
            [
                'inputs.*.pros' => 'The pros field is required!',
                'inputs.*.cons' => 'The cons field is required!',
                'inputs.*.state_id' => 'The state field is required!',
            ]
        );
        foreach ($request->inputs as $key => $value) {
            StateProCon::create($value);
        }
        Alert::success('Added', 'State Pros & Cons Added Successfully');
        return redirect()->route('admin.state-pro-cons.index')->with('success', 'State Pros & Cons Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StateProCon $stateProCon)
    { if (is_null($this->user) || !$this->user->can('state-pros-cons.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any state pros cons !');
        }
        $states = State::get(['id', 'name']);
        return view('backend.pages.state-pros-cons.edit', compact('stateProCon', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StateProCon $stateProCon)
    {
        $request->validate([
            'state_id' => 'required',
            'pros' => 'required',
            'cons' => 'required',
        ]);
        $stateProCon->state_id = $request->state_id;
        $stateProCon->pros = $request->pros;
        $stateProCon->cons = $request->cons;
        $stateProCon->save();
        Alert::success('Updated', 'State Pros & Cons Updated Successfully');
        return redirect()->route('admin.state-pro-cons.index')->with('success', 'State pro cons updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (is_null($this->user) || !$this->user->can('state-pros-cons.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any state pros cons !');
        }
        $stateProCon = StateProCon::find($id);
        $stateProCon->delete();
        Alert::success('Deleted', 'State Pros & Cons Deleted Successfully');
        return redirect()->route('admin.state-pro-cons.index')->with('success', 'State pro cons deleted successfully');
    }
}
