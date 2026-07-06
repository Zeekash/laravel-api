<?php

namespace App\Http\Controllers\Company\Auth;

use App\Exports\CompanyQuoteExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Mail\AdminLeadNotification;
use App\Mail\ExtraLeadInvoice;
use App\Models\Admin;
use App\Models\BestStatePage;
use App\Models\BestStatePageFaq;
use App\Models\Category;
use App\Models\Checklist;
use App\Models\City;
use App\Models\CityAvgCost;
use App\Models\CityPage;
use App\Models\CityRouteCost;
use App\Models\Comment;
use App\Models\Company;
use App\Models\CompanyClaim;
use App\Models\CompanyClaimVerify;
use App\Models\CompanyFaq;
use App\Models\CompanyInfo;
use App\Models\CompanyLeadPlanSubscription;
use App\Models\CompanyVerify;
use App\Models\ContactMover;
use App\Models\ContactUs;
use App\Models\CostEstimator;
use App\Models\Country;
use App\Models\Dispute;
use App\Models\GetQuote;
use App\Models\LeadSubscriptionPlan;
use App\Models\LiveCall;
use App\Models\LiveCallDispute;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ResourceBottomMover;
use App\Models\ResourceOtherMover;
use App\Models\ResourcePage;
use App\Models\ResourcePageFaq;
use App\Models\ResourceTopMover;
use App\Models\State;
use App\Models\StateCostPage;
use App\Models\StateCostPageFaq;
use App\Models\SubCategory;
use App\Models\Subscription;
use App\Models\UserContactUs;
use App\Models\UserVerify;
use App\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use URL;
use Validator;

class CompanyAuthController extends Controller
{
    /**
     * Company Login From
     */
    public function index()
    {

        return view('frontend.company_auth.login');
    }

    /**
     * Company Register Form
     */
    public function register()
    {

        return view('frontend.company_auth.register');
    }

    /**
     * Single Company Reviews
     */
    public function companyshow(Company $company, User $user,)
    {

        $company_faq = CompanyFaq::where('company_id', $company->id)->get();
        // $users = User::get();
        // $usersUnique = $users->unique(['pick_up_state_id']);
        // $userDuplicates = $users->diff($usersUnique);
        // return $userDuplicates;
        // die();
        // $company_info = CompanyInfo::where('company_id',$company->id)->get();
        // return $company_info;

        $reviewId = request()->input('id');
        $review = $reviewId ? User::where('user_email_verified', 1)->find($reviewId) : null;

        $currentDate =  Carbon::now()->format('M Y');
        $admin = Admin::all();
        $post = Post::orderBy('id', 'desc')->take(3)->get();

        $state_op = User::where('user_email_verified', 1)->where('company_id', $company->id)->get();
        $usersUnique = $state_op->unique(['pick_up_state_id']);
        // return $usersUnique;
        // die();
        $total_reviews = User::where('user_email_verified', 1)->where('company_id', $company->id)->count();
        $total_rating = User::where('user_email_verified', 1)->where('company_id', $company->id)->sum(
            'overall_rating'
        );
        $total_cost = User::where('user_email_verified', 1)->where('company_id', $company->id)->sum(
            'service_cost'
        );

        $min_price = User::where('user_email_verified', 1)->where('company_id', $company->id)->min('service_cost');
        $max_price = User::where('user_email_verified', 1)->where('company_id', $company->id)->max('service_cost');

        $min_rating = User::where('user_email_verified', 1)->where('company_id', $company->id)->min('overall_rating');
        $max_rating = User::where('user_email_verified', 1)->where('company_id', $company->id)->max('overall_rating');
        // return $min_rating;
        // return $max_rating;

        if ($total_reviews > 0) {
            $avg_cost = $total_cost / $total_reviews;
        } else {
            $avg_cost = 0;
        }

        $star_5 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 5)->count();

        if ($total_reviews > 0) {
            $per_5 = ($star_5 / $total_reviews) * 100;
        } else {
            $per_5 = 0;
        }

