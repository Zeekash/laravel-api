<?php

namespace App\Http\Controllers\Backend\GetQuote;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            abort(403, 'Sorry !! You are Unauthorized to view any estimate category !');
        }
        $category = Category::all();
        return view('backend.pages.estimate-pages.categories.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create estimate category !');
        }
        return view('backend.pages.estimate-pages.categories.create');
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
        ]);

        Category::create([
            'name' => $request->name,
        ]);
        Alert::success('Created', 'Category successfully created.');
        return redirect()
            ->route('admin.estimate-pages.categories.index');
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
    public function edit(Category $category)
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit estimate category !');
        }
        return view('backend.pages.estimate-pages.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        request()->validate([
            'name' => 'required',
            
        ]);
        
        $category->name = $request->name;
        $category->save();
        Alert::success('Updated', 'Category successfully updated.');
        return redirect()->route('admin.estimate-pages.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Category $category)
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete estimate category!');
        }
        $category->delete();
        Alert::success('Deleted', 'Category successfully deleted.');
        return redirect()->route('admin.estimate-pages.categories.index');
    }
}
