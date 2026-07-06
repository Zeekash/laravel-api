<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Models\Admin;
use App\Models\Company;
use App\Models\CostEstimator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }

        /*
        |--------------------------------------------------------------------------
        | Selected Year
        |--------------------------------------------------------------------------
        | One combined chart ke liye reviews, companies aur leads sab same year
        | se pick honge.
        */
        $year = (int) $request->input('year', date('Y'));

        // Keep these variables because Blade me use ho rahe hain.
        $companiesYear = $year;
        $leadYear = $year;

        /*
        |--------------------------------------------------------------------------
        | Total Cards
        |--------------------------------------------------------------------------
        */
        $total_companies = Company::count();
        $totalLeads = CostEstimator::count();
        $total_reviews = User::count();
        $total_admin = Admin::count();

        $verified_reviews = User::where('user_email_verified', 1)->count();
        $unverified_reviews = User::where('user_email_verified', 0)->count();

        /*
        |--------------------------------------------------------------------------
        | Monthly Reviews Data
        |--------------------------------------------------------------------------
        */
        $reviewRows = User::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->whereNotNull('created_at')
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();

        $reviewsData = array_fill(0, 12, 0);

        foreach ($reviewRows as $row) {
            $reviewsData[$row->month - 1] = (int) $row->count;
        }

        /*
        |--------------------------------------------------------------------------
        | Monthly Companies Data
        |--------------------------------------------------------------------------
        */
        $companyRows = Company::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->whereNotNull('created_at')
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();

        $companiesData = array_fill(0, 12, 0);

        foreach ($companyRows as $row) {
            $companiesData[$row->month - 1] = (int) $row->count;
        }

        /*
        |--------------------------------------------------------------------------
        | Monthly Leads Data
        |--------------------------------------------------------------------------
        */
        $leadRows = CostEstimator::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->whereNotNull('created_at')
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();

        $leadChartData = array_fill(0, 12, 0);

        foreach ($leadRows as $row) {
            $leadChartData[$row->month - 1] = (int) $row->count;
        }

        /*
        |--------------------------------------------------------------------------
        | Latest Records
        |--------------------------------------------------------------------------
        */
        $latestReviews = User::orderByDesc('created_at')
            ->take(5)
            ->get(['id', 'name', 'email', 'created_at']);

        $latestCompanies = Company::orderByDesc('created_at')
            ->take(5)
            ->get(['id', 'company_name', 'company_email', 'is_email_verified', 'created_at']);

        $latestLeads = CostEstimator::orderByDesc('created_at')
            ->take(5)
            ->get(['id', 'name', 'email', 'created_at']);
            
        $pendingApprovals = Company::with('state')
            ->whereIn('is_email_verified', [0, 1])
            ->orderByDesc('created_at')
            ->take(4)
            ->get(['id', 'company_name', 'state_id', 'is_email_verified', 'created_at']);

        /*
        |--------------------------------------------------------------------------
        | Years Dropdown
        |--------------------------------------------------------------------------
        | Reviews, Companies aur Leads teeno tables ke years merge kar diye.
        */
        $reviewYears = User::select(DB::raw('YEAR(created_at) as year'))
            ->whereNotNull('created_at')
            ->distinct()
            ->pluck('year');

        $companyYears = Company::select(DB::raw('YEAR(created_at) as year'))
            ->whereNotNull('created_at')
            ->distinct()
            ->pluck('year');

        $costLeadYears = CostEstimator::select(DB::raw('YEAR(created_at) as year'))
            ->whereNotNull('created_at')
            ->distinct()
            ->pluck('year');

        $years = $reviewYears
            ->merge($companyYears)
            ->merge($costLeadYears)
            ->filter()
            ->unique()
            ->sortDesc()
            ->values();

        if ($years->isEmpty()) {
            $years = collect([$year]);
        }

        // Keep old variables for Blade compatibility.
        $companiesYears = $years;
        $leadYears = $years;

        return view(
            'backend.pages.dashboard.index',
            compact(
                'total_companies',
                'totalLeads',
                'total_reviews',
                'total_admin',
                'reviewsData',
                'companiesData',
                'leadChartData',
                'years',
                'year',
                'companiesYear',
                'companiesYears',
                'leadYears',
                'leadYear',
                'verified_reviews',
                'unverified_reviews',
                'latestReviews',
                'latestCompanies',
                'latestLeads',
                'pendingApprovals'
            )
        );
    }
}