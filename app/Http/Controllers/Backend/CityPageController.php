<?php

namespace App\Http\Controllers\Backend;

use App\Models\State;
use App\Models\CityPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CityPageController extends Controller
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
        if (is_null($this->user) || !$this->user->can('city-page.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any city page!');
        }
        $trashedCount = CityPage::onlyTrashed()->count();
        $city_pages = CityPage::withoutTrashed()->get();
        return view('backend.pages.city-pages.index', compact('city_pages', 'trashedCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('city-page.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city page!');
        }
        $states = State::all();
        return view('backend.pages.city-pages.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-page.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city page!');
        }
        $request->validate([
            'name' => 'required',
            // 'upper_content' => 'required',
            // 'lower_content' => 'required',
            'state_id' => 'required',
        ]);

        $cityPage = new CityPage();
        $cityPage->name = $request->name;
        $cityPage->slug = Str::slug( $request->slug);
        $cityPage->meta_title = $request->meta_title;
        $cityPage->meta_description = $request->meta_description;
        // $cityPage->upper_content = $request->upper_content;
        // $cityPage->lower_content = $request->lower_content;
        $cityPage->state_id = $request->state_id;
        $cityPage->created_by_id = auth()->guard('admin')->id();
        $cityPage->save();
        return redirect()->route('admin.citypages.create')->with('success','City Page Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CityPage $cityPage)
    {
        if (is_null($this->user) || !$this->user->can('city-page.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit city page!');
        }
        $states = State::all();
        return view('backend.pages.city-pages.edit',compact('cityPage','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityPage $cityPage)
    {
        if (is_null($this->user) || !$this->user->can('city-page.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update city page!');
        }
        $request->validate([
            'name' => 'required',
            // 'upper_content' => 'required',
            // 'lower_content' => 'required',
            'state_id' => 'required',
            'slug' => 'required',
        ]);

        $cityPage->name = $request->name;
        $cityPage->slug = Str::slug($request->slug);
        $cityPage->meta_title = $request->meta_title;
        $cityPage->meta_description = $request->meta_description;
        // $cityPage->upper_content = $request->upper_content;
        // $cityPage->lower_content = $request->lower_content;
        $cityPage->state_id = $request->state_id;
        $cityPage->save();
        return redirect()->route('admin.citypages.index')->with('success', 'City Page Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('city-page.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete city page!');
        }
        $cityPage = CityPage::find($id);
        $cityPage->deleted_by_id = auth()->guard('admin')->id();
        $cityPage->save();
        $cityPage->delete();
        Alert::success('Deleted', 'City Page Deleted Successfully.');
        return redirect()->back();
    }

    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('city-page.view-trash')) {
            abort(403, 'Sorry !! You are Unauthorized to view any trashed city page!');
        }

        $cityPages = CityPage::onlyTrashed()->get();
        return view('backend.pages.city-pages.trashed', compact('cityPages'));
    }

    public function restore($id)
    {
        if (is_null($this->user) || !$this->user->can('city-page.restore')) {
            abort(403, 'Sorry !! You are Unauthorized to restore city page!');
        }

        $cityPage = CityPage::withTrashed()->findOrFail($id);
        $cityPage->deleted_by_id = null;
        $cityPage->save();
        $cityPage->restore();
        Alert::success('Restored', 'City Page Restored Successfully.');
        return back();
    }

    public function forceDelete($id)
    {
        if (is_null($this->user) || !$this->user->can('city-page.force-delete')) {
            abort(403, 'Sorry !! You are Unauthorized to force delete city page!');
        }
        $cityPage = CityPage::withTrashed()->findOrFail($id);
        $cityPage->forceDelete();
        Alert::success('Deleted', 'City Page deleted permanently.');
        return back();
    }
}
