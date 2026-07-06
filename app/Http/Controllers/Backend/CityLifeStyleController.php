<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CityLifeStyle;
use App\Models\CityPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CityLifeStyleController extends Controller
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
        if (is_null($this->user) || !$this->user->can('city-life-style.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any city life style!');
        }
        $city_life_styles = CityLifeStyle::all();
        return view('backend.pages.city-pages.life-styles.index', compact('city_life_styles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('city-life-style.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city life style!');
        }
        $city_pages = CityPage::get(['id', 'name']);
        return view('backend.pages.city-pages.life-styles.create', compact('city_pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-life-style.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city life style!');
        }
        $request->validate([
            'city_page_id' => 'required|exists:city_pages,id',
        ]);

        $cityLifeStyle = new CityLifeStyle();
        $cityLifeStyle->city_page_id = $request->city_page_id;
        $cityLifeStyle->population = $request->population;
        $cityLifeStyle->crime_index = $request->crime_index;
        $cityLifeStyle->summer_high = $request->summer_high;
        $cityLifeStyle->winter_low = $request->winter_low;
        $cityLifeStyle->annual_rainfall = $request->annual_rainfall;
        $cityLifeStyle->annual_snowfall = $request->annual_snowfall;
        $cityLifeStyle->political_leaning = $request->political_leaning;
        $cityLifeStyle->transportation_score = $request->transportation_score;
        $cityLifeStyle->walkability_score = $request->walkability_score;
        $cityLifeStyle->bike_friendliness_score = $request->bike_friendliness_score;
        $cityLifeStyle->safety_index = $request->safety_index;
        $cityLifeStyle->air_quality = $request->air_quality;
        $cityLifeStyle->save();

        return redirect()->route('admin.cityLifeStyle.index')->with('success', 'City Life Style Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CityLifeStyle $cityLifeStyle)
    {
        if (is_null($this->user) || !$this->user->can('city-life-style.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit city life style!');
        }
        $city_pages = CityPage::get(['id', 'name']);
        return view('backend.pages.city-pages.life-styles.edit', compact('city_pages','cityLifeStyle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityLifeStyle $cityLifeStyle)
    {
        if (is_null($this->user) || !$this->user->can('city-life-style.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update city life style!');
        }
        $request->validate([
            'city_page_id' => 'required|exists:city_pages,id',
        ]);

        $cityLifeStyle->city_page_id = $request->city_page_id;
        $cityLifeStyle->population = $request->population;
        $cityLifeStyle->crime_index = $request->crime_index;
        $cityLifeStyle->summer_high = $request->summer_high;
        $cityLifeStyle->winter_low = $request->winter_low;
        $cityLifeStyle->annual_rainfall = $request->annual_rainfall;
        $cityLifeStyle->annual_snowfall = $request->annual_snowfall;
        $cityLifeStyle->political_leaning = $request->political_leaning;
        $cityLifeStyle->transportation_score = $request->transportation_score;
        $cityLifeStyle->walkability_score = $request->walkability_score;
        $cityLifeStyle->bike_friendliness_score = $request->bike_friendliness_score;
        $cityLifeStyle->safety_index = $request->safety_index;
        $cityLifeStyle->air_quality = $request->air_quality;
        $cityLifeStyle->save();

        return redirect()->route('admin.cityLifeStyle.index')->with('success', 'City Life Style Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('city-life-style.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete city life style!');
        }
        $cityLifeStyle = CityLifeStyle::find($id);
        $cityLifeStyle->delete();
        Alert::success('Deleted', 'City Life Style Deleted Successfully.');

        return redirect()->back()->with('success', 'City Life Style Deleted Successfully');
    }
}
