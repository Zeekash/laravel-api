<?php

namespace App\Http\Controllers\Backend;

use App\Models\Company;
use App\Models\CompanyFaq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompanyFaqController extends Controller
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
        if (is_null($this->user) || !$this->user->can('company-faq.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any company Faq !');
        }
        $company_faq = CompanyFaq::all();
        return view('backend.pages.company-faq.index', compact('company_faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('company-faq.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any company Faq !');
        }
        $companies = Company::get(['id', 'company_name']);
        return view('backend.pages.company-faq.create', compact('companies'));
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
            'inputs.*.question' => 'required',
            'inputs.*.answer' => 'required',
            'inputs.*.company_id' => 'required'
        ],
        [
            'inputs.*.question' => 'The question field is required!',
            'inputs.*.answer' => 'The answer field is required!',
            'inputs.*.company_id' => 'The answer field is required!',
        ]);
        foreach($request->inputs as $key => $value){
            CompanyFaq::create($value);

        }
        return redirect()->route('admin.company-faq.index')->with('success','Added Successfully');
    
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
        //
    }
}
