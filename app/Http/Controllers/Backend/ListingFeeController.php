<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyListingFee;
use App\Models\FeeSetting;
use App\Models\WaiverCode;
use Illuminate\Http\Request;

class ListingFeeController extends Controller
{
   public function index()
    {
        $fee = FeeSetting::current();

        $totalCollectedCents = CompanyListingFee::where('type', 'listing_fee')
            ->where('status', 'paid')
            ->sum('amount_cents');

        $paidListings = Company::where('listing_fee_status', 'paid')->count();
        $pending = Company::where('listing_fee_status', 'pending')->count();
        $waived = Company::where('listing_fee_status', 'waived')->count();

        $waivers = WaiverCode::latest()->paginate(10);


        return view('backend.pages.listing-fees.index', compact(
            'fee',
            'totalCollectedCents',
            'paidListings',
            'pending',
            'waived',
            'waivers'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'is_enabled' => ['required', 'boolean'],
            'amount' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'max:10'],
            'description_for_partners' => ['nullable', 'string'],
        ]);

        $fee = FeeSetting::current();

        $fee->update([
            'is_enabled' => (bool) $request->is_enabled,
            'amount_cents' => (int) round($request->amount * 100),
            'currency' => strtoupper($request->currency),
            'description_for_partners' => $request->description_for_partners,
        ]);

        // 👇 Return JSON if AJAX
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Fee settings updated successfully',
            ]);
        }

        return back()->with('success', 'Fee settings updated successfully.');
    }
}
