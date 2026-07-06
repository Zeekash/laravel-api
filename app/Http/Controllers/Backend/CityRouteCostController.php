<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CityRouteCost;
use App\Models\CityPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CityRouteCostController extends Controller
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
        if (is_null($this->user) || !$this->user->can('city-route-cost.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any city route cost!');
        }

        $cityRouteCosts = CityRouteCost::with('cityPage')->latest()->get();
        return view('backend.pages.city-pages.city-route-cost.index', compact('cityRouteCosts'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('city-route-cost.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any city route cost!');
        }

        $cityPages = CityPage::all();
        return view('backend.pages.city-pages.city-route-cost.create', compact('cityPages'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('city-route-cost.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any city route cost!');
        }

        $validated = $request->validate([
            'city_page_id' => 'required|exists:city_pages,id',
            'route_name.*' => 'nullable|string|max:255',
            'route_link.*' => 'nullable|string|max:255',
            'route_value.*' => 'nullable|string|max:255',
        ]);

        $data = [];
        foreach ($request->route_name as $index => $name) {
            if ($name || $request->route_link[$index] || $request->route_value[$index]) {
                $data[] = [
                    'city_page_id' => $request->city_page_id,
                    'route_name' => $name ?? null,
                    'route_link' => $request->route_link[$index] ?? null,
                    'route_value' => $request->route_value[$index] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        if (!empty($data)) {
            CityRouteCost::insert($data);
        }

        Alert::success('Added', 'City Route Cost added successfully.');
        return redirect()->route('admin.city-route-cost.index')->with('success', 'City Route Cost added successfully');
    }

    public function edit(CityRouteCost $cityRouteCost)
    {
        if (is_null($this->user) || !$this->user->can('city-route-cost.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any city route cost!');
        }

        $cityPages = CityPage::all();
        return view('backend.pages.city-pages.city-route-cost.edit', compact('cityRouteCost', 'cityPages'));
    }

    public function update(Request $request, CityRouteCost $cityRouteCost)
    {
        if (is_null($this->user) || !$this->user->can('city-route-cost.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any city route cost!');
        }

        $validated = $request->validate([
            'city_page_id' => 'required|exists:city_pages,id',
            'route_name' => 'nullable|string|max:255',
            'route_link' => 'nullable|string|max:255',
            'route_value' => 'nullable|string|max:255',
        ]);

        $cityRouteCost->update($validated);

        Alert::success('Updated', 'City Route Cost updated successfully.');
        return redirect()->route('admin.city-route-cost.index')->with('success', 'City Route Cost updated successfully');
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('city-route-cost.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any city route cost!');
        }

        $cityRouteCost = CityRouteCost::findOrFail($id);
        $cityRouteCost->delete();

        Alert::success('Deleted', 'City Route Cost deleted successfully');
        return redirect()->route('admin.city-route-cost.index');
    }
}
