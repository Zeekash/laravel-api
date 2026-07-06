<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CompareCompanyController extends Controller
{
    public function comparePage()
    {
        $data = Company::select('id', 'company_name', 'image')->where('is_email_verified', 1)->has('verifiedUsers')->orderBy('company_name', 'asc')->get();

        return view('frontend.company_auth.compare_companies', compact('data'));
    }

    public function fetchCompanyById(string $id)
    {
        $data = Company::select([
            'companies.id',
            'companies.company_name',
            'companies.image',
            'companies.slug',
            'companies.us_dot_no',
            'companies.icc_mc_license_no',
            'companies.founding_year',
            'companies.trucks',
            // 'companies.is_claimed',
            // 'companies.local_mover',
            // 'companies.long_distance_mover',
            // 'companies.phone_no',
            // 'companies.company_website',
            // 'companies.street',
            // 'companies.state_id',
            // 'companies.city_id',
        ])
        // ->with([
        //     'state:id,name,abv',
        //     'city:id,name'
        // ])
        ->withCount('verifiedUsers as total_reviews')
        ->withAvg('verifiedUsers as average_rating', 'overall_rating')
        ->withAvg('verifiedUsers as average_price', 'service_cost')
        ->where('id', $id)
        ->first();

        $rawImage = $data->image;
        if ($rawImage) {
            $imageUrl = str_starts_with($rawImage, 'companies/image/')
                ? url('/' . $rawImage)
                : url('/companies/image/' . $rawImage);
            
            $data->image = $imageUrl;
        } else {
            $data->image = asset('img/samplelogo.webp');
        }

        return response()->json($data);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $exclude = $request->get('exclude', []);
        $companies = Company::where('company_name', 'like', "%$query%")
            ->whereNotIn('id', $exclude)
            // ->take(10)
            ->get(['id', 'name', 'company_name']);
        return response()->json($companies);
    }
}