<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class MainApiController extends Controller
{
    public function states()
    {
        $states = State::where('country_id', 1)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json([
            'success' => true,
            'states' => $states,
        ]);
    }

    public function fetchCities(Request $request)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
        ]);

        $cities = City::where('state_id', $request->query('state_id'))
            ->orderBy('name')
            ->get(['id', 'name', 'zip_code']);

        return response()->json([
            'success' => true,
            'cities' => $cities,
        ]);
    }
}