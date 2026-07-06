<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyVerify;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegistrationApiController extends Controller
{
    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'company_name' => 'required|string|unique:companies,company_name',
            'email' => 'required|email:rfc,dns|unique:companies,email',
            'password' => 'required|min:8|same:password_confirmation',
            'password_confirmation' => 'required|min:8',

            'company_email' => 'required|email',
            'phone_no' => 'required',
            'company_website' => 'required',
            'company_address' => 'required',
            'street' => 'required',

            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',

            'allow' => 'required',
            'trucks' => 'required',
            'founding_year' => 'required',
            'about_company' => 'required|min:600',
            'us_dot_no' => 'required',
            'icc_mc_license_no' => 'required',

            // jpg/jpeg added also
            'image' => 'required|file|mimes:jpg,jpeg,png,webp,svg|max:5120',
        ], [
            'image.required' => 'Company Logo is required.',
            'image.mimes' => 'Logo must be of type: jpg, jpeg, png, webp, svg.',
            'image.max' => 'Logo must not be greater than 5MB.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $company = $this->create($request);

        $token = Str::random(64);

        CompanyVerify::create([
            'company_id' => $company->id,
            'token' => $token,
        ]);

        Mail::send(
            'emails.companyInWaiting',
            [
                'token' => $token,
                'request' => $request,
            ],
            function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Email Verification Mail');
            }
        );

        return response()->json([
            'success' => true,
            'message' => 'Registration successful. Please check your email for verification.',
            'data' => [
                'company' => $company,
            ],
        ], 201);
    }

    public function create(Request $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file && $file->isValid()) {
                $destinationPath = public_path('companies/image');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $filename = Str::slug($request->company_name)
                    . '-'
                    . time()
                    . '.'
                    . $file->getClientOriginalExtension();

                $file->move($destinationPath, $filename);

                $imagePath = 'companies/image/' . $filename;
            }
        }

        $state = State::findOrFail($request->state_id);

        return Company::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'slug' => Str::slug($request->company_name),
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'company_website' => $request->company_website,
            'company_address' => $request->company_address,
            'street' => $request->street,
            'us_dot_no' => $request->us_dot_no,
            'icc_mc_license_no' => $request->icc_mc_license_no,
            'about_company' => $request->about_company,
            'trucks' => $request->trucks,
            'founding_year' => $request->founding_year,

            // safer than frontend country_id
            'country_id' => $state->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,

            'allow' => $request->allow,
            'password' => Hash::make($request->password),
            'company_ip' => $request->ip(),

            // uploaded image path
            'image' => $imagePath,

            'local_mover' => $request->has('local_mover') ? 1 : 0,
            'long_distance_mover' => $request->has('long_distance_mover') ? 1 : 0,
            'residential_moving' => $request->has('residential_moving') ? 1 : 0,
            'commercial_office_moving' => $request->has('commercial_office_moving') ? 1 : 0,
            'packing_unpacking_services' => $request->has('packing_unpacking_services') ? 1 : 0,
            'storage_services' => $request->has('storage_services') ? 1 : 0,
            'international_moving' => $request->has('international_moving') ? 1 : 0,
            'specialty_moving' => $request->has('specialty_moving') ? 1 : 0,
            'labor_only_moving' => $request->has('labor_only_moving') ? 1 : 0,
            'truck_rental' => $request->has('truck_rental') ? 1 : 0,
            'containers_moving' => $request->has('containers_moving') ? 1 : 0,
        ]);
    }
}