<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CityLivingExpense;
use App\Models\CityPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityLivingExpenseController extends Controller
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
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('city-living-expense.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any city living expense !');
        }
        $city_living_expenses = CityLivingExpense::all();
        return view('backend.pages.city-pages.city-living-expense.index', compact('city_living_expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('city-living-expense.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any city living expense !');
        }

        $city_pages = CityPage::get(['id', 'name']);
        return view('backend.pages.city-pages.city-living-expense.create', compact('city_pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_page_id' => 'required|exists:city_pages,id',
            'basic_utilities'   => 'nullable|string',
            'cell_phone_plan'   => 'nullable|string',
            'dozen_eggs'        => 'nullable|string',
            'loaf_of_bread'     => 'nullable|string',
            'fast_food'         => 'nullable|string',
            'dinner'            => 'nullable|string',
            'gym_membership'    => 'nullable|string',
        ]);

        $city_living_expenses = new CityLivingExpense();
        $city_living_expenses->city_page_id = $request->city_page_id;
        $city_living_expenses->basic_utilities  = $request->basic_utilities;
        $city_living_expenses->cell_phone_plan  = $request->cell_phone_plan;
        $city_living_expenses->dozen_eggs       = $request->dozen_eggs;
        $city_living_expenses->loaf_of_bread    = $request->loaf_of_bread;
        $city_living_expenses->fast_food        = $request->fast_food;
        $city_living_expenses->dinner           = $request->dinner;
        $city_living_expenses->gym_membership   = $request->gym_membership;
        $city_living_expenses->save();

        return redirect()->route('admin.city-living-expense.index')->with('success', 'City Living Expense Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CityLivingExpense $city_living_expenses)
    {
        if (is_null($this->user) || !$this->user->can('city-living-expense.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any city living expense !');
        }
        $city_pages = CityPage::get(['id', 'name']);
        return view('backend.pages.city-pages.city-living-expense.edit', compact('city_living_expenses', 'city_pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CityLivingExpense $city_living_expenses)
    {
        $request->validate([
            'city_page_id' => 'required|exists:city_pages,id',
            'basic_utilities'   => 'nullable|string',
            'cell_phone_plan'   => 'nullable|string',
            'dozen_eggs'        => 'nullable|string',
            'loaf_of_bread'     => 'nullable|string',
            'fast_food'         => 'nullable|string',
            'dinner'            => 'nullable|string',
            'gym_membership'    => 'nullable|string',
        ]);

        $city_living_expenses->city_page_id = $request->city_page_id;
        $city_living_expenses->basic_utilities  = $request->basic_utilities;
        $city_living_expenses->cell_phone_plan  = $request->cell_phone_plan;
        $city_living_expenses->dozen_eggs       = $request->dozen_eggs;
        $city_living_expenses->loaf_of_bread    = $request->loaf_of_bread;
        $city_living_expenses->fast_food        = $request->fast_food;
        $city_living_expenses->dinner           = $request->dinner;
        $city_living_expenses->gym_membership   = $request->gym_membership;
        $city_living_expenses->save();

        return redirect()->route('admin.city-living-expense.index')->with('success', 'City Living Expense Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (is_null($this->user) || !$this->user->can('city-living-expense.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any city living expense !');
        }
        $city_living_expenses = CityLivingExpense::findOrFail($id);
        $city_living_expenses->delete();
        return redirect()->route('admin.city-living-expense.index')->with('success', 'City Living Expense Deleted Successfully!');
    }
}
