<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Support\Facades\File;
use DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanyController extends Controller
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
        if (is_null($this->user) || !$this->user->can('company.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any company !');
        }

        $fromDate = $request->query('from_date');
        $toDate = $request->query('to_date');
        $status = $request->query('status');

        $query = Company::query();

        if ($fromDate && $toDate) {
            $from = Carbon::parse($fromDate)->startOfDay();
            $to   = Carbon::parse($toDate)->endOfDay();
            $query->whereBetween('created_at', [$from, $to]);
        }

        $baseQuery = clone $query;
        $verified_companies = (clone $baseQuery)->where('is_email_verified', 1)->count();
        $unverified_companies = (clone $baseQuery)->where('is_email_verified', 0)->count();

        if ($status == 'verified') {
            $query->where('is_email_verified', 1);
        } elseif ($status == 'pending') {
            $query->where('is_email_verified', 0);
        }

        $companies = $query->orderBy('id', 'desc')->get();

        $companyData = [];

        foreach ($companies as $company) {
            $count = User::where('company_id', $company->id)->count();
            $companyData[] = [
                'company' => $company,
                'review_count' => $count,
            ];
        }
        // return $companyData;

        return view('backend.pages.companies.index', compact(
            'companyData',
            'verified_companies',
            'unverified_companies',
        ));
    }

    public function companiesexportExcel(Request $request)
    {
        // if (is_null($this->user) || !$this->user->can('company.export-as-pdf')) {
        //     abort(403, 'Sorry !!  You are Unauthorized to export companies!');
        // }

        $query = Company::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $from = Carbon::parse($request->from_date)->startOfDay();
            $to   = Carbon::parse($request->to_date)->endOfDay();
            $query->whereBetween('created_at', [$from, $to]);
        }

        $companies = $query->with('state')->orderBy('id', 'desc')->get();


        $filename = 'Companies_' . now()->format('Ymd_His') . '.xlsx';

        return Excel::download(new class($companies) implements FromCollection, WithHeadings {
            protected $companies;

            public function __construct($companies)
            {
                $this->companies = $companies;
            }

            public function collection()
            {
                return $this->companies->map(function ($company, $key) {

                    return [
                        $key + 1,
                        $company->created_at->format('d-m-Y'),
                        $company->status == 1 ? 'Active' : 'Not Active',
                        $company->email ?? 'N/A',
                        $company->company_name ?? 'N/A',
                        $company->company_email ?? 'N/A',
                        optional($company->state)->name ?? 'Not Available',
                        $company->company_address ?? 'N/A',
                        $company->us_dot_no ?? 'N/A',
                        $company->phone_no ?? 'N/A',
                        $company->is_claimed == 1 ? 'Claimed' : 'Not Claimed',
                        $company->is_email_verified == 1 ? 'Verified' : 'Not Verified',
                    ];
                });
            }

            public function headings(): array
            {
                return [
                    'Sr No',
                    'Create Date',
                    'Is Lead',
                    'Email',
                    'Company Name',
                    'Company Email',
                    'Company State',
                    'Company Address',
                    'D.O.T No',
                    'Phone No',
                    'Status',
                    'Email Verification',
                ];
            }
        }, $filename);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('company.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any company !');
        }
        $data['countries'] = Country::get(['name', 'id']);
        return view('backend.pages.companies.create', $data);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies',
            'company_name' => 'required',
            'company_email' => 'required',
            'password' => 'required',
            'phone_no' => 'required',
            'country_id' => 'required',
            'company_address' => 'required',
            'street' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'company_website' => 'required',
            'image' => 'required|image|mimes:png,webp,svg',
            'trucks' => 'nullable|string',
            'founding_year' => 'nullable|string',
        ], [
            'image.required' => 'Company Logo is required',
            'image.mimetypes' => 'Logo must be of type: png, webp, svg',
        ]);

        $company = new Company();
        $company->admin_id = Auth::guard('admin')->user()->id;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;
        $company->password = Hash::make($request->password);
        $company->phone_no = $request->phone_no;
        $company->country_id = $request->country_id;
        $company->state_id = $request->state_id;
        $company->city_id = $request->city_id;
        $company->street = $request->street;
        $company->company_address = $request->company_address;
        $company->icc_mc_license_no = $request->icc_mc_license_no;
        $company->us_dot_no = $request->us_dot_no;
        $company->company_website = $request->company_website;
        $company->company_ip = request()->ip();
        $company->trucks = $request->trucks;
        $company->founding_year = $request->founding_year;

        // ✅ Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = public_path('companies/image');

            // Create directory if it doesn't exist
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $filename = Str::slug($request->company_name) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            // Save relative path
            $company->image = 'companies/image/' . $filename;
        }

        $company->save();

        Alert::success('Created', 'Company successfully created.');
        return redirect()->route('admin.companies.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        if (is_null($this->user) || !$this->user->can('company.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any company !');
        }
        return view('backend.pages.companies.show', compact('company'));
    }

    public function review(Company $company)
    {
        if (is_null($this->user) || !$this->user->can('company.view')) {
            abort(403, 'Sorry !! You are Unauthorized to review any company !');
        }
        return view('backend.pages.companies.review', compact('company'));
    }

    public function passEdit($id)
    {
        if (is_null($this->user) || !$this->user->can('company.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any company !');
        }
        $company = Company::find($id);
        return view('backend.pages.companies.password', compact('company'));
    }

    public function passUpdate(Request $request, Company $company)
    {
        $request->validate(['password' => 'required']);

        $company->password = Hash::make($request->password);
        $company->update();
        return redirect()->route('admin.companies.index')->with('success', 'Password has been updated');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        if (is_null($this->user) || !$this->user->can('company.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any company !');
        }
        $residentialMoving = $company->residential_moving ? 1 : 0;
        $commercialOfficeMoving = $company->commercial_office_moving ? 1 : 0;
        $packingUnpackingServices = $company->packing_unpacking_services ? 1 : 0;
        $storageServices = $company->storage_services ? 1 : 0;
        $internationalMoving = $company->international_moving ? 1 : 0;
        $specialtyMoving = $company->specialty_moving ? 1 : 0;
        $laborOnlyMoving = $company->labor_only_moving ? 1 : 0;
        $truckRental = $company->truck_rental ? 1 : 0;
        $containersMoving = $company->containers_moving ? 1 : 0;

        // Load countries and states for dropdowns
        $data['countries'] = Country::get(['name', 'id']);
        $data['states'] = State::where('country_id', $company->country_id)
            ->get(['name', 'id']);

        // Pass only the company and data to the view
        return view('backend.pages.companies.edit', compact('company'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'company_name' => 'required',
            'company_email' => 'required',
            'phone_no' => 'required',
            'image' => 'nullable|image|mimes:png,webp,svg',
        ], [
            'image.mimes' => 'Logo must be of type: png, webp, svg',
        ]);

        $company->local_mover = $request->has('local_mover') ? 1 : 0;
        $company->long_distance_mover = $request->has('long_distance_mover') ? 1 : 0;
        $company->residential_moving = $request->has('residential_moving') ? 1 : 0;
        $company->commercial_office_moving = $request->has('commercial_office_moving') ? 1 : 0;
        $company->packing_unpacking_services = $request->has('packing_unpacking_services') ? 1 : 0;
        $company->storage_services = $request->has('storage_services') ? 1 : 0;
        $company->international_moving = $request->has('international_moving') ? 1 : 0;
        $company->specialty_moving = $request->has('specialty_moving') ? 1 : 0;
        $company->labor_only_moving = $request->has('labor_only_moving') ? 1 : 0;
        $company->truck_rental = $request->has('truck_rental') ? 1 : 0;
        $company->containers_moving = $request->has('containers_moving') ? 1 : 0;



        $company->name = $request->name;
        $company->email = $request->email;
        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;
        if ($request->filled('slug')) {
            $slug = \Illuminate\Support\Str::slug($request->slug);
            $exists = \App\Models\Company::where('slug', $slug)->where('id', '!=', $company->id)->exists();
            $company->slug = $exists ? $slug . '-' . $company->id : $slug;
        }
        $company->company_email_domain = $request->company_email_domain;
        $company->meta_title = $request->meta_title;
        $company->meta_description = $request->meta_description;
        $company->meta_keywords = $request->meta_keywords;
        $company->phone_no = $request->phone_no;
        $company->country_id = $request->country_id;
        $company->state_id = $request->state_id;
        $company->city_id = $request->city_id;
        $company->street = $request->street;
        $company->company_website = $request->company_website;
        $company->company_reg_no = $request->company_reg_no;
        $company->us_dot_no = $request->us_dot_no;
        $company->icc_mc_license_no = $request->icc_mc_license_no;
        $company->local_license_no = $request->local_license_no;
        $company->about_company = $request->about_company;
        $company->company_info = $request->company_info;
        $company->company_address = $request->company_address;
        $company->is_email_verified = $request->is_email_verified;
        $company->is_claimed = $request->is_claimed;
        $company->is_featured = $request->is_featured;
        $company->call_per_week = $request->call_per_week;
        $company->call_per_month = $request->call_per_month;
        $company->is_call_active = $request->is_call_active;
        $company->trucks = $request->trucks;
        $company->founding_year = $request->founding_year;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = public_path('companies/image');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            if ($company->image && File::exists(public_path($company->image))) {
                File::delete(public_path($company->image));
            }

            $filename = Str::slug($request->company_name) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $company->image = 'companies/image/' . $filename;
        }

        $company->save();

        Alert::success('Updated', 'Company successfully updated');
        return redirect()->route('admin.companies.index', compact('company'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('company.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete this company !');
        }
        $company = Company::find($id);
        if (!is_null($company)) {
            $company->delete();
        }
        Alert::success('Deleted', 'Successfully deleted.');
        return back();
    }
    public function deleteAll(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('company.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to all delete this companies !');
        }
        $ids = $request->ids;
        DB::table("companies")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => " Deleted successfully."]);
    }

    function companyIsLeadActive($id)
    {
        if (is_null($this->user) || !$this->user->can('company.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any company !');
        }
        $company = Company::find($id);
        if ($company) {
            $company->status = true;
            $company->save();
            return redirect()->route('admin.companies.index')->with('success', 'Company Is Now Active For Leads');
        }
        return redirect()->back()->with('error', 'Company Is Now Not Active For Leads');
    }
    function companyIsLeadUnActive($id)
    {
        if (is_null($this->user) || !$this->user->can('company.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any company !');
        }
        $company = Company::find($id);
        if ($company) {
            $company->status = false;
            $company->save();
            return redirect()->route('admin.companies.review', $id)->with('success', 'Company Is Now Un Active For Leads');
        }
        return redirect()->route('admin.companies.review', $id)->with('error', 'Company Is Now Not Un Active For Leads');
    }
}
