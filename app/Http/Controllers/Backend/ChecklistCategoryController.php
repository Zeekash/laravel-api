<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ChecklistCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistCategoryController extends Controller
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
        if (is_null($this->user) || !$this->user->can('checklist-category.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any checklist category!');
        }
        $checklist_categories = ChecklistCategory::all();
        return view('backend.pages.checklist-categories.index',compact('checklist_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('checklist-category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any checklist category!');
        }
        return view('backend.pages.checklist-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('checklist-category.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any checklist category!');
        }
        $request->validate([
            'inputs.*.heading' => 'required',
            'inputs.*.description' => 'nullable',
        ], [
            'inputs.*.heading' => 'The heading field is required!',  
        ]);

        foreach($request->inputs as $key => $value){
            ChecklistCategory::create($value);
        }
        return redirect()->route('admin.checklist.categories.index')->with('success','Checklist created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistCategory $checklistCategory)
    {
        if (is_null($this->user) || !$this->user->can('checklist-category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any checklist category!');
        }
        return view('backend.pages.checklist-categories.edit',compact('checklistCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChecklistCategory $checklistCategory)
    {
        if (is_null($this->user) || !$this->user->can('checklist-category.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update any checklist category!');
        }
        $checklistCategory->heading = $request->heading;
        $checklistCategory->description = $request->description;
        $checklistCategory->save();
        return redirect()->route('admin.checklist.categories.index')->with('success','Checklist updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('checklist-category.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any checklist category!');
        }
        $checklistCategory = ChecklistCategory::find($id);
        $checklistCategory->delete();
        return redirect()->back()->with('success','Checklist Category Deleted Successfully!');

    }
}
