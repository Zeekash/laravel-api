<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CityAvgCost;
use App\Models\CityPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CityAvgCostController extends Controller
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
        if (is_null($this->user) || !$this->user->can('city-avg-cost.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any city average cost !');
        }

        $cityAvgCosts = CityAvgCost::with('cityPage')->latest()->get();
        return view('backend.pages.city-pages.city-avg-cost.index', compact('cityAvgCosts'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('city-avg-cost.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any city average cost !');
        }

        $cityPages = CityPage::all();
        return view('backend.pages.city-pages.city-avg-cost.create', compact('cityPages'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-avg-cost.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any city average cost !');
        }

        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.avg_cost' => 'nullable|string|max:255',
            'items.*.cost_hour' => 'nullable|string|max:255',
            'items.*.city_page_id' => 'required|exists:city_pages,id',
        ]);

        foreach ($validated['items'] as $item) {
            CityAvgCost::create($item);
        }

        Alert::success('Added', 'City Average Cost(s) added successfully.');
        return redirect()->route('admin.city-avg-cost.index')
                         ->with('success', 'City Average Cost(s) added successfully.');
    }

    public function edit(CityAvgCost $cityAvgCost)
    {
        if (is_null($this->user) || !$this->user->can('city-avg-cost.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any city average cost !');
        }

        $cityPages = CityPage::all();
        return view('backend.pages.city-pages.city-avg-cost.edit', compact('cityAvgCost', 'cityPages'));
    }

    public function update(Request $request, CityAvgCost $cityAvgCost)
{
    $validated = $request->validate([
        'items' => 'required|array',
        'items.*.city_page_id' => 'required|exists:city_pages,id',
        'items.*.avg_cost' => 'nullable|string|max:255',
        'items.*.cost_hour' => 'nullable|string|max:255',
    ]);

    $firstItem = $validated['items'][0];
    $cityAvgCost->update($firstItem);

 
    if (count($validated['items']) > 1) {
        for ($i = 1; $i < count($validated['items']); $i++) {
            CityAvgCost::create($validated['items'][$i]);
        }
    }

    Alert::success('Updated', 'City Average Cost updated successfully.');
    return redirect()->route('admin.city-avg-cost.index');
}


    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('city-avg-cost.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any city average cost !');
        }

        $cityAvgCost = CityAvgCost::findOrFail($id);
        $cityAvgCost->delete();

        Alert::success('Deleted', 'City Average Cost deleted successfully.');
        return redirect()->route('admin.city-avg-cost.index');
    }
}
