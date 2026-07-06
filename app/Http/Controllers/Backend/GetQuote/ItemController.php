<?php

namespace App\Http\Controllers\Backend\GetQuote;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ItemController extends Controller
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
            abort(403, 'Sorry !! You are Unauthorized to view any estimate item!');
        }

        $item = Item::all();
        return view('backend.pages.estimate-pages.items.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create estimate item!');
        }
        $data['sub_categories'] = SubCategory::get(['name', 'id']);
        return view('backend.pages.estimate-pages.items.create',$data);
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
            'cubic_feet' => 'required|numeric',
            'sub_category_id' => 'required',
        ]);
        
        Item::create([
            'name' => $request->name,
            'cubic_feet' => $request->cubic_feet,
            'sub_category_id' => $request->sub_category_id,

        ]);
         Alert::success('Created', 'Item successfully created.');
        return redirect()
            ->route('admin.estimate-pages.items.index');
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
    public function edit(Item $item)
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit estimate item!');
        }
        $data['sub_categories'] = SubCategory::get(['name', 'id']);
        return view('backend.pages.estimate-pages.items.edit',compact('item'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        request()->validate([
            'name' => 'required',
            'cubic_feet' => 'required',
            'sub_category_id' => 'required',
            
        ]);
        
        $item->name = $request->name;
        $item->cubic_feet = $request->cubic_feet;
        $item->sub_category_id = $request->sub_category_id;
        $item->save();
        Alert::success('Updated', 'Item successfully updated.');
        return redirect()->route('admin.estimate-pages.items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Item $item)
    {
        if (is_null($this->user) || !$this->user->can('estimate-crud.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete estimate item!');
        }
        $item->delete();
        Alert::success('Deleted', 'Item successfully deleted.');
        return redirect()
            ->route('admin.estimate-pages.items.index');
    }
}
