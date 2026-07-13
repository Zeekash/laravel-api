<?php

namespace App\Http\Controllers\Api\Frontend;

use \URL;
use App\Http\Controllers\Controller;
use App\Mail\UserContactUsMail;
use App\Models\City;
use App\Models\Company;
use App\Models\State;
use App\Models\UserContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;

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
    public function moverList(Request $request)
    {
        $search = trim($request->input('search', ''));

        $companiesQuery = Company::query()
            ->where('companies.is_email_verified', 1)
            ->with([
                'users' => function ($q) {
                    $q->where('user_email_verified', 1);
                }
            ])
            ->leftJoin('users', 'companies.id', '=', 'users.company_id')
            ->groupBy('companies.id')
            ->select('companies.*')
            ->selectRaw('AVG(CASE WHEN users.user_email_verified = 1 THEN users.overall_rating END) AS user_average_rating')
            ->orderBy('companies.company_name', 'asc');

        if ($search !== '') {
            $companiesQuery->where('companies.company_name', 'LIKE', "%{$search}%");
        }

        $companies = $companiesQuery->get();

        if ($search !== '' && $companies->isNotEmpty()) {
            $phraseQuoted = preg_quote($search, '/');
            $phrasePattern = '/(' . preg_replace('/\s+/u', '\s+', $phraseQuoted) . ')/iu';

            $terms = array_values(array_filter(preg_split('/\s+/u', $search)));
            $wordPattern = null;

            if (!empty($terms)) {
                $escapedTerms = array_map(fn($t) => preg_quote($t, '/'), $terms);
                $wordPattern = '/(' . implode('|', $escapedTerms) . ')(\s*)/iu';
            }

            $open = '[[[HLO]]]';
            $close = '[[[HLC]]]';

            $companies->transform(function ($company) use ($phrasePattern, $wordPattern, $open, $close) {
                $rawName = $company->company_name;

                $highlighted = preg_replace(
                    $phrasePattern,
                    $open . '$1' . $close,
                    $rawName,
                    1
                );

                if ($highlighted === null || $highlighted === $rawName) {
                    if ($wordPattern) {
                        $highlighted = preg_replace(
                            $wordPattern,
                            $open . '$1$2' . $close,
                            $rawName
                        );
                    }
                }

                $escaped = e($highlighted ?? $rawName);

                $company->highlighted_name = str_replace(
                    [$open, $close],
                    ['<span class="hl">', '</span>'],
                    $escaped
                );

                return $company;
            });
        } else {
            $companies->transform(function ($company) {
                $company->highlighted_name = e($company->company_name);
                return $company;
            });
        }

        $count = $companies->count();

        $totalCompany = Company::where('is_email_verified', 1)->count();

        $allStates = DB::table('companies')
            ->where('companies.is_email_verified', 1)
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->select(
                'states.id',
                'states.slug',
                DB::raw('MAX(states.name) as state'),
                DB::raw('COUNT(*) as company_count')
            )
            ->groupBy('states.id', 'states.slug')
            ->orderBy('states.name', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Mover list fetched successfully.',
            'data' => [
                'companies' => $companies,
                'search' => $search,
                'count' => $count,
                'total_company' => $totalCompany,
                'all_states' => $allStates,
            ],
        ]);
    }
    public function usercontactUspost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone_no' => 'required|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $userContactUs = UserContactUs::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            Mail::to('contact@mymovingjourney.com')->send(
                new UserContactUsMail($userContactUs)
            );

            return response()->json([
                'success' => true,
                'message' => 'Mail has been sent successfully.',
                'data' => [
                    'contact' => $userContactUs,
                ],
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while sending your message.',
                'errors' => [
                    'server' => [$e->getMessage()],
                ],
            ], 500);
        }
    }

    public function moverReviewPost(Request $request, $slug)
    {
        $company = Company::where('slug', $slug)->first();
        if (!$company) {
            return response()->json([
                'success' => false,
                'message' => 'Company not found.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',

            'overall_rating' => 'required|integer|min:1|max:5',
            'review_subject' => 'required|string|max:255',
            'your_review' => 'required|string|min:15',

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

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validatedData = $validator->validated();

        $exists = User::where('email', $validatedData['email'])
            ->where('company_id', $company->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'You already reviewed this company!',
            ], 400);
        }

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
        $user->save();

        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $user->id,
            'token'   => $token,
        ]);

        // Mail::mailer('noreply')->send(
        //     'emails.userEmailVerification',
        //     ['token' => $token, 'user' => $user, 'company' => $company],
        //     function ($message) use ($user) {
        //         $message->from(env('NOREPLY_USERNAME', 'noreply@mymovingjourney.com'), 'MyMovingJourney')
        //             ->to($user->email)
        //             ->subject('Confirm your review at MyMovingJourney - action needed');
        //     }
        // );

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully. We sent you an email. Please verify your email.',
            'data' => $user
        ], 200);
    }

    public function resourcePageApi($slug)
    {
        $resourcePage = \App\Models\ResourcePage::where('slug', $slug)->first();
        if (!$resourcePage) {
            return response()->json([
                'success' => false,
                'message' => 'Resource Page not found.',
            ], 404);
        }

        $top_movers = \App\Models\ResourceTopMover::orderBy('position', 'asc')->where('resource_page_id', $resourcePage->id)->get();
        $bottom_movers = \App\Models\ResourceBottomMover::orderBy('position', 'asc')->where('resource_page_id', $resourcePage->id)->get();
        $other_movers = \App\Models\ResourceOtherMover::orderBy('position', 'asc')->where('resource_page_id', $resourcePage->id)->get();

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
            ->get();

        $best_state_pages = \App\Models\BestStatePage::select('best_state_pages.*')
            ->join('states', 'best_state_pages.state_id', '=', 'states.id')
            ->orderBy('states.name', 'asc')
            ->orderBy('best_state_pages.state_id', 'asc')
            ->get();

        $faqs = \App\Models\ResourcePageFaq::where('resource_page_id', $resourcePage->id)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'resourcePage' => $resourcePage,
                'top_movers' => $top_movers,
                'bottom_movers' => $bottom_movers,
                'other_movers' => $other_movers,
                'companies' => $data,
                'best_state_pages' => $best_state_pages,
                'faqs' => $faqs,
            ]
        ]);
    }
}
