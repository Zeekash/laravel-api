<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\LiveCall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiveCallController extends Controller
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
        if (is_null($this->user) || !$this->user->can('company-live-calls.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any company live calls !');
        }
        $live_calls = LiveCall::all();
        return view('backend.pages.live-calls.index',compact('live_calls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('company-live-calls.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any company live calls !');
        }
        $companies = Company::where('is_call_active', 1)->get();
        $weeklyLimitInfo = [];
    
        foreach ($companies as $company) {
            $now = now();
            $startOfWeek = (clone $now)->startOfWeek();
            $previousWeekStart = (clone $startOfWeek)->subWeek();
            $previousWeekEnd = (clone $startOfWeek)->subDay();
    
            // Calls used in current week
            $weeklyCalls = LiveCall::where('company_id', $company->id)
                ->whereBetween('call_date_time', [$startOfWeek, $now])
                ->count();
    
            // Calls used in last week
            $lastWeekCalls = LiveCall::where('company_id', $company->id)
                ->whereBetween('call_date_time', [$previousWeekStart, $previousWeekEnd])
                ->count();
    
            // Only carry over unused calls if some were made last week
            $unusedCalls = $lastWeekCalls > 0 ? max(0, $company->call_per_week - $lastWeekCalls) : 0;
    
            // Calculate this week's updated limit
            $currentWeekLimit = $company->call_per_week + $unusedCalls;
    
            // Remaining calls for this week
            $remainingCalls = max(0, $currentWeekLimit - $weeklyCalls);
    
            // Store remaining calls info
            $weeklyLimitInfo[$company->id] = $remainingCalls;
        }
    
        return view('backend.pages.live-calls.create', compact('companies', 'weeklyLimitInfo'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'agent_name' => 'required',
            'user_name' => 'required',
            'user_email' => 'required|email',
            'user_phone' => 'required',
            'call_date_time' => 'required|date',
            'call_duration' => 'required',
            'status' => 'required',
        ]);
    
        $company = Company::find($request->company_id);
    
        if (!$company) {
            return back()->withErrors(['company_id' => 'Selected company does not exist.']);
        }
    
        $now = now(); // Current date & time
        $startOfWeek = (clone $now)->startOfWeek(); // Start of the current week
        $endOfWeek = (clone $now)->endOfWeek(); // End of the current week
    
        $previousWeekStart = (clone $startOfWeek)->subWeek();
        $previousWeekEnd = (clone $startOfWeek)->subDay(); // Last day of the previous week
    
        // Count calls in the current week
        $weeklyCalls = LiveCall::where('company_id', $request->company_id)
            ->whereBetween('call_date_time', [$startOfWeek, $now])
            ->count();
    
        // Check last week's call usage
        $lastWeekCalls = LiveCall::where('company_id', $request->company_id)
            ->whereBetween('call_date_time', [$previousWeekStart, $previousWeekEnd])
            ->count();
    
        // Calculate unused calls from the previous week
        $unusedCalls = max(0, $company->call_per_week - $lastWeekCalls);
    
        // Update this week's call limit with the rollover calls
        $currentWeekLimit = $company->call_per_week + $unusedCalls;
    
        // Check weekly limit
        if ($weeklyCalls >= $currentWeekLimit) {
            return back()->withErrors(['company_id' => 'Weekly call limit reached for this company.']);
        }
    
        // Store the new live call record
        LiveCall::create($request->all());
    
        return redirect()->route('admin.live-calls.index')->with('success', 'Live Call created successfully.');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('company-live-calls.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any company live calls !');
        }
        $liveCall = LiveCall::find($id);
        $liveCall->delete();
        return redirect()->route('admin.live-calls.index')->with('success', 'Live Call deleted successfully.');
    }
}
