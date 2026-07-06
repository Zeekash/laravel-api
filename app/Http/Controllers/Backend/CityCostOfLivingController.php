<?php

namespace App\Http\Controllers\Backend;

use App\Models\CityPage;
use Illuminate\Http\Request;
use App\Models\CityCostOfLiving;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CityCostOfLivingController extends Controller
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
        if (is_null($this->user) || !$this->user->can('city-cost-of-living.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view this page!');
        }
        $city_cost_of_livings = CityCostOfLiving::all();
        return view('backend.pages.city-pages.cost-of-livings.index', compact('city_cost_of_livings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('city-cost-of-living.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city cost of living!');
        }
        $city_pages = CityPage::get(['id', 'name']);
        return view('backend.pages.city-pages.cost-of-livings.create', compact('city_pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-cost-of-living.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create city cost of living!');
        }
        $request->validate([
            'city_page_id' => 'required|exists:city_pages,id',
        ]);

        $cityCostOfLiving = new CityCostOfLiving();
        $cityCostOfLiving->city_page_id = $request->city_page_id;
        $cityCostOfLiving->avg_rent_cost = $request->avg_rent_cost;
        $cityCostOfLiving->avg_home_cost = $request->avg_home_cost;
        $cityCostOfLiving->avg_income = $request->avg_income;
        $cityCostOfLiving->cost_of_living_single = $request->cost_of_living_single;
        $cityCostOfLiving->cost_of_living_family = $request->cost_of_living_family;
        $cityCostOfLiving->unemployment_rate = $request->unemployment_rate;
        $cityCostOfLiving->avg_sales_tax = $request->avg_sales_tax;
        $cityCostOfLiving->cost_of_living_index = $request->cost_of_living_index;
        $cityCostOfLiving->state_income_tax = $request->state_income_tax;
        $cityCostOfLiving->avg_1_br_rent = $request->avg_1_br_rent;
        $cityCostOfLiving->avg_3_br_rent = $request->avg_3_br_rent;
        $cityCostOfLiving->save();

        return redirect()->route('admin.cityCostOfLiving.index')->with('success', 'City Cost Of Living Created Successfully');
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
    public function edit(CityCostOfLiving $cityCostOfLiving)
    {
        if (is_null($this->user) || !$this->user->can('city-cost-of-living.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit city cost of living!');
        }
        $city_pages = CityPage::get(['id', 'name']);
        return view('backend.pages.city-pages.cost-of-livings.edit', compact('city_pages','cityCostOfLiving'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityCostOfLiving $cityCostOfLiving)
    {
        if (is_null($this->user) || !$this->user->can('city-cost-of-living.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to update city cost of living!');
        }
        $request->validate([
            'city_page_id' => 'required|exists:city_pages,id',
        ]);

        $cityCostOfLiving->city_page_id = $request->city_page_id;
        $cityCostOfLiving->avg_rent_cost = $request->avg_rent_cost;
        $cityCostOfLiving->avg_home_cost = $request->avg_home_cost;
        $cityCostOfLiving->avg_income = $request->avg_income;
        $cityCostOfLiving->cost_of_living_single = $request->cost_of_living_single;
        $cityCostOfLiving->cost_of_living_family = $request->cost_of_living_family;
        $cityCostOfLiving->unemployment_rate = $request->unemployment_rate;
        $cityCostOfLiving->avg_sales_tax = $request->avg_sales_tax;
        $cityCostOfLiving->cost_of_living_index = $request->cost_of_living_index;
        $cityCostOfLiving->state_income_tax = $request->state_income_tax;
        $cityCostOfLiving->avg_1_br_rent = $request->avg_1_br_rent;
        $cityCostOfLiving->avg_3_br_rent = $request->avg_3_br_rent;
        $cityCostOfLiving->save();

        return redirect()->route('admin.cityCostOfLiving.index')->with('success', 'City Cost Of Living Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('city-cost-of-living.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete city cost of living!');
        }
        $cityCostOfLiving = CityCostOfLiving::find($id);
        $cityCostOfLiving->delete();
        Alert::success('Deleted', 'City Cost Of Living Deleted Successfully.');

        return redirect()->back()->with('success', 'City Cost Of Living Deleted Successfully');
    }
}
