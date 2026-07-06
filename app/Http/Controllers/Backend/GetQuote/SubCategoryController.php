<?php

namespace App\Http\Controllers\Backend\GetQuote;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
        if (is_null($this->user) || !$this->user->can('estimate-crud.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any estimate sub category!');
        }
        $sub_category = SubCategory::all();
        return view('backend.pages.estimate-pages.sub-categories.index',compact('sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create estimate sub category!');
        }
        $data['categories'] = Category::get(['name', 'id']);
        return view('backend.pages.estimate-pages.sub-categories.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         request()->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        Alert::success('Created', 'Sub Category successfully created.');
        return redirect()->route('admin.estimate-pages.sub-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.view')) {
            abort(404, 'not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $sub_category)
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit estimate sub category!');
        }
        $data['categories'] = Category::get(['name', 'id']);
        return view('backend.pages.estimate-pages.sub-categories.edit',compact('sub_category'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $sub_category)
    {
        request()->validate([
            'name' => 'required',
            'category_id' => 'required',
            
        ]);
        
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->save();
        Alert::success('Updated', 'Sub Category successfully updated.');
        return redirect()->route('admin.estimate-pages.sub-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any estimate sub category!');
        }
        $sub_category->delete();
        Alert::success('Deleted', 'Sub Category successfully deleted.');
        return redirect()
            ->route('admin.estimate-pages.sub-categories.index');
    }
}
