<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\ChecklistCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ChecklistController extends Controller
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
        if (is_null($this->user) || !$this->user->can('checklist.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any checklist!');
        }
        $checklists = Checklist::all();
        return view('backend.pages.checklists.index', compact('checklists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('checklist.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any checklist!');
        }
        $checklist_categories = ChecklistCategory::all();
        return view('backend.pages.checklists.create', compact('checklist_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('checklist.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any checklist!');
        }
        $request->validate([
            'inputs.*.heading' => 'required',
            'inputs.*.description' => 'nullable',
            'inputs.*.checklist_category_id' => 'required'
        ], [
            'inputs.*.heading' => 'The question field is required!',
            'inputs.*.checklist_category_id' => 'The checklist category field is required!',
        ]);

        foreach ($request->inputs as $key => $value) {
            CheckList::create($value);
        }
        return redirect()->route('admin.checklists.index')->with('success', 'Checklist created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist)
    {
        if (is_null($this->user) || !$this->user->can('checklist.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any checklist!');
        }
        $checklist_categories = ChecklistCategory::all();
        return view('backend.pages.checklists.edit', compact('checklist', 'checklist_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checklist $checklist)
    {
        if (is_null($this->user) || !$this->user->can('checklist.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update any checklist!');
        }
        $checklist->heading = $request->heading;
        $checklist->description = $request->description;
        $checklist->checklist_category_id = $request->checklist_category_id;
        $checklist->save();
        return redirect()->route('admin.checklists.index')->with('success', 'Checklist updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('checklist.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any checklist!');
        }
        $checklist = Checklist::find($id);
        $checklist->delete();
        return redirect()->back()->with('success', 'Checklist deleted successfully!');
    }

    public function deleteSelected(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('checklist.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any checklist !');
        }
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return redirect()->back()->with('error', 'No Checklist selected for deletion.');
        }

        Checklist::whereIn('id', $ids)->delete();
        Alert::success('Deleted', 'checklist deleted successfully.');
        return redirect()->back()->with('success', 'Selected checklist have been deleted!');
    }
}
