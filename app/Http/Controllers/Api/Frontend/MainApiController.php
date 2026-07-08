<?php

namespace App\Http\Controllers\Api\Frontend;

use \URL;
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

    public function searchCompaniesApi(Request $request, $slug = null)
    {
        $search = $request->input('term') ?? $request->input('search');

        $query = \App\Models\Company::where('is_email_verified', 1);

        if ($slug) {
            $query->where('slug', $slug);
        } elseif ($search) {
            $query->where('company_name', 'LIKE', '%' . $search . '%');
        }

        $companies = $query->select(
            'id',
            'company_name',
            'slug',
            'image',
            'company_address',
            'company_website',
            'phone_no',
            'additional_phone_no'
        )->paginate(10);

        $results = [];
        foreach ($companies as $company) {
            $imageUrl = null;
            if ($company->image) {
                $imageUrl = str_starts_with($company->image, 'companies/image/')
                    ? URL::to('/' . $company->image)
                    : \URL::to('/companies/image/' . $company->image);
            } else {
                $imageUrl = \URL::to('/img/samplelogo.webp');
            }

            $results[] = [
                'id' => $company->id,
                'label' => $company->company_name, // 'label' is used for display in autocomplete
                'value' => $company->company_name,
                'slug' => $company->slug,
                'image' => $imageUrl,
                'address' => $company->company_address ?? 'Not Found',
                'website' => $company->company_website,
                'phone' => $company->phone_no,
                'additional_phone' => $company->additional_phone_no
            ];
        }

        return response()->json([
            'data' => $results,
            'current_page' => $companies->currentPage(),
            'last_page' => $companies->lastPage(),
            'links' => (string) $companies->links()
        ]);
    }
}
