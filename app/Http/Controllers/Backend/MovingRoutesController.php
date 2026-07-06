<?php

namespace App\Http\Controllers\Backend;

use App\Models\MovingRoute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovingRoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moving_routes = MovingRoute::all();
        return view('backend.pages.moving-routes.index',compact('moving_routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.pages.moving-routes.create');
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
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'upper_content' => 'required',
            'lower_content' => 'required',
        ]);
    
        $movingRoute = new MovingRoute();
        $movingRoute->title = $request->title;
        $movingRoute->slug = Str::slug($request->slug);
        $movingRoute->meta_title = $request->meta_title;
        $movingRoute->meta_description = $request->meta_description;
        $movingRoute->upper_content = $request->upper_content;
        $movingRoute->lower_content = $request->lower_content;
        $movingRoute->save();
        return redirect()->route('admin.moving-route.index')->with('success','Moving Route Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MovingRoute $movingRoute)
    {
        return view('backend.pages.moving-routes.edit',compact('movingRoute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovingRoute $movingRoute)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'upper_content' => 'required',
            'lower_content' => 'required',
        ]);
    
        $movingRoute->title = $request->title;
        $movingRoute->slug = Str::slug($request->slug);
        $movingRoute->meta_title = $request->meta_title;
        $movingRoute->meta_description = $request->meta_description;
        $movingRoute->upper_content = $request->upper_content;
        $movingRoute->lower_content = $request->lower_content;
        $movingRoute->save();
        return redirect()->route('admin.moving-route.index')->with('success','Moving Route Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movingRoute = MovingRoute::find($id);
        $movingRoute->delete();
        return redirect()->back()->with('success','Moving Route Deleted Successfully.');
    }
}