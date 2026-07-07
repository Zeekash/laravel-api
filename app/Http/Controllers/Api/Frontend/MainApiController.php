<?php

namespace App\Http\Controllers\Api\Frontend;

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
}