        $star_4 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 4)->count();

        if ($total_reviews > 0) {
            $per_4 = ($star_4 / $total_reviews) * 100;
        } else {
            $per_4 = 0;
        }

        $star_3 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 3)->count();

        if ($total_reviews > 0) {
            $per_3 = ($star_3 / $total_reviews) * 100;
        } else {
            $per_3 = 0;
        }


        $star_2 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 2)->count();

        if ($total_reviews > 0) {
            $per_2 = ($star_2 / $total_reviews) * 100;
        } else {
            $per_2 = 0;
        }

        $star_1 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 1)->count();

        if ($total_reviews > 0) {
            $per_1 = ($star_1 / $total_reviews) * 100;
        } else {
            $per_1 = 0;
        }

        $reviews = User::orderBy('overall_rating', 'asc')
            ->where('user_email_verified', 1)
            ->where('company_id', $company->id)->take(4)->get();

        if (\Request::get('sort') == 'rate_asc') {
            $reviews = User::orderBy('overall_rating', 'asc')
                ->where('user_email_verified', 1)
                ->where('company_id', $company->id)->paginate(10);
        } elseif (\Request::get('sort') == 'rate_desc') {
            $reviews = User::orderBy('overall_rating', 'desc')
                ->where('user_email_verified', 1)
                ->where('company_id', $company->id)->paginate(10);
        } elseif (\Request::get('sort') == 'oldest') {
            $reviews = User::orderBy('created_at', 'asc')
                ->where('user_email_verified', 1)
                ->where('company_id', $company->id)->paginate(10);
        } elseif (\Request::get('sort') == 'newest') {
            $reviews = User::orderBy('created_at', 'desc')
                ->where('user_email_verified', 1)
                ->where('company_id', $company->id)->paginate(10);
        } else {
            $reviews = User::orderBy('created_at', 'desc')->where('user_email_verified', 1)->where('company_id', $company->id)->paginate(10);
        }
        $pagePaginate = $reviews->links();
        $company_state = $company->state_id;
        // Get companies for comparison (excluding current company)
        $comparison_companies = Company::where('is_email_verified', 1)->where('state_id', $company_state)
            ->where('id', '!=', $company->id)
            ->withCount(['users' => function ($query) {
                $query->where('user_email_verified', 1);
            }])
            ->with(['users' => function ($query) {
                $query->where('user_email_verified', 1)
                    ->select('company_id', 'overall_rating', 'service_cost')  // Ensure service_cost is selected
                    ->groupBy('company_id', 'service_cost');  // Group by service_cost to avoid errors
            }])
            ->get()
            ->map(function ($company) {
                $total_reviews = $company->users_count ?? 0;
                $total_rating = $company->users->sum('overall_rating') ?? 0;
                $total_cost = $company->users->sum('service_cost') ?? 0;

                // Calculate average rating
                $company->average_rating = $total_reviews > 0 ? $total_rating / $total_reviews : 0;

                // Calculate average price (service cost per review)
                $company->average_price = $total_reviews > 0 ? $total_cost / $total_reviews : 0;

                $company->total_reviews = $total_reviews;

                return $company;
            });
        if ($total_reviews > 0) {
            $avg_rating = $total_rating / $total_reviews;
        } else {
            $avg_rating = 0;
        }

        // Base query for all verified users in the company
        $base = User::query()
            ->where('user_email_verified', 1)
            ->where('company_id', $company->id);

        // Count total valid reviews (with non-null ratings)
        $total_reviews = (clone $base)
            ->whereNotNull('overall_rating')
            ->count();

        // Negative reviews: rating between 0.1 and 3.0
        $negative_reviews = (clone $base)
            ->where('overall_rating', '>', 0.1)
            ->where('overall_rating', '<=', 3)
            ->count();

        // Positive reviews: rating between 3.1 and 5.0
        $positive_reviews = (clone $base)
            ->where('overall_rating', '>=', 3.1)
            ->where('overall_rating', '<=', 5)
            ->count();

        // Calculate percentages
        if ($total_reviews > 0) {
            $negative_percentage = round(($negative_reviews / $total_reviews) * 100, 2);
            $positive_percentage = round(($positive_reviews / $total_reviews) * 100, 2);
        } else {
            $negative_percentage = 0;
            $positive_percentage = 0;
        }
        if ($company->is_email_verified == 1) {
            return view(
                'frontend.company_auth.show',
                compact(
                    'company',
                    'user',
                    'total_reviews',
                    'avg_rating',
                    'admin',
                    'post',
                    'reviews',
                    'avg_cost',
                    'star_5',
                    'star_4',
                    'star_3',
                    'star_2',
                    'star_1',
                    'per_5',
                    'per_4',
                    'per_3',
                    'per_2',
                    'per_1',
                    'state_op',
                    'usersUnique',
                    'min_price',
                    'max_price',
                    'min_rating',
                    'max_rating',
                    'currentDate',
                    'company_faq',
                    'pagePaginate',
                    'review',
                    'comparison_companies',
                    'negative_reviews',
                    'positive_reviews',
                    'negative_percentage',
                    'positive_percentage',
                    'state_op'
                )
            );
        } else {
            // return view(
            //     'frontend.company_auth.show',
            // );
            abort('404');
        }
    }

    /**
     * Company  Login Submit
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('company')->attempt($credentials)) {

            // Notification Model
            $authenticatedCompany = Auth::guard('company')->user();
            $companyName = $authenticatedCompany->company_name;

            $notification = new Notification();
            $notification->name = $companyName;
            $notification->msg = "Login";
            // $notification->status=true;
            $notification->save();
            return redirect()->route('company.dashboard')->with('success', 'Login successfully');
        }

        return redirect()->route('login')->with('error', 'Opps! You have entered invalid credentials');
    }

    /**
     * Company  Register Submit
     */
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_name' => 'required|unique:companies',
            'email' => 'required|email:rfc,dns|unique:companies',
            'slug' => 'nullable',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8',
            'company_email' => 'required',
            'phone_no' => 'required',
            'company_website' => 'required',
            'company_address' => 'required',
            'street' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'allow' => 'required',
            'image' => 'required',
            'trucks' => 'required',
            'founding_year' => 'required',
            'about_company' => 'required|min:600',
            'us_dot_no' => 'required',
            'icc_mc_license_no' => 'required',
            'image' => 'required|image|mimes:png,webp,svg',

        ], [
            'image.required' => 'Company Logo is required',
            'image.mimes' => 'Logo must be of type: png, webp, svg',
        ]);

        $data = $request->all();
        $createCompany = $this->create($data);

        $token = Str::random(64);

        CompanyVerify::create([
            'company_id' => $createCompany->id,
            'token' => $token
        ]);

        Mail::send('emails.companyInWaiting', ['token' => $token, 'request' => $request], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
        return redirect()->route("company.listing")->with('success', 'please check your email.');
        // return redirect()->route("company.login")->with('success', 'We have sent you a verfication email, please check your email.');
    }

    /**
     * Company Dashboard
     */
    public function dashboard(Request $request)
    {

        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            $total_reviews = User::where('user_email_verified', 1)->where('company_id', $company->id)->count();
            $total_rating = User::where('user_email_verified', 1)->where('company_id', $company->id)->sum(
                'overall_rating'
            );
            $total_cost = User::where('user_email_verified', 1)->where('company_id', $company->id)->sum(
                'service_cost'
            );

            if ($total_reviews > 0) {
                $avg_rating = $total_rating / $total_reviews;
            } else {
                $avg_rating = 0;
            }
            $star_5 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 5)->count();

            if ($total_reviews > 0) {
                $per_5 = ($star_5 / $total_reviews) * 100;
            } else {
                $per_5 = 0;
            }

            $star_4 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 4)->count();

            if ($total_reviews > 0) {
                $per_4 = ($star_4 / $total_reviews) * 100;
            } else {
                $per_4 = 0;
            }

            $star_3 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 3)->count();

            if ($total_reviews > 0) {
                $per_3 = ($star_3 / $total_reviews) * 100;
            } else {
                $per_3 = 0;
            }


            $star_2 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 2)->count();

            if ($total_reviews > 0) {
                $per_2 = ($star_2 / $total_reviews) * 100;
            } else {
                $per_2 = 0;
            }

            $star_1 = User::where('user_email_verified', 1)->where('company_id', $company->id)->where('overall_rating', 1)->count();

            if ($total_reviews > 0) {
                $per_1 = ($star_1 / $total_reviews) * 100;
            } else {
                $per_1 = 0;
            }

            $min_price = User::where('user_email_verified', 1)->where('company_id', $company->id)->min('service_cost');
            $max_price = User::where('user_email_verified', 1)->where('company_id', $company->id)->max('service_cost');

            if ($total_reviews > 0) {
                $avg_cost = $total_cost / $total_reviews;
            } else {
                $avg_cost = 0;
            }

            // Get 5 latest user reviews
            $data = User::orderBy('id', 'desc')->where('user_email_verified', 1)->where('company_id', $company->id)->take(5)->get();


            $year = $request->input('year', date('Y')); // Default to current year if no year is provided

            // Fetch review data for the selected year
            $reviews = User::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
                ->where('user_email_verified', 1)
                ->whereYear('created_at', $year)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->orderBy('month')
                ->get();

            // Initialize an array with 12 zeros (for each month)
            $reviewsData = array_fill(0, 12, 0);

            // Populate the array with actual data
            foreach ($reviews as $review) {
                $reviewsData[$review->month - 1] = $review->count;
            }

            // Fetch all available years
            $years = User::select(
                DB::raw('YEAR(created_at) as year')
            )
                ->distinct()
                ->orderBy('year', 'desc')
                ->pluck('year');

            $sponsored_posts = Post::where('company_id', $company->id)
                ->where('post_type', 'sponsored')
                ->latest()
                ->take(5)
                ->get();

            $mover_leads = ContactMover::where('company_id', $company->id)->get();
            $total_mover_leads = $mover_leads->count();
            
            // Only show leads in Active Subscriptions if they have an active plan
            $hasLeadSubscription = \App\Models\CompanyLeadPlanSubscription::where('company_id', $company->id)
                ->whereIn('status', ['active', 'trialing'])
                ->exists();
            $active_leads_subs = $hasLeadSubscription ? ContactMover::where('company_id', $company->id)->latest()->take(5)->get() : collect();
            
            // Show 4 latest leads in the Recent Leads panel
            $recent_leads = ContactMover::where('company_id', $company->id)->latest()->take(4)->get();

            return view('company.dashboard', compact(
                'company',
                'total_reviews',
                'avg_rating',
                'per_5',
                'per_4',
                'per_3',
                'per_2',
                'per_1',
                'avg_cost',
                'data',
                'reviewsData',
                'years',
                'year',
                'sponsored_posts',
                'mover_leads',
                'total_mover_leads',
                'recent_leads',
                'active_leads_subs',
            ));
        }

        return redirect()->route('login')->withError('Opps! You do not have access');
    }

    public function create(array $data)
    {
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $destinationPath = public_path('companies/image'); // full path to public/companies/image

            // Create folder if it doesn't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $filename = Str::slug($data['company_name']) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            // Store relative path (from public folder) so it can be used with asset()
            $data['image'] = 'companies/image/' . $filename;
        } else {
            $data['image'] = null; // or a default image
        }

        return Company::create([
            'name' => $data['name'],
            'company_name' => $data['company_name'],
            'company_email' => $data['company_email'],
            'slug' => Str::slug($data['company_name']),
            'email' => $data['email'],
            'phone_no' => $data['phone_no'],
            // 'additional_phone_no' => $data['additional_phone_no'],
            'company_website' => $data['company_website'],
            'company_address' => $data['company_address'],
            'street' => $data['street'],
            'us_dot_no' => $data['us_dot_no'],
            'icc_mc_license_no' => $data['icc_mc_license_no'],
            'about_company' => $data['about_company'],
            'trucks' => $data['trucks'],
            'founding_year' => $data['founding_year'],
            'country_id' => 1,
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'allow' => $data['allow'],
            'password' => Hash::make($data['password']),
            'company_ip' => request()->ip(),
            'image' => $data['image'],
            'local_mover' => isset($data['local_mover']) ? 1 : 0,
            'long_distance_mover' => isset($data['long_distance_mover']) ? 1 : 0,
            'residential_moving' => isset($data['residential_moving']) ? 1 : 0,
            'commercial_office_moving' => isset($data['commercial_office_moving']) ? 1 : 0,
            'packing_unpacking_services' => isset($data['packing_unpacking_services']) ? 1 : 0,
            'storage_services' => isset($data['storage_services']) ? 1 : 0,
            'international_moving' => isset($data['international_moving']) ? 1 : 0,
            'specialty_moving' => isset($data['specialty_moving']) ? 1 : 0,
            'labor_only_moving' => isset($data['labor_only_moving']) ? 1 : 0,
            'truck_rental' => isset($data['truck_rental']) ? 1 : 0,
            'containers_moving' => isset($data['containers_moving']) ? 1 : 0,
        ]);
    }
    /**
     * Company Email Verification
     */
    public function verifyAccount($token, Company $company)
    {
        $verifyCompany = CompanyVerify::where('token', $token)->first();

        $message = ('Sorry your email cannot be identified.');

        if (!is_null($verifyCompany)) {
            $company = $verifyCompany->company;

            if (!$company->is_email_verified) {
                \Mail::to('contact@mymovingjourney.com')->send(
                    new \App\Mail\CompanyRegisterMail($company)
                );
                $verifyCompany->company->is_email_verified = 1;
                $verifyCompany->company->is_claimed = 1;
                $verifyCompany->company->save();
                $message = "Your e-mail has verified. You can now login.";
            } else {
                $message = "Your e-mail has already verified. You can now login.";
            }
        }

        return redirect()->route('login')->with('success', $message);
    }

    /**
     * Company Edit Form
     */
    public function companyedit(Company $company)
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            $user = \App\User::where('company_id', $company->id)->first();
            $selectedServices = $user && $user->move_type ? explode(',', $user->move_type) : [];
            return view('company.company-edit', compact('company', 'selectedServices'));
        }
        return redirect()->route('login')->with('error', 'Login First');
    }

    /**
     * Company Update
     */
    public function companyupdate(Request $request, Company $company)
    {
        request()->validate([
            'email' => 'required',
            'company_name' => 'required',
            'company_email' => 'required',
            'image' => 'nullable|image|mimes:png,webp,svg',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ], [
            'image.mimes' => 'Logo must be of type: png, webp, svg',
        ]);
        $update = [

            'email' => $request->email,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'phone_no' => $request->phone_no,
            'additional_phone_no' => $request->additional_phone_no,
            'company_address' => $request->company_address,
            'us_dot_no' => $request->us_dot_no,
            'icc_mc_license_no' => $request->icc_mc_license_no,
            'local_license_no' => $request->local_license_no,
            'about_company' => $request->about_company,
            'company_website' => $request->company_website,
            'company_reg_no' => $request->company_reg_no,
            'company_info' => $request->company_info,
        ];
        if ($files = $request->file('image')) {
            $destinationPath = 'public/companies/image/'; // upload path
            $profileImage =
                Str::slug($request->company_name) . '.' . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $update['image'] = "$profileImage";
        }

        // Handle password change
        if ($request->filled('current_password')) {
            if (!\Hash::check($request->current_password, $company->password)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'The current password you entered is incorrect.');
            }
            $update['password']       = \Hash::make($request->new_password);
            $update['plain_password'] = $request->new_password;
        }

        $company->update($update);

        // Update the move_type 
        $services = array_merge((array)$request->services, (array)$request->specialty);
        \App\User::where('company_id', $company->id)->update([
            'move_type' => implode(',', array_filter($services))
        ]);

        return redirect()
            ->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Company Logout
     **/
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
    /**
     * Company Country
     */
    public function country()
    {
        $country['countries'] = Country::get(['name', 'id']);
        $state['states'] = State::get(['name', 'id']);
        return view('frontend.company_auth.register', $country, $state);
    }
    /**
     * Company State
     */
    public function fetchState(Request $request)
    {
        $data['states'] = State::where(
            'country_id',
            $request->country_id
        )->get(['name', 'id']);

        return response()->json($data);
    }
    /**
     * Fetch City
     */
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where(
            'state_id',
            $request->state_id
        )->get(['id', 'name', 'zip_code']);

        return response()->json($data);
    }

    /**
     * Company Search
     */
    public function search(Request $request)
    {
        // Get the search value from the request

        $companies = Company::where(
            'company_name',
            $request->company_name
        )->get();
        $search = $request->input('search');
        $companies = Company::query()
            ->where('company_name', 'LIKE', "%{$search}%")
            ->where('is_email_verified', 1)
            ->get();
        $count = Company::where('company_name', 'LIKE', "%{$search}%")->where('is_email_verified', 1)->count();

        $state_op = User::where('user_email_verified', 1)->get();
        $usersUnique = $state_op->unique(['pick_up_state_id']);

        $total_reviews = User::where('user_email_verified', 1)->count();
        $total_rating = User::where('user_email_verified', 1)->sum(
            'overall_rating'
        );

        if ($total_reviews > 0) {
            $avg_rating = $total_rating / $total_reviews;
        } else {
            $avg_rating = 0;
        }

        // Return the search view with the resluts compacted
        return view(
            'frontend.company_auth.search',
            compact('companies', 'search', 'count', 'total_reviews', 'total_rating', 'avg_rating', 'usersUnique')
        );
    }

    public function movers()
    {

        $best_state_pages = BestStatePage::select('best_state_pages.*')
            ->join('states', 'best_state_pages.state_id', '=', 'states.id')
            ->orderBy('states.name', 'asc')
            ->orderBy('best_state_pages.state_id', 'asc')
            ->get();

        $top_states = DB::table('companies')
            ->where('is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select('states.slug as slug', DB::raw('MAX(states.name) as state'), DB::raw('COUNT(*) as company_count'))
            ->whereIn('states.slug', [
                'florida',
                'california',
                'texas',
                'new-jersey',
                'illinois',
                'washington',
                'tennessee',
                'virginia',
                'massachusetts',
                'north-carolina',
                'new-york',
                'maryland'
            ])
            ->groupBy('states.slug')
            ->orderByDesc('company_count')
            ->limit(12)
            ->get();
        $city_pages = CityPage::orderBy('name', 'asc')->get();
        return view('frontend.company_auth.movers', compact('best_state_pages', 'top_states', 'city_pages'));
    }

    public function TopMovers()
    {
        $data = DB::select(
            DB::raw("SELECT
            (SELECT COUNT(id) From users WHERE company_id=companies.id AND users.user_email_verified=1) AS total_reviews,
            (SELECT SUM(overall_rating) From users WHERE company_id=companies.id AND users.user_email_verified=1) AS sum_overall_rating,
            ((SELECT SUM(overall_rating) From users WHERE company_id=companies.id AND users.user_email_verified=1)/(SELECT COUNT(id) From users WHERE company_id=companies.id AND users.user_email_verified=1)) as average_rating,
            (Select Max(id) from users WHERE company_id=companies.id AND users.user_email_verified=1) AS max_id,
            companies.id,companies.company_name,companies.slug,companies.company_website,companies.phone_no,companies.additional_phone_no,companies.image,companies.street as street,users.name,users.created_at,cities.zip_code as zip,cities.name as city,users.service_cost as cost,users.your_review,states.name as statename ,states.abv as state
            FROM `users`
            LEFT JOIN companies on users.company_id=companies.id
            LEFT JOIN states on companies.state_id=states.id
            LEFT JOIN cities on companies.city_id=cities.id
            WHERE users.id in (SELECT MAX(id) FROM users WHERE users.user_email_verified=1 GROUP BY company_id) AND companies.is_email_verified=1
            GROUP BY users.company_id
            ORDER BY average_rating DESC;
            ")
        );
        return view('frontend.company_auth.top-movers', compact('data'));
    }

    /**
     * Company Listing
     */
    public function companylisting(User $user, Company $company)
    {

        // $data = DB::select(
        // DB::raw("SELECT
        // (SELECT COUNT(id) From users WHERE company_id=companies.id AND users.user_email_verified=1) AS total_reviews,
        // (SELECT SUM(overall_rating) From users WHERE company_id=companies.id AND users.user_email_verified=1) AS sum_overall_rating,
        // ((SELECT SUM(overall_rating) From users WHERE company_id=companies.id AND users.user_email_verified=1)/(SELECT COUNT(id) From users WHERE company_id=companies.id AND users.user_email_verified=1)) as average_rating,
        // (Select Max(id) from users WHERE company_id=companies.id AND users.user_email_verified=1) AS max_id,
        // companies.id,companies.company_name,companies.image,users.name,users.created_at,users.your_review,states.name as state
        // FROM `users`
        // LEFT JOIN companies on users.company_id=companies.id
        // LEFT JOIN states on companies.state_id=states.id
        // WHERE users.id in (SELECT MAX(id) FROM users GROUP BY company_id) AND companies.is_email_verified=1
        // GROUP BY users.company_id
        // ORDER BY total_reviews DESC , max_id ASC
        // LIMIT 10;
        // ")
        // );
        $data = DB::select(
            DB::raw("SELECT
                (SELECT COUNT(id)
                 FROM users
                 WHERE company_id = companies.id
                   AND users.user_email_verified = 1
                   AND users.deleted_at IS NULL) AS total_reviews,

                (SELECT SUM(overall_rating)
                 FROM users
                 WHERE company_id = companies.id
                   AND users.user_email_verified = 1
                   AND users.deleted_at IS NULL) AS sum_overall_rating,

                ((SELECT SUM(overall_rating)
                  FROM users
                  WHERE company_id = companies.id
                    AND users.user_email_verified = 1
                    AND users.deleted_at IS NULL) /
                 (SELECT COUNT(id)
                  FROM users
                  WHERE company_id = companies.id
                    AND users.user_email_verified = 1
                    AND users.deleted_at IS NULL)) AS average_rating,

                (SELECT MAX(id)
                 FROM users
                 WHERE company_id = companies.id
                   AND users.user_email_verified = 1
                   AND users.deleted_at IS NULL) AS max_id,

                companies.id,
                companies.company_name,
                companies.slug,
                companies.image,
                companies.us_dot_no AS us_dot,
                companies.is_claimed AS claimed,
                users.name,
                users.created_at,
                cities.name AS city,
                users.service_cost AS cost,
                users.your_review,
                users.review_subject AS subject,
                states.name AS state

                FROM users
                LEFT JOIN companies ON users.company_id = companies.id
                LEFT JOIN states ON companies.state_id = states.id
                LEFT JOIN cities ON companies.city_id = cities.id

                WHERE users.id IN (
                    SELECT MAX(id)
                    FROM users
                    WHERE users.user_email_verified = 1
                      AND users.deleted_at IS NULL
                    GROUP BY company_id
                )
                AND companies.is_email_verified = 1
                AND users.deleted_at IS NULL
                GROUP BY users.company_id
                ORDER BY created_at DESC
                LIMIT 6;
            ")
        );
        // $company = DB::select(
        //     'SELECT COUNT(*) as total,states.name,states.slug,companies.state_id
        //     FROM companies LEFT JOIN states ON companies.state_id=states.id WHERE is_email_verified=1 GROUP BY states.name'
        // );
        $states = State::all();
        $company_city = DB::select(
            'SELECT COUNT(*) as total,cities.name,cities.zip_code,companies.city_id
            FROM companies LEFT JOIN cities ON companies.city_id=cities.id WHERE is_email_verified=1 GROUP BY cities.zip_code ORDER BY cities.name'
        );
        $companies = Company::query()
            ->orderBy('created_at', 'asc')
            ->where('is_email_verified', 1)
            ->where('is_featured', 1)
            ->with(['users' => function ($query) {
                $query->orderBy('created_at', 'asc')->where('user_email_verified', 1);
            }])
            ->get();
        // return $companies;

        $states = DB::table('companies')
            ->where('is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select('states.slug as slug', DB::raw('MAX(states.name) as state'), DB::raw('COUNT(*) as company_count'), 'states.abv')
            ->whereIn('states.slug', [
                'florida',
                'california',
                'texas',
                'new-jersey',
                'illinois',
                'washington',
                'tennessee',
                'virginia',
                'massachusetts',
                'north-carolina',
                'new-york',
                'maryland'
            ])
            ->groupBy('states.slug', 'states.abv')
            ->orderByDesc('company_count')
            ->limit(12)
            ->get();

        $posts = Post::where('is_published', 1)
            ->orderByRaw("CASE WHEN published_at IS NOT NULL THEN published_at ELSE created_at END DESC")
            ->take(5)
            ->get();

        $blogs = Post::where('is_published', 1)
            ->orderByRaw("CASE WHEN published_at IS NOT NULL THEN published_at ELSE created_at END DESC")
            ->take(10)
            ->get();

        $topStates = DB::table('companies')
            ->where('is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select('states.slug as slug', DB::raw('MAX(states.name) as state'), DB::raw('COUNT(*) as company_count'))
            ->groupBy('states.slug')
            ->orderByDesc('company_count')
            ->limit(9)
            ->get();
        return view('frontend.company_auth.listing', compact(
            'data',
            'states',
            'posts',
            'blogs',
            'company_city',
            'companies',
            'topStates',
        ));
    }
    /**
     * Company Review Submit
     */
    public function submit(Request $request)
    {

        return view('frontend.company_auth.submit');
    }

    /**
     * Company User Review Create
     */
    public function usercreate(Request $request, $id)
    {
        $company = Company::find($id);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'overall_rating' => $request->overall_rating,
            'review_subject' => $request->review_subject,
            'your_review' => $request->your_review,
            'service_cost' => $request->service_cost,
            'currency' => $request->currency,
            'move_type' => $request->move_type,
            'move_size' => $request->move_size,
            'quote' => $request->quote,
            'pick_up_country' => $request->pick_up_country,
            'pick_up_state' => $request->pick_up_state,
            'pick_up_city' => $request->pick_up_city,
            'delivery_city' => $request->delivery_city,
            'company_id' => $company->id,
        ]);
    }
    /**
     * Company User Review Show
     */
    public function usershow(Request $request, Company $company)
    {

        return view('auth.register', compact('company'));
    }

    /**
     * Company User Review Steps
     */
    public function createStepOne(Request $request, Company $company)
    {
        if (Auth::guard('company')->check()) {
            return back()->with('error', 'Can not Access');
        } else {

            $data = User::orderBy('id', 'desc')->where('user_email_verified', 1)->where('company_id', $company->id)->take(3)->get();
            // $company = Company::find($id);
            $user = $request->session()->get('user');
            return view(
                'frontend.user_reviews.create-step-one',
                compact('company', 'user', 'data')
            );
        }
    }

    public function postCreateStepOne(Request $request, $id)
    {


        $validatedData = $request->validate([
            'overall_rating' => 'required',
            'review_subject' => 'required',
            'your_review' => 'required|min:99',
        ]);
        $company = Company::find($id);

        if (empty($request->session()->get('user'))) {
            $user = new User();
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        } else {
            $user = $request->session()->get('user');
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        }

        return redirect()->route(
            'user.register.create-step-two',
            compact('company')
        );
    }

    public function createStepTwo(Request $request, Company $company)
    {
        if (Auth::guard('company')->check()) {
            return back()->with('error', 'Can not Access');
        } else {
            $pick_country = Country::get(['id', 'name']);
            $pick_state = State::get(['id', 'name']);
            $pick_city = city::get(['id', 'name', 'zip_code']);

            $delivery_country = Country::get(['id', 'name']);
            $delivery_state = State::get(['id', 'name']);
            $delivery_city = city::get(['id', 'name', 'zip_code']);
            $table = User::orderBy('id', 'desc')->where('user_email_verified', 1)->where('company_id', $company->id)->take(3)->get();
            $data['countries'] = Country::get(['name', 'id']);
            // $company = Company::find($id);
            $user = $request->session()->get('user');
            return view(
                'frontend.user_reviews.create-step-two',
                compact(
                    'company',
                    'user',
                    'table',
                    'pick_country',
                    'pick_state',
                    'pick_city',
                    'delivery_country',
                    'delivery_state',
                    'delivery_city'
                ),
                $data
            );
        }
    }

    public function postCreateStepTwo(Request $request, $id)
    {
        $company = Company::find($id);
        $validatedData = $request->validate([
            'service_cost' => 'required',
            'currency' => 'required',
            'move_type' => 'required',
            'move_size' => 'required',
            'quote' => '',
            'pick_up_country_id' => 'required',
            'pick_up_state_id' => 'required',
            'pick_up_city_id' => 'required',
            'delivery_country_id' => 'required',
            'delivery_state_id' => 'required',
            'delivery_city_id' => 'required',
            'image1' => 'image',
            'image2' => 'image',
            'image3' => 'image',

        ]);
        if ($files = $request->file('image1')) {
            $destinationPath = 'review/image1/'; // upload path
            $profileImage =
                date('YmdHis') . '.' . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $validatedData['image1'] = "$profileImage";
        }

        if ($files = $request->file('image2')) {
            $destinationPath = 'review/image2/'; // upload path
            $profileImage =
                date('YmdHis') . '.' . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $validatedData['image2'] = "$profileImage";
        }

        if ($files = $request->file('image3')) {
            $destinationPath = 'review/image3/'; // upload path
            $profileImage =
                date('YmdHis') . '.' . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $validatedData['image3'] = "$profileImage";
        }

        if ($files = $request->file('image4')) {
            $destinationPath = 'review/image4/'; // upload path
            $profileImage =
                date('YmdHis') . '.' . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $validatedData['image4'] = "$profileImage";
        }

        if ($files = $request->file('image5')) {
            $destinationPath = 'review/image5/'; // upload path
            $profileImage =
                date('YmdHis') . '.' . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $validatedData['image5'] = "$profileImage";
        }


        if (empty($request->session()->get('user'))) {
            $user = new User();
            $validatedData['image1'] = "$profileImage";
            $validatedData['image2'] = "$profileImage";
            $validatedData['image3'] = "$profileImage";
            $validatedData['image4'] = "$profileImage";
            $validatedData['image5'] = "$profileImage";

            $user->fill($validatedData);
            $request->session()->put('user', $user);
        } else {
            $user = $request->session()->get('user');
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        }

        return redirect()->route(
            'user.register.create-step-three',
            compact('company')
        );
    }

    public function createStepThree(Request $request, Company $company)
    {
        if (Auth::guard('company')->check()) {
            return back()->with('error', 'Can not Access');
        } else {
            $data = User::orderBy('id', 'desc')->where('user_email_verified', 1)->where('company_id', $company->id)->take(3)->get();
            // $company = Company::find($id);
            $user = $request->session()->get('user');
            return view(
                'frontend.user_reviews.create-step-three',
                compact('company', 'user', 'data')
            );
        }
    }

    public function postCreateStepThree(Request $request, $id)
    {
        $company = Company::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
        ]);
        if (empty($request->session()->get('user'))) {
            $user = new User();
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        } else {
            $user = $request->session()->get('user');
            $user->fill($validatedData);
            $request->session()->put('user', $user);
        }
        if ((User::where('email', '=', $request->email)->where('company_id', '=', $id)->get())->isNotEmpty()) {
            return redirect()->back()->withError('You already review this company.!');
            // return 0;
        } else {

            $user->company_id = $id;
            $user = $request->session()->get('user');
            $user->client_ip = request()->ip();
            $user->save();


            $token = Str::random(64);

            UserVerify::create([
                'user_id' => $user->id,
                'token' => $token
            ]);

            Mail::mailer('noreply')->send('emails.userEmailVerification', ['token' => $token, 'user' => $user], function ($message) use ($request) {
                $message->from(env('NOREPLY_USERNAME'), 'MyMovingJourney')
                    ->to($request->email);
                $message->subject('Confirm your review at MyMvoingJourney - action needed');
            });
            $request->session()->forget('user');

            return redirect('/')->withSuccess('We send you email please verify your email');
        }
    }

    public function moverReview(Request $request, Company $company)
    {
        $pick_country = Country::get(['id', 'name']);
        $pick_state = State::get(['id', 'name']);
        $pick_city = city::get(['id', 'name', 'zip_code']);

        $delivery_country = Country::get(['id', 'name']);
        $delivery_state = State::get(['id', 'name']);
        $delivery_city = city::get(['id', 'name', 'zip_code']);
        $table = User::orderBy('id', 'desc')->where('user_email_verified', 1)->where('company_id', $company->id)->take(3)->get();

        return view('frontend.user_reviews.create-single', compact(
            'company',
            'table',
            'pick_country',
            'pick_state',
            'pick_city',
            'delivery_country',
            'delivery_state',
            'delivery_city'
        ));
    }
    public function moverReviewPost(Request $request, Company $company)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',

            'overall_rating' => 'required|integer|min:1|max:5',
            'review_subject' => 'required|string|max:255',
            'your_review' => 'required|string|min:99',

            'service_cost' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'move_type' => 'required|string|max:100',
            'move_size' => 'required|string|max:100',
            'quote' => 'nullable|string|max:255',

            'pick_up_country_id' => 'required|integer',
            'pick_up_state_id' => 'required|integer',
            'pick_up_city_id' => 'required|integer',
            'delivery_country_id' => 'required|integer',
            'delivery_state_id' => 'required|integer',
            'delivery_city_id' => 'required|integer',

            'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // ✅ prevent duplicate review (same email + same company)
        $exists = User::where('email', $validatedData['email'])
            ->where('company_id', $company->id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['email' => 'You already reviewed this company!'])->withInput();
        }

        // ✅ Upload images using move() (public folder)
        foreach (['image1', 'image2', 'image3'] as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);

                $destinationPath = public_path("review/{$key}");
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $imageName = date('YmdHis') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $imageName);

                $validatedData[$key] = $imageName;
            }
        }

        // ✅ Create user record (your "review" is stored in users table)
        $user = new User();
        $user->company_id = $company->id;

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        $user->overall_rating = $validatedData['overall_rating'];
        $user->review_subject = $validatedData['review_subject'];
        $user->your_review = $validatedData['your_review'];

        $user->service_cost = $validatedData['service_cost'];
        $user->currency = $validatedData['currency'];
        $user->move_type = $validatedData['move_type'];
        $user->move_size = $validatedData['move_size'];
        $user->quote = $validatedData['quote'] ?? null;

        $user->pick_up_country_id = $validatedData['pick_up_country_id'];
        $user->pick_up_state_id = $validatedData['pick_up_state_id'];
        $user->pick_up_city_id = $validatedData['pick_up_city_id'];

        $user->delivery_country_id = $validatedData['delivery_country_id'];
        $user->delivery_state_id = $validatedData['delivery_state_id'];
        $user->delivery_city_id = $validatedData['delivery_city_id'];

        $user->image1 = $validatedData['image1'] ?? null;
        $user->image2 = $validatedData['image2'] ?? null;
        $user->image3 = $validatedData['image3'] ?? null;

        $user->client_ip = $request->ip();

        // optional: you can add this column in DB
        // $user->is_verified = false;

        $user->save();

        // ✅ Create verification token
        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $user->id,
            'token'   => $token,
        ]);

        // ✅ Send email
        Mail::mailer('noreply')->send(
            'emails.userEmailVerification',
            ['token' => $token, 'user' => $user, 'company' => $company],
            function ($message) use ($user) {
                $message->from(env('NOREPLY_USERNAME'), 'MyMovingJourney')
                    ->to($user->email)
                    ->subject('Confirm your review at MyMovingJourney - action needed');
            }
        );

        return redirect('/')->with('success', 'We sent you an email. Please verify your email.');
    }

    /**
     * Company User Review Email Verification
     */
    public function verifyUser($token, User $user)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;

            if (!$user->user_email_verified) {
                \Mail::mailer('noreply')
                    ->to($user->company->company_email)
                    ->send(
                        (new \App\Mail\UserReviewMail($user))
                            ->from(env('NOREPLY_USERNAME'), 'MyMovingJourney')
                    );
                \Mail::mailer('noreply')
                    ->to($user->email)
                    ->send(
                        (new \App\Mail\DeleteAccountNotification($user))
                            ->from(env('NOREPLY_USERNAME'), 'MyMovingJourney')
                    );

                $verifyUser->user->user_email_verified = 1;
                $verifyUser->user->save();
                // $message = "Your review is live now.";
                return redirect('/')->withSuccess('Your review is active now.');
            } else {
                // $message = "Your review is already live.";
                return redirect('/')->withError('Your review is already active.');
            }
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if (isset($user)) {
            $user->delete();
            \Mail::mailer('noreply')
                ->to($user->email)
                ->send(
                    (new \App\Mail\ReviewDeleteEmail($user))
                        ->from(env('NOREPLY_USERNAME'))
                );
            \Mail::mailer('noreply')
                ->to($user->company->email)
                ->send(
                    (new \App\Mail\companyNotifyDelReviewEmail($user))
                        ->from(env('NOREPLY_USERNAME'))
                );

            return redirect('/')->with('success', 'Your review is deactivated.');
        } else {
            return redirect('/')->with('error', 'Your review is already deactivated.');
        }
    }

    //1step
    public function stateshow()
    {
        // $company = DB::select(
        //     'SELECT COUNT(*) as total,states.name,companies.state_id
        //     FROM companies  LEFT JOIN states ON companies.state_id=states.id  GROUP BY states.name'
        // );
        $states = State::all();
        return view('frontend.company_auth.state_company', compact('states'));
    }

    public function stateShowCompany($stateSlug)
    {

        $state = State::where('slug', $stateSlug)->firstOrFail();
        // $total = State::where('slug', $stateSlug)->count();

        $total_company = Company::where('state_id', $state->id)->where('is_email_verified', 1)->count();

        // $data = Company::where('state_id', $state->id)
        //     ->where('is_email_verified', 1)
        //     ->with(['users' => function ($query) {
        //         $query->where('user_email_verified', 1)
        //             ->latest('created_at')
        //             ->first();
        //     }])
        //     ->get();
        $data = Company::select(
            DB::raw("COUNT(users.id) AS total_reviews"),
            DB::raw("COALESCE(SUM(users.overall_rating), 0) AS sum_overall_rating"),
            DB::raw("CASE WHEN COUNT(users.id) > 0 THEN COALESCE(SUM(users.overall_rating), 0) / COUNT(users.id) ELSE 0 END AS average_rating"),
            DB::raw("MAX(users.id) AS max_id"),
            'companies.id',
            'companies.company_name',
            'companies.slug',
            'companies.us_dot_no as dot_no',
            'companies.image',
            'companies.is_claimed as claimed',
            'companies.street as street',
            'companies.company_website as website',
            'companies.phone_no as phone_no',
            'users.name',
            'users.created_at',
            'cities.name as city',
            'cities.zip_code as zip_code',
            'users.service_cost as cost',
            'users.your_review',
            'users.review_subject as subject',
            'states.name as state',
            'states.abv as stateAbv'
        )
            ->leftJoin('users', function ($join) {
                $join->on('users.company_id', '=', 'companies.id')
                    ->where('users.user_email_verified', 1);
            })
            ->leftJoin('states', 'companies.state_id', '=', 'states.id')
            ->leftJoin('cities', 'companies.city_id', '=', 'cities.id')
            ->where('companies.state_id', $state->id)
            ->where('companies.is_email_verified', 1)
            ->groupBy('companies.id')
            ->orderByDesc('users.created_at')
            ->paginate(10);

        $pagePaginate = $data->links();

        $topStates = DB::table('companies')
            ->where('is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select('states.slug as slug', DB::raw('MAX(states.name) as state'), DB::raw('COUNT(*) as company_count'))
            ->groupBy('states.slug')
            ->orderByDesc('company_count')
            ->limit(10)
            ->get();
        $schema = Company::where('state_id', $state->id)->where('is_email_verified', 1)
            ->with(['users' => function ($query) {
                $query->orderBy('created_at', 'asc')->where('user_email_verified', 1);
            }])->take(10)->get();

        $schemaData = [];
        foreach ($schema as $company) {
            $schemaData[] = [
                '@type' => 'MovingCompany',
                'name' => $company->name,
                'address' => $company->company_address,
                'review' => $company->users->map(function ($user) {
                    return [
                        "@type" => "Review",
                        "reviewRating" => [
                            "@type" => "Rating",
                            "ratingValue" => $user->overall_rating,
                            "bestRating" => "5"
                        ],
                        "author" => [
                            "@type" => "Person",
                            "name" => $user->name
                        ],
                        "datePublished" => $user->created_at,
                        "reviewBody" => $user->your_review,
                        "name" => $user->name
                    ];
                }),
            ];
        }
        // return $schemaData;

        return view('frontend.company_auth.state_companies_show', compact(
            'state',
            'data',
            'schemaData',
            'total_company',
            'topStates',
            'pagePaginate',
        ));
    }

    //2step
    // public function stateCompanyShow($state_id,User $user,)
    // {

    //     $total = Company::where('state_id',$state_id)->where('is_email_verified',1)->count();
    //     $data = DB::select(
    //     DB::raw("SELECT
    //     (SELECT COUNT(id) From users WHERE company_id=companies.id AND users.user_email_verified=1 ) AS total_reviews,
    //     (SELECT SUM(overall_rating) From users WHERE company_id=companies.id AND users.user_email_verified=1) AS sum_overall_rating,
    //     ((SELECT SUM(overall_rating) From users WHERE company_id=companies.id AND users.user_email_verified=1)/(SELECT COUNT(id) From users WHERE company_id=companies.id AND users.user_email_verified=1)) as average_rating,
    //     (Select Max(id) from users WHERE company_id=companies.id) AS max_id,
    //     companies.id,companies.company_name,companies.slug,companies.company_website,companies.phone_no,companies.additional_phone_no,companies.image,users.name as created_by,users.created_at,users.your_review,states.name as n
    //     FROM `users`
    //     LEFT JOIN companies on users.company_id=companies.id
    //     LEFT JOIN states on companies.state_id=states.id
    //     WHERE users.id in (SELECT MAX(id) FROM users WHERE users.user_email_verified=1 GROUP BY company_id)  AND companies.is_email_verified=1 AND companies.state_id=$state_id
    //     GROUP BY users.company_id
    //     ORDER BY created_at DESC , max_id ASC
    //     ")
    //     );

    //     $schema = DB::select(
    //         DB::raw("SELECT
    //         (SELECT COUNT(id) FROM users WHERE company_id=companies.id AND users.user_email_verified=1) AS total_reviews,
    //         (SELECT SUM(overall_rating) FROM users WHERE company_id=companies.id AND users.user_email_verified=1) AS sum_overall_rating,
    //         ((SELECT SUM(overall_rating) FROM users WHERE company_id=companies.id AND users.user_email_verified=1)/(SELECT COUNT(id) FROM users WHERE company_id=companies.id AND users.user_email_verified=1)) AS average_rating,
    //         (SELECT MAX(id) FROM users WHERE company_id=companies.id) AS max_id,
    //         companies.id, companies.company_name, companies.company_email, companies.slug, companies.company_website, companies.company_address, companies.city_id, companies.phone_no, companies.additional_phone_no, companies.image, users.name AS created_by, users.created_at, users.review_subject AS subjects, users.your_review, states.name AS n
    //         FROM `users`
    //         LEFT JOIN companies ON users.company_id=companies.id
    //         LEFT JOIN states ON companies.state_id=states.id
    //         WHERE users.id IN (SELECT MAX(id) FROM users WHERE users.user_email_verified=1 GROUP BY company_id) AND companies.is_email_verified=1 AND companies.state_id=$state_id
    //         GROUP BY users.company_id
    //         LIMIT 10
    //         ")
    //     );

    //     $companySchemas = [];

    //     foreach ($schema as $company) {
    //         $companySchema = [
    //             "@context" => "https://schema.org",
    //             "@type" => "MovingCompany",
    //             "name" => $company->company_name,
    //             "email" => $company->company_email,
    //             "url" => $company->company_website,
    //             "address" => $company->company_address,
    //             "telephone" => $company->phone_no,
    //             "image" =>  URL::to('/companies/image/' .$company->image),
    //             "review" => [
    //                 "@type" => "Review",
    //                 "reviewRating" => [
    //                     "@type" => "Rating",
    //                     "ratingValue" => $company->average_rating,
    //                     "bestRating" => "5"
    //                 ],
    //                 "author" => [
    //                     "@type" => "Person",
    //                     "name" => $company->created_by
    //                 ],
    //                 "datePublished" => $company->created_at,
    //                 "reviewBody" => $company->your_review,
    //                 "name" => $company->subjects
    //             ],
    //             "aggregateRating" => [
    //                 "@type" => "AggregateRating",
    //                 "ratingValue" => $company->average_rating,
    //                 "reviewCount" => $company->total_reviews
    //             ]

    //         ];

    //         $companySchemas[] = $companySchema;
    //     }

    //     // Convert the array to JSON
    //     $companySchemasJson = json_encode($companySchemas);

    //     // Output the JSON
    //     // $companySchemasJson;

    //     $state = State::where('id',$state_id)->get(['name']);
    //     $mover_state = State::where('id',$state_id)->get(['name']);
    //     $title_name = State::where('id',$state_id)->get(['name']);

    //     $state_op = User::where('user_email_verified',1)->get();
    //     $usersUnique = $state_op->unique(['pick_up_state_id']);

    //     $company_ids = User::where('user_email_verified',1)->pluck('company_id');
    //     $company = Company::whereNotIn('id',$company_ids)->where('is_email_verified',1)->where('state_id',$state_id)->get();
    //     return view(
    //         'frontend.company_auth.state_companies_show',compact('total','company','data','usersUnique','state','mover_state','title_name','schema','companySchemasJson'));
    // }


    public function cityCompanyShow($city_id, User $user,)
    {

        $total = Company::where('city_id', $city_id)->where('is_email_verified', 1)->count();
        $data = DB::select(
            DB::raw("SELECT
        (SELECT COUNT(id) From users WHERE company_id=companies.id AND users.user_email_verified=1 ) AS total_reviews,
        (SELECT SUM(overall_rating) From users WHERE company_id=companies.id AND users.user_email_verified=1) AS sum_overall_rating,
        ((SELECT SUM(overall_rating) From users WHERE company_id=companies.id AND users.user_email_verified=1)/(SELECT COUNT(id) From users WHERE company_id=companies.id AND users.user_email_verified=1)) as average_rating,
        (Select Max(id) from users WHERE company_id=companies.id) AS max_id,
        companies.id,companies.company_name,companies.slug,companies.company_website,companies.phone_no,companies.additional_phone_no,companies.image,users.name as created_by,users.created_at,users.your_review,cities.name as n
        FROM `users`
        LEFT JOIN companies on users.company_id=companies.id
        LEFT JOIN cities on companies.city_id=cities.id
        WHERE users.id in (SELECT MAX(id) FROM users WHERE users.user_email_verified=1 GROUP BY company_id)  AND companies.is_email_verified=1 AND companies.city_id=$city_id
        GROUP BY users.company_id
        ORDER BY created_at DESC , max_id ASC
        ")
        );
        // return $data;
        $city = City::where('id', $city_id)->get(['name']);
        $mover_city = City::where('id', $city_id)->get(['name']);


        $company_ids = User::where('user_email_verified', 1)->pluck('company_id');
        $company = Company::whereNotIn('id', $company_ids)->where('is_email_verified', 1)->where('city_id', $city_id)->get();
        // return $company;
        return view(
            'frontend.company_auth.city_companies_show',
            compact('total', 'company', 'data', 'city', 'mover_city')
        );
    }

    public function claimForm(Company $company)
    {
        if ($company->is_claimed == 0) {
            return view('frontend.company_auth.companyClaimForm', compact('company'));
        } else {
            return redirect('/')->withErrors(['This Company Is Already Claimed']);
        }
    }

    public function claimFormPost(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'information' => 'required',
        ]);

        try {

            $claim = new CompanyClaim();
            $claim->company_id = $company->id;
            $claim->name = $request->name;
            $claim->email = $request->email;
            $claim->phone = $request->phone;
            $claim->information = $request->information;
            $claim->save();

            // if ($request->email == $company->company_email)
            if (
                Str::endsWith(strtolower($request->email), '@' . strtolower($company->company_email_domain) . '.com')
                || Str::endsWith(strtolower($request->email), '@' . strtolower($company->company_email_domain) . '.info')
                || Str::endsWith(strtolower($request->email), '@' . strtolower($company->company_email_domain) . '.org')
                || Str::endsWith(strtolower($request->email), '@' . strtolower($company->company_email_domain) . '.co')
            ) {

                $token = Str::random(64);

                CompanyClaimVerify::create([
                    'company_id' => $company->id,
                    'token' => $token,
                    'created_at' => now(),
                ]);

                Mail::send('emails.companyClaimMail', ['claim' => $claim], function ($message) use ($claim) {
                    $message->to('contact@mymovingjourney.com')
                        // ->replyTo($claim->email)
                        ->subject("Claim Request Verification For " . $claim->company->company_name);
                });

                Mail::send('emails.claimMailReturn', ['token' => $token, 'claim' => $claim], function ($message) use ($request, $claim) {
                    $message->to($request->email)
                        ->subject("Claim Request Verification For " . $claim->company->company_name);
                });
            } else {
                Mail::send('emails.claimNotMatch', ['claim' => $claim], function ($message) use ($request, $claim) {
                    $message->to($request->email)
                        ->subject("Claim Request Verification For " . $claim->company->company_name);
                });
            }

            return redirect()->back()->with('success', 'Your claim request has been successfully sent. We will contact you soon about this request.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Email not exist' . $e->getMessage());
        }
    }

    public function companyClaimAccount($token, Company $company)
    {
        $verifyClaimCompany = CompanyClaimVerify::where('token', $token)->first();

        $message = ('Sorry your email cannot be identified.');

        if (!is_null($verifyClaimCompany)) {
            $company = $verifyClaimCompany->company;

            if (!$company->is_claimed) {
                $verifyClaimCompany->company->is_claimed = 1;
                $verifyClaimCompany->company->save();
                Mail::to('contact@mymovingjourney.com')
                    ->send(new \App\Mail\CompanyClaimMail($company));

                $message = "Your company has claimed.";
            } else {
                $message = "Your company has already claimed.";
            }
        }

        return redirect()->route('company.show', $verifyClaimCompany->company->slug)->with('success', $message);
    }

    /**
     * Company User Reviews
     */
    public function companyReview(Company $company, User $user,)
    {

        $data = User::orderBy('id', 'desc')->where('user_email_verified', 1)->where('company_id', $company->id)->get();
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            return view('company.user-review', compact('company', 'user', 'data'));
        }
        return redirect()->route('login')->with('error', 'Login First');
    }

    public function companyReviewDetail($id)
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            $data = User::find($id);
            // $data = User::orderBy('id', 'desc')->where('user_email_verified', 1)->where('company_id', $company->id)->get();
            return view('frontend.company_auth.user-review-detail', compact('data', 'company',));
        }
        return redirect()->route('login')->with('error', 'Login First');
    }

    public function reviewRespond($id)
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            $user = User::find($id);
            return view('company.review-respond', compact('user', 'company'));
        }
        return redirect()->route('login')->with('error', 'Login First');
    }
    public function reviewRespondpost(Request $request, User $user)
    {
        request()->validate([
            'respond' => 'required',
        ]);
        $update = [
            'respond' => $request->respond,

        ];
        $user->update($update);
        return redirect()
            ->back()->with('success', 'Respond Submit Successfully');
    }

    /**
     * Flag a review for removal
     */
    public function reviewFlagPost(Request $request, User $review)
    {
        $request->validate([
            'flag_reason' => 'required|string',
        ]);

        $review->update([
            'flag_reason' => $request->flag_reason,
        ]);

        return redirect()->back()->with('success', 'Review has been flagged for removal. It will remain live until our team reviews your request.');
    }

    /**
     * zip_code search
     */

    public function autocomplete(Request $request)
    {
        $search = $request->get('search');

        $data = City::select("zip_code as value", "id", "name", "latitude", "longitude")
            ->where(function ($query) use ($search) {
                $query->where('zip_code', 'LIKE', $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%');
            })
            ->get();

        return response()->json($data);
    }

    /**
     * Get A Quote
     */
    public function Quotation()
    {

        return view('frontend.company_auth.quotation');
    }

    public function quoteThankyou(Request $request)
    {

        return view('frontend.company_auth.getquote-thankyou');
    }
    public function QuotePost(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone_no' => 'required',
            'zip_from' => 'required',
            'zip_to' => 'required',
            'move_size' => 'required',
            'date' => 'required',

        ]);
        $get_quote = new GetQuote();
        $get_quote->name = $request->name;
        $get_quote->email = $request->email;
        $get_quote->phone_no = $request->phone_no;
        $get_quote->zip_from = $request->zip_from;
        $get_quote->zip_to = $request->zip_to;
        $get_quote->move_size = $request->move_size;
        $get_quote->date = $request->date;
        $get_quote->client_ip =  $request->ip();
        $get_quote->referrer = $request->input('referrer');
        $get_quote->save();

        \Mail::to($get_quote->email)->send(new \App\Mail\GetQuoteEmail($get_quote));
        \Mail::send('emails.getQuoteMailAdmin', ['get_quote' => $get_quote], function ($message) use ($get_quote) {
            $message->to('quote@mymovingjourney.com')
                ->subject('New Quotation by User');
        });
        return redirect()->route('thankyou');
        // return redirect()->back()->with('success', 'Submitted Successfully, Check Your Email');


        // GetQuote::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone_no' => $request->phone_no,
        //     'zip_from' => $request->zip_from,
        //     'zip_to' => $request->zip_to,
        //     'move_size' => $request->move_size,
        //     'date' => $request->date,
        // ]);
        // return redirect()->route('company.getquote-thankyou');
    }

    /**
     * Cost Estimate
     */
    public function CostEstimator()
    {

        return view('frontend.company_auth.cost-estimator');
    }

    public function CostEstimatorPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone_no' => 'required',
            'zip_from' => 'required',
            'zip_to' => 'required',
            'move_size' => 'required',
            'date' => 'required',
            'distance' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            // 'g-recaptcha-response' => 'required|captcha',
            'ozip' => 'nullable|string|max:20',
            'ocity' => 'nullable|string|max:100',
            'ostate' => 'nullable|string|max:10',
            'dzip' => 'nullable|string|max:20',
            'dcity' => 'nullable|string|max:100',
            'dstate' => 'nullable|string|max:10',
        ]);

        $origin = $this->parseCostEstimatorLocation(
            $request->input('zip_from'),
            $request->input('ozip'),
            $request->input('ocity'),
            $request->input('ostate')
        );

        $destination = $this->parseCostEstimatorLocation(
            $request->input('zip_to'),
            $request->input('dzip'),
            $request->input('dcity'),
            $request->input('dstate')
        );

        $cost_estimator = new CostEstimator();
        $cost_estimator->name = $request->name;
        $cost_estimator->email = $request->email;
        $cost_estimator->phone_no = $request->phone_no;
        $cost_estimator->zip_from = $request->zip_from;
        $cost_estimator->zip_to = $request->zip_to;
        $cost_estimator->move_size = $request->move_size;
        $cost_estimator->date = $request->date;
        $cost_estimator->distance = $request->distance;
        $cost_estimator->min_price = $request->min_price;
        $cost_estimator->max_price = $request->max_price;

        // Parsed Google Places location details
        $cost_estimator->ozip = $origin['zip'];
        $cost_estimator->ocity = $origin['city'];
        $cost_estimator->ostate = $origin['state'];
        $cost_estimator->dzip = $destination['zip'];
        $cost_estimator->dcity = $destination['city'];
        $cost_estimator->dstate = $destination['state'];

        $cost_estimator->storage = $request->has('storage') ? $request->storage : 0;
        $cost_estimator->packing = $request->has('packing') ? $request->packing : 0;
        $cost_estimator->user_ip = $request->ip();
        $cost_estimator->referrer = $request->input('referrer');
        $cost_estimator->save();

        \Mail::to('lead@mymovingjourney.com')->send(new \App\Mail\CostEstimatorEmail($cost_estimator));
        \Mail::to($cost_estimator->email)->send(new \App\Mail\CostEstimatorEmail($cost_estimator));

        session(['last_submission_id' => $cost_estimator->id]);

        return redirect()->route('cost-estimator.thankyou')->with([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'zip_from' => $request->zip_from,
            'zip_to' => $request->zip_to,
            'move_size' => $request->move_size,
            'date' => $request->date,
            'distance' => $request->distance,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'packing' => $request->packing,
            'storage' => $request->storage,
            'referrer' => $request->referrer,
            'ozip' => $origin['zip'],
            'ocity' => $origin['city'],
            'ostate' => $origin['state'],
            'dzip' => $destination['zip'],
            'dcity' => $destination['city'],
            'dstate' => $destination['state'],
        ]);
    }

    public function CostEstimatorThankyou()
    {
        // If we have session data, use it
        if (session('name')) {
            // Create a new session that will persist across requests
            session()->keep([
                'name',
                'email',
                'phone_no',
                'zip_from',
                'zip_to',
                'move_size',
                'date',
                'distance',
                'min_price',
                'max_price'
            ]);
            return view('frontend.company_auth.costestmateThankyou', [
                'name' => session('name'),
                'email' => session('email'),
                'phone_no' => session('phone_no'),
                'zip_from' => session('zip_from'),
                'zip_to' => session('zip_to'),
                'move_size' => session('move_size'),
                'date' => session('date'),
                'distance' => session('distance'),
                'min_price' => session('min_price'),
                'max_price' => session('max_price'),
                'packing' => session('packing'),
                'storage' => session('storage'),
                'referrer' => session('referrer'),
            ]);
        }
        // If no session data but we're on the thank you page, show a generic success message
        return view('frontend.company_auth.costestmateThankyou', [
            'name' => 'Valued Customer',
            'email' => 'Not available',
            'phone_no' => 'Not available',
            'zip_from' => 'Not available',
            'zip_to' => 'Not available',
            'move_size' => 'Not available',
            'date' => 'Not available',
            'distance' => 'Not available',
            'min_price' => 'Not available',
            'max_price' => 'Not available',
            'packing' => 'Not available',
            'storage' => 'Not available',
            'referrer' => 'Not available',
        ]);
    }
    private function parseCostEstimatorLocation(?string $fullAddress, ?string $zip = null, ?string $city = null, ?string $state = null): array
    {
        $zip = trim((string) $zip);
        $city = trim((string) $city);
        $state = strtoupper(trim((string) $state));

        // Fallback for values like: 10001, New York, NY
        if ((!$zip || !$city || !$state) && $fullAddress) {
            $parts = array_values(array_filter(array_map('trim', explode(',', $fullAddress))));

            if (!$zip && isset($parts[0]) && preg_match('/\b\d{5}(?:-\d{4})?\b/', $parts[0], $matches)) {
                $zip = $matches[0];
            }

            if (!$city && isset($parts[1])) {
                $city = $parts[1];
            }

            if (!$state && isset($parts[2])) {
                $state = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $parts[2]), 0, 2));
            }
        }

        return [
            'zip' => $zip ?: null,
            'city' => $city ?: null,
            'state' => $state ?: null,
        ];
    }

    /**
     * Handle direct access to the /moving-cost-calculator/store URL
     */
    public function CostEstimatorStoreResult(Request $request)
    {
        // If directly accessing this URL, redirect to the calculator
        return redirect()->route('company.cost-estimator');
    }

    public function SubscriptionPost(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
        ]);

        Subscription::create([
            'email' => $request->email,
        ]);
        return back()->with('success', 'Form has been submitted successfully');
    }

    /**
     * Company search with
     */
    public function companySearch(Request $request)
    {
        // Retrieve the search term from the request
        $search = $request->input('search');

        // Retrieve sort parameters from the request with default values
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'asc');
        $isClaimed = $request->input('is_claimed'); // New filter parameter

        // Ensure sort order is either 'asc' or 'desc'
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        // Ensure sort by is a valid column
        $validSortByColumns = ['created_at', 'user_average_rating'];
        if (!in_array($sortBy, $validSortByColumns)) {
            $sortBy = 'created_at';
        }

        // Query companies based on the search term and email verification status
        $companiesQuery = Company::query()
            ->where('company_name', 'LIKE', "%{$search}%")
            ->where('is_email_verified', 1);

        // Include only users with email verified in the query
        $companiesQuery->with(['users' => function ($query) {
            $query->where('user_email_verified', 1);
        }]);


        if (!is_null($isClaimed)) {
            $companiesQuery->where('is_claimed', $isClaimed);
        }

        // Include average user rating in the sorting logic
        $companiesQuery->leftJoin('users', 'companies.id', '=', 'users.company_id')
            ->groupBy('companies.id')
            ->select('companies.*')
            ->selectRaw('AVG(users.overall_rating) as user_average_rating');

        // Apply sorting
        if ($sortBy === 'user_average_rating') {
            $companiesQuery->orderByRaw("AVG(users.overall_rating) {$sortOrder}");
        } else {
            $companiesQuery->orderBy($sortBy, $sortOrder);
        }

        // Count the total number of companies matching the search criteria
        $count = $companiesQuery->get()->count();
        // Paginate the results
        $companies = $companiesQuery->paginate(10)->withQueryString();

        // Retrieve pagination links
        $pagePaginate = $companies->links();

        // Count the total number of companies with email verified
        $total_company = Company::where('is_email_verified', 1)->count();

        // Return the search view with the results compacted
        return view(
            'frontend.company_auth.company-search',
            compact('companies', 'search', 'count', 'total_company', 'pagePaginate', 'sortBy', 'sortOrder', 'isClaimed',)
        );
    }






    /**
     * Posts search with
     */
    public function postSearch(Post $post, Request $request)
    {
        // Get the search value from the request

        $posts = Post::where(
            'title',
            $request->title
        )->get();
        $search = $request->input('search');
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->where('is_published', 1)
            ->get();
        // $count = Post::where('title', 'LIKE', "%{$search}%")->where('status',1)->count();
        // $total_post = Post::where('status',1)->count();

        // Return the search view with the resluts compacted
        return view(
            'frontend.company_auth.post-search',
            compact('posts', 'search')
        );
    }


    public function postCategory(PostCategory $post_category, Post $post)
    {
        $blog_category = PostCategory::all();
        $post = Post::where('status', 1)->orderBy('id', 'desc')->take(3)->get();
        $data = Post::where('status', 1)->orderBy('id', 'desc')->where('post_category_id', $post_category->id)->get();
        return view('frontend.company_auth.post-category', compact('blog_category', 'post_category', 'data', 'post'));
    }


    public function dispute($id)
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            $user = User::find($id);
            $dispute = $user->dispute;
            return view('company.user-dispute', compact('company', 'user', 'dispute'));
        }

        return redirect()->route('login')->with('error', 'Login First');
    }
    public function disputepost(Request $request, Company $company, $user, Dispute $dispute)
    {
        $company =  Auth::guard('company')->user();
        $companyName = $company->company_name;
        $user = User::find($user);
        request()->validate([
            'subject' => 'required|string',
            'description' => 'required|string',
        ]);
        $dispute = new Dispute();
        $dispute->company_id = $company->id;
        $dispute->user_id = $user->id;
        $dispute->subject = $request->subject;
        $dispute->description = $request->description;
        $dispute->save();

        $notify = new Notification();
        $notify->name = $companyName;
        $notify->msg = "Submit Dispute";
        $notify->save();

        \Mail::send('emails.companyDisputeMail', ['dispute' => $dispute], function ($message) use ($dispute) {
            $message->to($dispute->company->company_email)
                ->subject('Mail From MyMovingJourney');
        });
        \Mail::send('emails.userDisputeMail', ['dispute' => $dispute], function ($message) use ($dispute) {
            $message->from($dispute->company->company_email, $dispute->company->company_name);
            $message->to('contact@mymovingjourney.com')
                ->subject('Dispute Review Mail From' . $dispute->company->company_name);
        });
        return redirect()->back()->with('success', 'Submitted Successfully');
    }


    /**
     * Company contact us
     */
    public function contactUs(Company $company)
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            return view('company.contact-us', compact('company'));
        }

        return redirect()->route('login')->with('error', 'Login First');
    }
    public function contactUspost(Request $request, Company $company, ContactUs $contact_us)
    {
        $company =  Auth::guard('company')->user();
        request()->validate([
            'subject' => 'required',
            'description' => 'required',
        ]);
        $contact_us = new ContactUs();
        $contact_us->company_id = $company->id;
        $contact_us->subject = $request->subject;
        $contact_us->description = $request->description;
        if ($files = $request->file('image')) {
            $destinationPath = 'contact-us/image/'; // upload path
            $profileImage =
                date('YmdHis') . '.' . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $contact_us['image'] = "$profileImage";
        }
        $contact_us->save();

        \Mail::send('emails.companyContactUsMail', ['contact_us' => $contact_us], function ($message) use ($contact_us) {
            $message->to($contact_us->company->company_email)
                ->subject('Mail From MyMovingJourney');
        });

        \Mail::send('emails.contactUsMail', ['contact_us' => $contact_us], function ($message) use ($contact_us) {
            $message->to('contact@mymovingjourney.com')
                ->replyTo($contact_us->company->company_email, $contact_us->company->company_name)
                ->subject($contact_us->subject);
        });

        // \Mail::to('contact@mymovingjourney.com')->send(new \App\Mail\ContactUsMail($contact_us));
        return redirect()->back()->with('success', 'Submitted Successfully');
    }

    public function usercontactUs()
    {

        return view('frontend.company_auth.user-contact-us');
    }

    public function usercontactUspost(Request $request, UserContactUs $user_contact_us)
    {

        request()->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone_no' => 'required',
            'subject' => 'required',
            'message' => 'required',


        ]);
        $user_contact_us = new UserContactUs();
        $user_contact_us->name = $request->name;
        $user_contact_us->email = $request->email;
        $user_contact_us->phone_no = $request->phone_no;
        $user_contact_us->subject = $request->subject;
        $user_contact_us->message = $request->message;
        $user_contact_us->save();

        \Mail::to('contact@mymovingjourney.com')->send(new \App\Mail\UserContactUsMail($user_contact_us));
        return redirect()->back()->with('success', 'Mail Has Been Sent Successfully');
    }

    /**
     * Company write Review search
     */
    public function writeReview(Request $request)
    {
        // Get the search value from the request

        $companies = Company::where(
            'company_name',
            $request->company_name
        )->get();
        $search = $request->input('search');
        $companies = Company::query()
            ->where('company_name', 'LIKE', "%{$search}%")
            ->where('is_email_verified', 1)
            ->paginate(10);
        $count = Company::where('company_name', 'LIKE', "%{$search}%")->count();
        $total_reviews = User::where('user_email_verified', 1)->count();
        $total_rating = User::where('user_email_verified', 1)->sum(
            'overall_rating'
        );

        $total_companies = Company::where('is_email_verified', 1)->count();
        if ($total_reviews > 0) {
            $avg_rating = $total_rating / $total_reviews;
        } else {
            $avg_rating = 0;
        }
        // Return the search view with the resluts compacted
        return view(
            'frontend.company_auth.write-review',
            compact(
                'companies',
                'search',
                'count',
                'avg_rating',
                'total_rating',
                'total_reviews',
                'total_companies',
            )
        );
    }

    /**
     * Check list page
     */
    public function movingCheckList()
    {
        $post = Post::all();
        return view('frontend.company_auth.moving-checklist', compact('post'));
    }

    /**
     * Move Guide page
     */
    public function movingGuide()
    {
        $post = Post::all();
        return view('frontend.company_auth.moving-guide', compact('post'));
    }

    /**
     * Move tips page
     */
    // public function moveTip()
    // {
    //     $post_category = PostCategory::all();
    //     $post = Post::all();
    //     return view('frontend.company_auth.move-tips', compact('post','blog_category'));
    // }

    /**
     * Moving tips page
     */
    public function movingTip()
    {

        $post = Post::all();
        return view('frontend.company_auth.moving-tips', compact('post'));
    }

    /**
     * Packing tips page
     */
    public function packingTip()
    {
        $post = Post::all();
        return view('frontend.company_auth.packing-tips', compact('post'));
    }

    public function localMover()
    {
        $post = Post::where('is_published', 1)
            ->orderByRaw("CASE WHEN published_at IS NOT NULL THEN published_at ELSE created_at END DESC")
            ->take(5)
            ->get();
        $total_company = Company::where('local_mover', 1)->where('is_email_verified', 1)->count();
        // $companies = Company::where('local_mover', 1)->where('is_email_verified', 1)
        //     ->with(['users' => function ($query) {
        //         $query->where('user_email_verified', 1);
        //     }])->paginate(10);

        $data = Company::select(
            DB::raw("COUNT(users.id) AS total_reviews"),
            DB::raw("COALESCE(SUM(users.overall_rating), 0) AS sum_overall_rating"),
            DB::raw("CASE WHEN COUNT(users.id) > 0 THEN COALESCE(SUM(users.overall_rating), 0) / COUNT(users.id) ELSE 0 END AS average_rating"),
            DB::raw("MAX(users.id) AS max_id"),
            'companies.id',
            'companies.company_name',
            'companies.slug',
            'companies.us_dot_no as dot_no',
            'companies.image',
            'companies.is_claimed as claimed',
            'companies.street as street',
            'companies.company_website as website',
            'companies.phone_no as phone_no',
            'users.name',
            'users.created_at',
            'cities.name as city',
            'cities.zip_code as zip_code',
            'users.service_cost as cost',
            'users.your_review',
            'users.review_subject as subject',
            'states.name as state',
            'states.abv as stateAbv'
        )
            ->leftJoin('users', function ($join) {
                $join->on('users.company_id', '=', 'companies.id')
                    ->where(
                        'users.user_email_verified',
                        1
                    );
            })
            ->leftJoin('states', 'companies.state_id', '=', 'states.id')
            ->leftJoin('cities', 'companies.city_id', '=', 'cities.id')
            ->where('companies.local_mover', 1)
            ->where('companies.is_email_verified', 1)
            ->groupBy('companies.id')
            ->orderByDesc('users.created_at')
            ->paginate(10);
        $pagePaginate = $data->links();

        $topStates = DB::table('companies')
            ->where('is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select('states.slug as slug', DB::raw('MAX(states.name) as state'), DB::raw('COUNT(*) as company_count'))
            ->groupBy('states.slug')
            ->orderByDesc('company_count')
            ->limit(10)
            ->get();
        return view('frontend.company_auth.localMoverPage', compact('total_company', 'data', 'pagePaginate', 'topStates', 'post'));
    }

    public function longDisMover()
    {
        $post = Post::where('is_published', 1)
            ->orderByRaw("CASE WHEN published_at IS NOT NULL THEN published_at ELSE created_at END DESC")
            ->take(5)
            ->get();
        $total_company = Company::where('long_distance_mover', 1)->where('is_email_verified', 1)->count();
        $data = Company::select(
            DB::raw("COUNT(users.id) AS total_reviews"),
            DB::raw("COALESCE(SUM(users.overall_rating), 0) AS sum_overall_rating"),
            DB::raw("CASE WHEN COUNT(users.id) > 0 THEN COALESCE(SUM(users.overall_rating), 0) / COUNT(users.id) ELSE 0 END AS average_rating"),
            DB::raw("MAX(users.id) AS max_id"),
            'companies.id',
            'companies.company_name',
            'companies.slug',
            'companies.us_dot_no as dot_no',
            'companies.image',
            'companies.is_claimed as claimed',
            'companies.street as street',
            'companies.company_website as website',
            'companies.phone_no as phone_no',
            'users.name',
            'users.created_at',
            'cities.name as city',
            'cities.zip_code as zip_code',
            'users.service_cost as cost',
            'users.your_review',
            'users.review_subject as subject',
            'states.name as state',
            'states.abv as stateAbv'
        )
            ->leftJoin('users', function ($join) {
                $join->on('users.company_id', '=', 'companies.id')
                    ->where(
                        'users.user_email_verified',
                        1
                    );
            })
            ->leftJoin('states', 'companies.state_id', '=', 'states.id')
            ->leftJoin('cities', 'companies.city_id', '=', 'cities.id')
            ->where('companies.long_distance_mover', 1)
            ->where('companies.is_email_verified', 1)
            ->groupBy('companies.id')
            ->orderByDesc('users.created_at')
            ->paginate(10);

        $pagePaginate = $data->links();

        $topStates = DB::table('companies')
            ->where('is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select('states.slug as slug', DB::raw('MAX(states.name) as state'), DB::raw('COUNT(*) as company_count'))
            ->groupBy('states.slug')
            ->orderByDesc('company_count')
            ->limit(10)
            ->get();
        return view('frontend.company_auth.longDisMoverPage', compact('total_company', 'data', 'pagePaginate', 'topStates', 'post'));
    }

    public function packingAndStorage()
    {
        return view('frontend.company_auth.services.packingAndStorage');
    }
    public function smallMove()
    {
        $data = Company::select(
            DB::raw("COUNT(users.id) AS total_reviews"),
            DB::raw("COALESCE(SUM(users.overall_rating), 0) AS sum_overall_rating"),
            DB::raw("CASE WHEN COUNT(users.id) > 0 THEN COALESCE(SUM(users.overall_rating), 0) / COUNT(users.id) ELSE 0 END AS average_rating"),
            DB::raw("MAX(users.id) AS max_id"),
            'companies.id',
            'companies.company_name',
            'companies.slug',
            'companies.us_dot_no as dot_no',
            'companies.image',
            'companies.is_claimed as claimed',
            'companies.street as street',
            'companies.company_website as website',
            'companies.phone_no as phone_no',
            'users.name',
            'users.created_at',
            'cities.name as city',
            'cities.zip_code as zip_code',
            'users.service_cost as cost',
            'users.your_review',
            'users.review_subject as subject',
            'states.name as state',
            'states.abv as stateAbv'
        )
            ->leftJoin('users', function ($join) {
                $join->on('users.company_id', '=', 'companies.id')
                    ->where('users.user_email_verified', 1);
            })
            ->leftJoin('states', 'companies.state_id', '=', 'states.id')
            ->leftJoin('cities', 'companies.city_id', '=', 'cities.id')
            // ->where('companies.state_id', $state->id)
            ->where('companies.is_email_verified', 1)
            ->groupBy('companies.id')
            ->orderByDesc('users.created_at')
            ->paginate(10);

        $pagePaginate = $data->links();

        $topStates = DB::table('companies')
            ->where('is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select('states.slug as slug', DB::raw('MAX(states.name) as state'), DB::raw('COUNT(*) as company_count'))
            ->groupBy('states.slug')
            ->orderByDesc('company_count')
            ->limit(10)
            ->get();

        return view('frontend.company_auth.services.smallMove', compact('data', 'pagePaginate', 'topStates'));
    }
    public function residentialMove()
    {
        return view('frontend.company_auth.services.residentialMove');
    }
    public function commercialMove()
    {
        $data = Company::select(
            DB::raw("COUNT(users.id) AS total_reviews"),
            DB::raw("COALESCE(SUM(users.overall_rating), 0) AS sum_overall_rating"),
            DB::raw("CASE WHEN COUNT(users.id) > 0 THEN COALESCE(SUM(users.overall_rating), 0) / COUNT(users.id) ELSE 0 END AS average_rating"),
            DB::raw("MAX(users.id) AS max_id"),
            'companies.id',
            'companies.company_name',
            'companies.slug',
            'companies.us_dot_no as dot_no',
            'companies.image',
            'companies.is_claimed as claimed',
            'companies.street as street',
            'companies.company_website as website',
            'companies.phone_no as phone_no',
            'users.name',
            'users.created_at',
            'cities.name as city',
            'cities.zip_code as zip_code',
            'users.service_cost as cost',
            'users.your_review',
            'users.review_subject as subject',
            'states.name as state',
            'states.abv as stateAbv'
        )
            ->leftJoin('users', function ($join) {
                $join->on('users.company_id', '=', 'companies.id')
                    ->where('users.user_email_verified', 1);
            })
            ->leftJoin('states', 'companies.state_id', '=', 'states.id')
            ->leftJoin('cities', 'companies.city_id', '=', 'cities.id')
            // ->where('companies.state_id', $state->id)
            ->where('companies.is_email_verified', 1)
            ->groupBy('companies.id')
            ->orderByDesc('users.created_at')
            ->paginate(10);

        $pagePaginate = $data->links();

        $topStates = DB::table('companies')
            ->where('is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select('states.slug as slug', DB::raw('MAX(states.name) as state'), DB::raw('COUNT(*) as company_count'))
            ->groupBy('states.slug')
            ->orderByDesc('company_count')
            ->limit(10)
            ->get();
        return view(
            'frontend.company_auth.services.commercialMove',
            compact('data', 'topStates', 'pagePaginate')
        );
    }

    public function certificationPage()
    {
        return view('frontend.company_auth.certificationPage');
    }

    public function sitemap()
    {
        return view('sitemap');
    }

    public function resource_page(ResourcePage $resourcePage)
    {
        $top_movers = ResourceTopMover::orderBy('position', 'asc')->where('resource_page_id', $resourcePage->id)->get();
        $bottom_movers = ResourceBottomMover::orderBy('position', 'asc')->where('resource_page_id', $resourcePage->id)->get();
        $other_movers = ResourceOtherMover::orderBy('position', 'asc')->where('resource_page_id', $resourcePage->id)->get();
        $companyFields = [
            'companies.id',
            'companies.company_name',
            'companies.image',
            'companies.slug',
            'companies.us_dot_no',
            'companies.icc_mc_license_no',
            'companies.is_claimed',
            'companies.local_mover',
            'companies.long_distance_mover',
            'companies.phone_no',
            'companies.company_website',
            'companies.street',
            'companies.state_id',
            'companies.city_id',
        ];

        $data = Company::select($companyFields)
            ->with([
                'state:id,name,abv',
                'city:id,name'
            ])
            ->withCount('verifiedUsers as total_reviews')
            ->withAvg('verifiedUsers as average_rating', 'overall_rating')
            ->withAvg('verifiedUsers as average_price', 'service_cost')
            ->where('is_email_verified', 1)
            ->orderBy('company_name', 'asc')
            // ->limit(100)
            ->get();

        // $data = DB::select(
        //     DB::raw("SELECT
        //         (SELECT COUNT(id)
        //          FROM users
        //          WHERE company_id = companies.id
        //            AND users.user_email_verified = 1
        //            AND users.deleted_at IS NULL) AS total_reviews,

        //         (SELECT SUM(overall_rating)
        //          FROM users
        //          WHERE company_id = companies.id
        //            AND users.user_email_verified = 1
        //            AND users.deleted_at IS NULL) AS sum_overall_rating,

        //         COALESCE(
        //           (SELECT SUM(overall_rating)
        //            FROM users
        //            WHERE company_id = companies.id
        //              AND users.user_email_verified = 1
        //              AND users.deleted_at IS NULL) /
        //           NULLIF((SELECT COUNT(id)
        //                   FROM users
        //                   WHERE company_id = companies.id
        //                     AND users.user_email_verified = 1
        //                     AND users.deleted_at IS NULL), 0),
        //           0.0) AS average_rating,

        //         (SELECT MAX(id)
        //          FROM users
        //          WHERE company_id = companies.id
        //            AND users.user_email_verified = 1
        //            AND users.deleted_at IS NULL) AS latest_review_id,

        //         (SELECT SUM(service_cost)
        //          FROM users
        //          WHERE company_id = companies.id
        //            AND users.user_email_verified = 1
        //            AND users.deleted_at IS NULL) AS total_cost,

        //         COALESCE(
        //           (SELECT SUM(service_cost)
        //            FROM users
        //            WHERE company_id = companies.id
        //              AND users.user_email_verified = 1
        //              AND users.deleted_at IS NULL) /
        //           NULLIF((SELECT COUNT(id)
        //                   FROM users
        //                   WHERE company_id = companies.id
        //                     AND users.user_email_verified = 1
        //                     AND users.deleted_at IS NULL), 0),
        //           0) AS average_price,

        //         companies.id,
        //         companies.company_name,
        //         companies.slug,
        //         companies.image,
        //         companies.company_email,
        //         companies.phone_no,
        //         companies.additional_phone_no,
        //         companies.company_website,
        //         companies.street,
        //         companies.city_id,
        //         companies.state_id,
        //         companies.us_dot_no AS us_dot,
        //         companies.icc_mc_license_no AS icc_mc_number,
        //         companies.is_claimed AS claimed,
        //         companies.created_at AS company_created_at,
        //         cities.name AS city_name,
        //         states.name AS state_name,
        //         states.abv AS state_abv,
        //         users.name,
        //         users.created_at,
        //         cities.name AS city,
        //         users.service_cost AS cost,
        //         users.your_review,
        //         users.review_subject AS subject,
        //         states.name AS state


        //         FROM companies
        //         LEFT JOIN states ON companies.state_id = states.id
        //         LEFT JOIN cities ON companies.city_id = cities.id
        //         LEFT JOIN users ON users.company_id = companies.id

        //         WHERE companies.is_email_verified = 1
        //           AND users.user_email_verified = 1
        //           AND users.deleted_at IS NULL
        //           AND companies.id IN (
        //               SELECT DISTINCT company_id
        //               FROM users
        //               WHERE users.user_email_verified = 1
        //                 AND users.deleted_at IS NULL
        //           )

        //         GROUP BY companies.id, users.id
        //         ORDER BY companies.created_at DESC
        //         LIMIT 100;
        //     ")
        // );
        $best_state_pages = BestStatePage::select('best_state_pages.*')
            ->join('states', 'best_state_pages.state_id', '=', 'states.id')
            ->orderBy('states.name', 'asc')
            ->orderBy('best_state_pages.state_id', 'asc')
            ->get();

        $faqs = ResourcePageFaq::where('resource_page_id', $resourcePage->id)->get();

        return view('frontend.company_auth.resource-pages.showPage', compact(
            'resourcePage',
            'top_movers',
            'bottom_movers',
            'other_movers',
            'data',
            'best_state_pages',
            'faqs',
        ));
    }
    public function contactMover(Company $company)
    {
        return view('frontend.company_auth.contactMover', compact('company'));
    }
    public function contactMoverPost(Request $request, Company $company)
    {
        $request->validate([
            'company_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required',
            'zip_from' => 'required',
            'zip_to' => 'required',
            'move_size' => 'required',
            'date' => 'required',
            'g-recaptcha-response' => 'required|captcha'

        ]);

        $contactMover = new ContactMover();
        $contactMover->company_id = $company->id;
        $contactMover->name = $request->name;
        $contactMover->email = $request->email;
        $contactMover->phone_no = $request->phone_no;
        $contactMover->zip_from = $request->zip_from;
        $contactMover->zip_to = $request->zip_to;
        $contactMover->move_size = $request->move_size;
        $contactMover->date = $request->date;
        $contactMover->message = $request->message;
        $contactMover->client_ip = $request->ip();
        $contactMover->referrer = $request->input('referrer');
        if ($company->status == 1) {
            $contactMover->status = 1;
        }

        $contactMover->save();

        try {

            if ($company->status == 0 && $company->is_claimed == 0) {
                \Mail::mailer('quote')->send('emails.contactClaimedNotLeadActiveMoverMail', ['contactMover' => $contactMover], function ($message) use ($company) {
                    $message->from(env('QUOTE_USERNAME'), 'My Moving Journey')
                        ->to($company->company_email)
                        ->subject('Mail From My Moving Journey');
                });
            } elseif ($company->status == 1 && $company->is_claimed == 1) {
                \Mail::mailer('quote')->send('emails.contactClaimedLeadActiveMoverMail', ['contactMover' => $contactMover], function ($message) use ($company) {
                    $message->from(env('QUOTE_USERNAME'), 'My Moving Journey')
                        ->to($company->company_email)
                        ->subject('Mail From My Moving Journey');
                });
            } else {
                \Mail::mailer('quote')->send('emails.contactClaimedMoverMail', ['contactMover' => $contactMover], function ($message) use ($company) {
                    $message->from(env('QUOTE_USERNAME'), 'My Moving Journey')
                        ->to($company->company_email)
                        ->subject('Mail From My Moving Journey');
                });
            }
            \Mail::mailer('quote')->send('emails.contactMoverMail', ['contactMover' => $contactMover], function ($message) use ($contactMover) {
                $message->from(env('QUOTE_USERNAME'), 'My Moving Journey')
                    ->to('quote@mymovingjourney.com')
                    ->subject('Mover Quotation by User');
            });
        } catch (\Exception $e) {
            // Handle email sending failure here
            return redirect()->back()->with('error', 'Failed to send email. Please try again later.');
        }
        return redirect()->route('thankyou');
        // return redirect()->back()->with('success', 'Quotation has been successfully submitted');
    }
    public function testPage()
    {
        return view('frontend.company_auth.testPage');
    }

    public function liveCall(Company $company)
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            $live_calls = LiveCall::where('company_id', $company->id)->get();
            return view('company.companyLiveCall', compact('live_calls', 'company'));
        }
        return redirect()->route('login')->with('error', 'Login First');
    }

    public function liveCallDispute(Company $company, LiveCall $liveCall)
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            // Check if a dispute already exists for this mover lead
            $existingDispute = LiveCallDispute::where('live_call_id', $liveCall->id)
                ->where('company_id', $company->id)
                ->exists();

            if ($existingDispute) {
                return redirect()->route('company.dashboard')->with('error', 'You have already disputed this live call.');
            }

            return view('company.CompanyLiveCallDispute', compact('liveCall', 'company'));
        } else {
            return redirect()->route('login')->with('error', 'Login First!');
        }
    }
    public function liveCallDisputeStore(Request $request, LiveCall $liveCall, Company $company)

    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            $request->validate([

                'company_id' => 'required',
                'live_call_id' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);
            $liveCallDispute = new LiveCallDispute();
            $liveCallDispute->company_id = $request->company_id;
            $liveCallDispute->live_call_id = $request->live_call_id;
            $liveCallDispute->subject = $request->subject;
            $liveCallDispute->message = $request->message;
            $liveCallDispute->save();
            \Mail::send('emails.liveCallDisputeMail', ['liveCallDispute' => $liveCallDispute, 'liveCall' => $liveCall], function ($message) use ($company, $request) {
                $message->from($company->company_email, $company->name) // Ensure valid sender
                    ->to('contact@mymovingjourney.com')
                    ->subject($request->subject);
            });
            return redirect()->route('company.dashboard')->with('success', 'Dispute Has Submitted');
        } else {
            return redirect()->route('login')->with('error', 'Login First!');
        }
    }


    public function checkList()
    {
        $checklist = Checklist::with('category')->get()->groupBy('checklist_category_id');
        return view('frontend.company_auth.checklist', compact('checklist'));
    }
    public function checkListDownloadPDF(Request $request)
    {
        // Get selected checklist item IDs
        $checkedItemIds = $request->input('checklist', []); // All submitted checklist IDs
        $checkedItems = $request->input('checked', []); // Only checked checklist IDs

        // If no items are selected, return an error message
        if (empty($checkedItemIds)) {
            return back()->with('error', 'No items selected to download.');
        }

        // Fetch checklist items from the database
        $checklistItems = Checklist::with('category')->whereIn('id', $checkedItemIds)->get();

        // Prepare data for the PDF
        $data = [];
        foreach ($checklistItems as $item) {
            $data[] = [
                'heading' => $item->heading,
                'text' => $item->description,
                'checked' => in_array($item->id, $checkedItems),
                'category' => $item->category->heading
            ];
        }

        // Generate PDF
        $pdf = Pdf::loadView('frontend.company_auth.check_list_pdf', compact('data'));

        // Download the PDF
        return $pdf->download('moving-checklist.pdf');
    }

    public function CityPage()
    {
        return view('frontend.company_auth.cityPage');
    }
    public function cityShowPage($stateSlug, $citySlug)
    {
        $state = State::where('slug', $stateSlug)->firstOrFail();

        // Get the city based on slug AND state_id
        $cityPage = CityPage::where('slug', $citySlug)
            ->where('state_id', $state->id)
            ->firstOrFail();

        // Get companies (filter by city if needed)
        $companies = Company::where('is_email_verified', 1)
            // ->where('city_id', $cityPage->id) // adjust if you have relation
            ->paginate(10);


        $local_movers =  Company::query()
            ->where('is_email_verified', 1)
            ->where('state_id', $cityPage->state->id)
            ->whereHas('users', function ($q) {
                $q->where('user_email_verified', 1)
                    ->whereNotNull('overall_rating');
            })
            ->withCount([
                'users as reviews_count' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ])
            ->withAvg([
                'users as avg_rating' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ], 'overall_rating')
            ->having('reviews_count', '>', 80)
            ->having('avg_rating', '>=', 4)
            ->orderByDesc('avg_rating')
            ->orderByDesc('reviews_count')
            ->take(10)
            ->get();

        if ($local_movers->isEmpty()) {
            $local_movers = Company::query()
                ->where('is_email_verified', 1)
                ->where('state_id', $cityPage->state->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(10)
                ->get();
        }

        $long_distance_movers = ResourceBottomMover::where('resource_page_id', 1)
            ->orderBy('position', 'asc')
            ->take(5)
            ->get();

        $container_movers = ResourceBottomMover::where('resource_page_id', 14)
            ->orderBy('position', 'asc')
            ->take(3)
            ->get();

        $truck_rental_movers = ResourceBottomMover::where('resource_page_id', 15)
            ->orderBy('position', 'asc')
            ->take(3)
            ->get();

        $avg_costs = CityAvgCost::where('city_page_id', $cityPage->id)->get();

        $route_costs = CityRouteCost::where('city_page_id', $cityPage->id)->get();

        return view('frontend.company_auth.cityShowPage', compact(
            'cityPage',
            'companies',
            'local_movers',
            'long_distance_movers',
            'container_movers',
            'truck_rental_movers',
            'avg_costs',
            'route_costs',
        ));
    }

    public function productShow(Product $product)
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            return view('frontend.company_auth.company_product_show', compact('product', 'company'));
        }
        return redirect()->route('login')->with('error', 'Login First');
    }

    public function orderStore(Request $request)
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();

            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
                'total_amount' => 'required|numeric',
                'payer_name' => 'required|string',
                'payer_email' => 'required|email'
            ]);

            Order::create([
                'company_id' => $company->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'total_amount' => $request->total_amount,
                'payer_name' => $request->payer_name,
                'payer_email' => $request->payer_email
            ]);

            return response()->json(['message' => 'Order saved']);
        } else {
            return redirect()->route('login')->with('error', 'Login First');
        }
    }
    public function paymentThankYou()
    {
        if (Auth::guard('company')->check()) {
            $company = Auth::guard('company')->user();
            return view('frontend.company_auth.payment_thank_you', compact('company'));
        } else {
            return redirect()->route('login')->with('error', 'Login First');
        }
    }
    public function orderList()
    {
        if (Auth::guard('company')->check()) {

            $company = Auth::guard('company')->user();
            $orders = Order::where('company_id', $company->id)->get();

            return view('frontend.company_auth.company_order_list', compact('company', 'orders'));
        } else {
            return redirect()->route('login')->with('error', 'Login First');
        }
    }






    //////////////////// LEAD MANAGEMENT START //////////////////////




    // public function moverLead()
    // {
    //     if (Auth::guard('company')->check()) {

    //         $company = Auth::guard('company')->user();
    //         $mover_leads = ContactMover::where('company_id', $company->id)->get();

    //         return view('company.company_mover_lead', compact('company', 'mover_leads'));
    //     } else {
    //         return redirect()->route('login')->with('error', 'Login First');
    //     }
    // }

    public function moverLead(Request $request)
    {
        $company = Auth::guard('company')->user();

        // 1. Handle Return from Stripe (Post-Purchase Unlock)
        if ($request->get('payment') === 'success' && $request->has('lead_id')) {
            $paidLead = ContactMover::where('id', $request->lead_id)
                ->where('company_id', $company->id)
                ->first();

            if ($paidLead && $paidLead->is_show == 0) {
                $subscription = CompanyLeadPlanSubscription::where('company_id', $company->id)->where('status', 'active')->first();
                if ($subscription) {
                    $plan = LeadSubscriptionPlan::find($subscription->lead_subscription_plan_id);
                    $amountInCents = $plan->extra_lead_fee_cents * 100;

                    $paidLead->update(['is_extra_paid' => true, 'is_show' => 1, 'extra_paid_at' => now()]);

                    Mail::to($company->email)->send(new ExtraLeadInvoice($company, $paidLead, $amountInCents));
                    Mail::to('contact@mymovingjourney.com')->send(new AdminLeadNotification($company, $paidLead, $amountInCents));
                }
            }
        }

        /**
         * 2. STRICT SUBSCRIPTION VALIDATION
         * Valid if Status is Active OR (Cancelled but Period not yet ended)
         */
        $subscription = CompanyLeadPlanSubscription::where('company_id', $company->id)
            ->where(function ($q) {
                $q->where('status', 'active')
                    ->orWhere(function ($q2) {
                        $q2->where('cancel_at_period_end', true)
                            ->where('current_period_end', '>', now());
                    });
            })
            ->first();

        $plan = null;
        $isSubscriptionValid = false;

        if ($subscription) {
            $plan = LeadSubscriptionPlan::find($subscription->lead_subscription_plan_id);
            // Final check: Does the plan record still exist?
            if ($plan) {
                $isSubscriptionValid = true;
            }
        }

        /**
         * 3. LEAD USAGE CALCULATIONS
         */
        $monthStart = now()->startOfMonth();
        $monthEnd   = now()->endOfMonth();

        $usedLeads = ContactMover::where('company_id', $company->id)
            ->whereBetween('created_at', [$monthStart, $monthEnd])
            ->count();

        $allowedLeads = $plan?->leads_per_month ?? 0;
        $remainingLeads = max(0, $allowedLeads - $usedLeads);

        $extraPaidLeadsCount = ContactMover::where('company_id', $company->id)
            ->whereBetween('created_at', [$monthStart, $monthEnd])
            ->where('is_extra_paid', true)
            ->count();

        $extraLeadFee = $plan?->extra_lead_fee_cents ?? 0;
        $extraCost = $extraPaidLeadsCount * $extraLeadFee;

        $usagePercent = $allowedLeads > 0
            ? min(100, round(($usedLeads / $allowedLeads) * 100))
            : 0;

        /**
         * 4. LEAD LIST QUERY
         */
        $query = ContactMover::where('company_id', $company->id);

        // --- ADD SEARCH FILTER HERE ---
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        // Filters
        if ($request->has('status') && $request->status !== '') {
            switch ($request->status) {
                case '0':
                    $query->where('is_follow_up', 0)->where('is_quoted', 0)->where('is_booked', 0);
                    break;

                case '1':
                    $query->where('status', 1);
                    break;

                case '2':
                    $query->where('is_follow_up', 1);
                    break;

                case '3':
                    $query->where('is_quoted', 1);
                    break;

                case '4':
                    $query->where('is_booked', 1);
                    break;
            }
        }
        if ($request->filled('move_size')) {
            $query->where('move_size', $request->move_size);
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $mover_leads = $query->latest()->get();

        return view('company.company_mover_lead', compact(
            'company',
            'mover_leads',
            'subscription',
            'plan',
            'isSubscriptionValid',
            'usedLeads',
            'allowedLeads',
            'remainingLeads',
            'extraCost',
            'usagePercent'
        ));
    }

    public function leadUnlock(Request $request, $id)
    {
        $company = auth('company')->user();

        $lead = ContactMover::where('id', $id)
            ->where('company_id', $company->id)
            ->firstOrFail();

        if ($lead->is_show == 1) {
            return response()->json(['error' => 'Lead already unlocked'], 422);
        }

        // Make sure Stripe IDs exist
        if (!$company->stripe_customer_id || !$company->stripe_payment_method_id) {
            return response()->json([
                'error' => 'No saved payment method found. Please add a card first.'
            ], 422);
        }

        // Active subscription check
        $subscription = CompanyLeadPlanSubscription::where('company_id', $company->id)
            ->where('status', 'active')
            ->first();

        if (!$subscription) {
            return response()->json(['error' => 'Active subscription required.'], 402);
        }

        $plan = LeadSubscriptionPlan::find($subscription->lead_subscription_plan_id);

        if (!$plan || !$plan->extra_lead_fee_cents) {
            return response()->json(['error' => 'Invalid plan configuration.'], 422);
        }

        try {

            Stripe::setApiKey(config('services.stripe.secret'));

            // 🔥 Convert dollars to cents
            $amount = (int) ($plan->extra_lead_fee_cents );

            if ($amount < 50) {
                return response()->json([
                    'error' => 'Amount must be at least $0.50'
                ], 422);
            }

            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'usd',
                'customer' => $company->stripe_customer_id,
                'payment_method' => $company->stripe_payment_method_id,
                'off_session' => true,
                'confirm' => true,
                'description' => "Extra Lead Unlock #" . (20000 + $lead->id),
                'metadata' => [
                    'company_id' => $company->id,
                    'lead_id' => $lead->id,
                    'type' => 'extra_lead'
                ]
            ]);

            // Unlock lead after successful charge
            $lead->update([
                'is_extra_paid' => true,
                'is_show' => 1,
                'extra_paid_at' => now(),
            ]);

            // If your mailables still use the older signature, use this:
            $toEmail = $company->company_email ?? $company->email;

            Mail::to($toEmail)->send(new ExtraLeadInvoice($company, $lead, $amount));
            Mail::to('contact@mymovingjourney.com')->send(new AdminLeadNotification($company, $lead, $amount));
            return response()->json([
                'success' => true,
                'message' => 'Lead unlocked successfully!'
            ]);
        } catch (\Stripe\Exception\CardException $e) {

            return response()->json([
                'error' => $e->getError()->message
            ], 422);
        } catch (\Exception $e) {

            \Log::error("Stripe Unlock Error: " . $e->getMessage());

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function markedAsRead($id)
    {

        $company = auth('company')->user();
        $lead = ContactMover::where('id', $id)->where('company_id', $company->id)->firstOrFail();
        if ($lead) {
            $lead->status = 1;
            $lead->save();
            return redirect()->back()->with('success', 'Lead Marked As Read');
        }
    }

    public function leadPauseButton(Company $company)
    {
        \Mail::send('emails.LeadPauseRequestMail', ['company' => $company], function ($message) use ($company) {
            $message->from($company->company_email, $company->company_name) // Ensure valid sender
                ->to('contact@mymovingjourney.com')
                ->subject('Lead Pause Request');
        });
        return redirect()->route('company.mover_leads')->with('success', 'Lead pause request sent successfully!');
    }

    public function leadContinueButton(Company $company)
    {

        \Mail::send('emails.LeadContinueRequestMail', ['company' => $company], function ($message) use ($company) {
            $message->from($company->company_email, $company->company_name) // Ensure valid sender
                ->to('contact@mymovingjourney.com')
                ->subject('Lead Continue Request');
        });
        return redirect()->route('company.mover_leads')->with('success', 'Lead continue request sent successfully!');
    }

    public function exportPdf(Request $request)
    {
        $companyId = auth('company')->id();
        $quotes = ContactMover::where('company_id', $companyId)->when($request->from_date, fn($q) =>
        $q->whereDate('created_at', '>=', $request->from_date))->when($request->to_date, fn($q) =>
        $q->whereDate('created_at', '<=', $request->to_date))->latest()->get();
        $pdf = Pdf::loadView('company.quote_pdf', compact('quotes'))->setPaper('a4', 'landscape');
        return $pdf->stream('quotes.pdf');
    }

    public function exportExcel(Request $request)
    {
        $companyId = auth('company')->id();
        $quotes = ContactMover::where('company_id', $companyId)->when($request->from_date, fn($q) =>
        $q->whereDate('created_at', '>=', $request->from_date))->when($request->to_date, fn($q) =>
        $q->whereDate('created_at', '<=', $request->to_date))->latest()->get();

        return Excel::download(
            new CompanyQuoteExport($quotes),
            'quotes.xlsx'
        );
    }
    public function contactMoverUpdateStatus(Request $request, $id)
    {

        $lead = ContactMover::findOrFail($id);
        $lead->booking = $request->booking;
        $lead->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
    public function contactListDelete($id)
    {
        $contact = ContactMover::find($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Added Successfully');
    }


    public function updateFlow(Request $request, $id)
    {
        $lead = ContactMover::findOrFail($id);

        $request->validate([
            'stage' => 'required|in:follow_up,bad_lead,quoted,booked,not_booked'
        ]);

        // Reset everything first
        $lead->resetFlow();

        switch ($request->stage) {

            case 'follow_up':
                $lead->update(['is_follow_up' => 1]);
                break;

            case 'bad_lead':
                $lead->update(['is_bad_lead' => 1]);
                break;

            case 'quoted':
                $lead->update(['is_follow_up' => 1, 'is_quoted' => 1]);
                break;

            case 'booked':
                $lead->update([
                    'is_follow_up' => 1,
                    'is_quoted' => 1,
                    'is_booked' => 1
                ]);
                break;

            case 'not_booked':
                $lead->update([
                    'is_follow_up' => 1,
                    'is_quoted' => 1,
                    'is_not_booked' => 1
                ]);
                break;
        }

        return redirect()->back()->with('success', 'Status updated');
    }
    
    //////////////////// LEAD MANAGEMENT END //////////////////////











    public function packingCalculator()
    {
        return view('frontend.company_auth.packingCalculator');
    }

    public function moverList(Request $request)
    {
        $search = trim($request->input('search', ''));

        // Base query: verified companies
        $companiesQuery = Company::query()
            ->where('companies.is_email_verified', 1)
            ->with(['users' => function ($q) {
                $q->where('user_email_verified', 1);
            }])
            ->leftJoin('users', 'companies.id', '=', 'users.company_id')
            ->groupBy('companies.id')
            ->select('companies.*')
            ->selectRaw('AVG(CASE WHEN users.user_email_verified = 1 THEN users.overall_rating END) AS user_average_rating')
            ->orderBy('companies.company_name', 'asc');

        // If searching, filter by company_name
        if ($search !== '') {
            $companiesQuery->where('companies.company_name', 'LIKE', "%{$search}%");
        }

        // No pagination — fetch all (or all matches)
        $companies = $companiesQuery->get();

        // Add safe highlighted_name when searching
        if ($search !== '' && $companies->isNotEmpty()) {
            // Phrase highlight (handles multi-word with flexible whitespace)
            $phraseQuoted  = preg_quote($search, '/');
            $phrasePattern = '/(' . preg_replace('/\s+/u', '\s+', $phraseQuoted) . ')/iu';

            // Per-word fallback (captures trailing spaces so there’s no visual gap)
            $terms = array_values(array_filter(preg_split('/\s+/u', $search)));
            $wordPattern = null;
            if (!empty($terms)) {
                $escapedTerms = array_map(fn($t) => preg_quote($t, '/'), $terms);
                // capture optional spaces after each match to keep the yellow continuous
                $wordPattern = '/(' . implode('|', $escapedTerms) . ')(\s*)/iu';
            }

            $open  = '[[[HLO]]]';
            $close = '[[[HLC]]]';

            $companies->transform(function ($c) use ($phrasePattern, $wordPattern, $open, $close) {
                $raw = $c->company_name;

                // Try phrase highlight first (wrap entire phrase including internal spaces)
                $with = preg_replace($phrasePattern, $open . '$1' . $close, $raw, 1);

                // If phrase not found, highlight per-word (including trailing spaces)
                if ($with === null || $with === $raw) {
                    if ($wordPattern) {
                        $with = preg_replace($wordPattern, $open . '$1$2' . $close, $raw);
                    }
                }

                // Escape for safety, then restore placeholders with our custom span
                $escaped = e($with ?? $raw);
                $escaped = str_replace([$open, $close], ['<span class="hl">', '</span>'], $escaped);

                $c->highlighted_name = $escaped;
                return $c;
            });
        }

        $count = $companies->count();
        $total_company = Company::where('is_email_verified', 1)->count();

        // Get all US states with company count
        $all_states = DB::table('companies')
            ->where('is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select('states.slug as slug', DB::raw('MAX(states.name) as state'), DB::raw('COUNT(*) as company_count'))
            ->groupBy('states.id', 'states.slug')
            ->orderBy('states.name', 'asc')
            ->get();

        return view('frontend.company_auth.mover-list', compact(
            'companies',
            'search',
            'count',
            'total_company',
            'all_states'
        ));
    }

    public function moveCostPage()
    {
        $state_cost_pages = StateCostPage::select('state_cost_pages.*')
            ->join('states', 'state_cost_pages.state_id', '=', 'states.id')
            ->orderBy('states.name', 'asc')
            ->orderBy('state_cost_pages.state_id', 'asc')
            ->get();

        return view('frontend.company_auth.move-cost-page', compact('state_cost_pages'));
    }

    public function moveCostShowPage(StateCostPage $stateCostPage)
    {
        $local_movers = ResourceBottomMover::where('resource_page_id', 2)
            ->orderBy('position', 'asc')
            ->take(3)
            ->get();

        $long_distance_movers = ResourceBottomMover::where('resource_page_id', 1)
            ->orderBy('position', 'asc')
            ->take(3)
            ->get();

        $container_movers = ResourceBottomMover::where('resource_page_id', 14)
            ->orderBy('position', 'asc')
            ->take(3)
            ->get();

        $truck_rental_movers = ResourceBottomMover::where('resource_page_id', 15)
            ->orderBy('position', 'asc')
            ->take(3)
            ->get();

        $faqs = StateCostPageFaq::where('state_cost_page_id', $stateCostPage->id)->get();

        return view('frontend.company_auth.move-cost-show-page', compact(
            'stateCostPage',
            'local_movers',
            'long_distance_movers',
            'container_movers',
            'truck_rental_movers',
            'faqs'
        ));
    }

    public function bestStateShowPage(BestStatePage $bestStatePage)
    {
        $movers =  Company::query()
            ->where('state_id', $bestStatePage->state->id)
            ->whereHas('users', function ($q) {
                $q->where('user_email_verified', 1)
                    ->whereNotNull('overall_rating');
            })
            ->withCount([
                'users as reviews_count' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ])
            ->withAvg([
                'users as avg_rating' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ], 'overall_rating')
            ->having('reviews_count', '>', 80)
            ->having('avg_rating', '>=', 4)
            ->orderByDesc('avg_rating')
            ->orderByDesc('reviews_count')
            ->take(10)
            ->get();

        if ($movers->isEmpty()) {
            $movers = Company::query()
                ->where('state_id', $bestStatePage->state->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(10)
                ->get();
        }



        $local_movers = Company::query()
            ->where('state_id', $bestStatePage->state->id)
            ->whereHas('users', function ($q) {
                $q->where('user_email_verified', 1)
                    ->whereNotNull('overall_rating');
            })
            ->withCount([
                'users as reviews_count' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ])
            ->withAvg([
                'users as avg_rating' => function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                },
            ], 'overall_rating')
            ->having('reviews_count', '>', 80)
            ->having('avg_rating', '>=', 4)
            ->orderByDesc('avg_rating')
            ->orderByDesc('reviews_count')
            ->take(5)
            ->get();

        // Fallback: if no companies meet the 80+ review and 4+ rating criteria
        if ($local_movers->isEmpty()) {
            $local_movers = Company::query()
                ->where('state_id', $bestStatePage->state->id)
                ->whereHas('users', function ($q) {
                    $q->where('user_email_verified', 1)
                        ->whereNotNull('overall_rating');
                })
                ->withCount([
                    'users as reviews_count' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ])
                ->withAvg([
                    'users as avg_rating' => function ($q) {
                        $q->where('user_email_verified', 1)
                            ->whereNotNull('overall_rating');
                    },
                ], 'overall_rating')
                ->orderByDesc('avg_rating')
                ->orderByDesc('reviews_count')
                ->take(5)
                ->get();
        }
        $other_state_movers = Company::where('state_id', $bestStatePage->state->id)
            ->where('is_email_verified', 1)
            ->orderBy('company_name', 'asc')
            ->get();

        // $data = DB::select(
        //     DB::raw("SELECT
        //         (SELECT COUNT(id)
        //          FROM users
        //          WHERE company_id = companies.id
        //            AND users.user_email_verified = 1
        //            AND users.deleted_at IS NULL) AS total_reviews,

        //         (SELECT SUM(overall_rating)
        //          FROM users
        //          WHERE company_id = companies.id
        //            AND users.user_email_verified = 1
        //            AND users.deleted_at IS NULL) AS sum_overall_rating,

        //         COALESCE(
        //           (SELECT SUM(overall_rating)
        //            FROM users
        //            WHERE company_id = companies.id
        //              AND users.user_email_verified = 1
        //              AND users.deleted_at IS NULL) /
        //           NULLIF((SELECT COUNT(id)
        //                   FROM users
        //                   WHERE company_id = companies.id
        //                     AND users.user_email_verified = 1
        //                     AND users.deleted_at IS NULL), 0),
        //           0.0) AS average_rating,

        //         (SELECT MAX(id)
        //          FROM users
        //          WHERE company_id = companies.id
        //            AND users.user_email_verified = 1
        //            AND users.deleted_at IS NULL) AS latest_review_id,

        //         (SELECT SUM(service_cost)
        //          FROM users
        //          WHERE company_id = companies.id
        //            AND users.user_email_verified = 1
        //            AND users.deleted_at IS NULL) AS total_cost,

        //         COALESCE(
        //           (SELECT SUM(service_cost)
        //            FROM users
        //            WHERE company_id = companies.id
        //              AND users.user_email_verified = 1
        //              AND users.deleted_at IS NULL) /
        //           NULLIF((SELECT COUNT(id)
        //                   FROM users
        //                   WHERE company_id = companies.id
        //                     AND users.user_email_verified = 1
        //                     AND users.deleted_at IS NULL), 0),
        //           0) AS average_price,

        //         companies.id,
        //         companies.company_name,
        //         companies.slug,
        //         companies.image,
        //         companies.company_email,
        //         companies.phone_no,
        //         companies.additional_phone_no,
        //         companies.company_website,
        //         companies.street,
        //         companies.city_id,
        //         companies.state_id,
        //         companies.us_dot_no AS us_dot,
        //         companies.icc_mc_license_no AS icc_mc_number,
        //         companies.is_claimed AS claimed,
        //         companies.created_at AS company_created_at,
        //         cities.name AS city_name,
        //         states.name AS state_name,
        //         states.abv AS state_abv,
        //         users.name,
        //         users.created_at,
        //         cities.name AS city,
        //         users.service_cost AS cost,
        //         users.your_review,
        //         users.review_subject AS subject,
        //         states.name AS state


        //         FROM companies
        //         LEFT JOIN states ON companies.state_id = states.id
        //         LEFT JOIN cities ON companies.city_id = cities.id
        //         LEFT JOIN users ON users.company_id = companies.id

        //         WHERE companies.is_email_verified = 1
        //           AND users.user_email_verified = 1
        //           AND users.deleted_at IS NULL
        //           AND companies.id IN (
        //               SELECT DISTINCT company_id
        //               FROM users
        //               WHERE users.user_email_verified = 1
        //                 AND users.deleted_at IS NULL
        //           )

        //         GROUP BY companies.id, users.id
        //         ORDER BY companies.created_at DESC
        //         LIMIT 100;
        //     ")
        // );

        $long_distance_movers = ResourceBottomMover::where('resource_page_id', 1)
            ->orderBy('position', 'asc')
            ->take(5)
            ->get();

        $container_movers = ResourceBottomMover::where('resource_page_id', 14)
            ->orderBy('position', 'asc')
            ->take(3)
            ->get();

        $truck_rental_movers = ResourceBottomMover::where('resource_page_id', 15)
            ->orderBy('position', 'asc')
            ->take(3)
            ->get();

        // return $long_distance_movers;

        $faqs = BestStatePageFaq::where('best_state_page_id', $bestStatePage->id)->get();

        $companyFields = [
            'companies.id',
            'companies.company_name',
            'companies.image',
            'companies.slug',
            'companies.us_dot_no',
            'companies.icc_mc_license_no',
            'companies.is_claimed',
            'companies.local_mover',
            'companies.long_distance_mover',
            'companies.phone_no',
            'companies.company_website',
            'companies.street',
            'companies.state_id',
            'companies.city_id',
        ];

        $data = Company::select($companyFields)
            ->with([
                'state:id,name,abv',
                'city:id,name'
            ])
            ->withCount('verifiedUsers as total_reviews')
            ->withAvg('verifiedUsers as average_rating', 'overall_rating')
            ->withAvg('verifiedUsers as average_price', 'service_cost')
            ->where('is_email_verified', 1)
            ->orderBy('company_name', 'asc')
            // ->limit(100)
            ->get();




        return view('frontend.company_auth.best_state_show', compact(
            // 'data',
            'bestStatePage',
            'movers',
            'local_movers',
            'other_state_movers',
            'long_distance_movers',
            'container_movers',
            'truck_rental_movers',
            'faqs',
            'data'
        ));
    }
}
