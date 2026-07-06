<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;;

class SignUpController extends Controller
{

    public function submit(Request $request)
    {
        $company = new Company();

        $company->name              = $request->name;
        $company->company_email     = $request->company_email;
        $company->email             = $request->company_email;
        $company->phone_no          = $request->phone_no ;
        $company->company_name      = $request->company_name;
        $company->slug              = Str::slug($request->company_name);
        $company->password          = Hash::make('11223344');
        $company->us_dot_no         = $request->us_dot_no;
        $company->icc_mc_license_no = $request->icc_mc_license_no;
        $company->company_website   = $request->company_website;
        $company->company_address   = $request->company_address;
        $company->company_ip        = $request->ip();

        Mail::send('emails.companyInWaiting', ['token' => $token, 'request' => $request], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
        
        $company->save(); // ✅ SAVES TO DB
        
        $payload = [
            'name'              => $company->name,
            'company_email'     => $company->company_email,
            'phone_no'          => $company->phone_no,
            'company_name'      => $company->company_name,
            'us_dot_no'         => $company->us_dot_no,
            'icc_mc_license_no' => $company->icc_mc_license_no,
            'company_website'   => $company->company_website,
        ];

        $response = Http::asJson()->post(
            // 'https://mymovingjourney.app.n8n.cloud/webhook/46c5bd2a-f71c-4e74-9ab4-71f214065b26',
            'https://mymovingjourney.app.n8n.cloud/webhook-test/46c5bd2a-f71c-4e74-9ab4-71f214065b26',
            $payload
        );

        if ($response->failed()) {
            \Log::error('n8n webhook failed', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);
        }
        Mail::send('emails.companyInWaiting', ['token' => $token, 'request' => $request], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
        
        return redirect()->back()->with('success', 'Signup submitted successfully');
    }
}