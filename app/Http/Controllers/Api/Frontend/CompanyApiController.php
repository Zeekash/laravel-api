<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Company;
use App\Models\CompanyFaq;
use App\Models\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyApiController extends Controller
{
    public function companyShow(Request $request, Company $company)
    {
        if ((int) $company->is_email_verified !== 1) {
            return response()->json([
                'success' => false,
                'message' => 'Company not found or not verified.',
            ], 404);
        }

        $company_faq = CompanyFaq::where('company_id', $company->id)->get();

        $reviewId = $request->input('id');

        $review = $reviewId
            ? User::where('user_email_verified', 1)
            ->where('company_id', $company->id)
            ->find($reviewId)
            : null;

        $currentDate = Carbon::now()->format('M Y');

        $admin = Admin::all();

        $post = Post::orderBy('id', 'desc')
            ->take(3)
            ->get();

        $base = User::query()
            ->where('user_email_verified', 1)
            ->where('company_id', $company->id);

        $state_op = (clone $base)->get();

        $usersUnique = $state_op
            ->unique('pick_up_state_id')
            ->values();

        $total_reviews = (clone $base)->count();

        $total_rating = (clone $base)->sum('overall_rating');

        $total_cost = (clone $base)->sum('service_cost');

        $min_price = (clone $base)->min('service_cost');
        $max_price = (clone $base)->max('service_cost');

        $min_rating = (clone $base)->min('overall_rating');
        $max_rating = (clone $base)->max('overall_rating');

        $avg_cost = $total_reviews > 0
            ? round($total_cost / $total_reviews, 2)
            : 0;

        $avg_rating = $total_reviews > 0
            ? round($total_rating / $total_reviews, 2)
            : 0;

        $star_5 = (clone $base)->where('overall_rating', 5)->count();
        $star_4 = (clone $base)->where('overall_rating', 4)->count();
        $star_3 = (clone $base)->where('overall_rating', 3)->count();
        $star_2 = (clone $base)->where('overall_rating', 2)->count();
        $star_1 = (clone $base)->where('overall_rating', 1)->count();

        $per_5 = $total_reviews > 0 ? round(($star_5 / $total_reviews) * 100, 2) : 0;
        $per_4 = $total_reviews > 0 ? round(($star_4 / $total_reviews) * 100, 2) : 0;
        $per_3 = $total_reviews > 0 ? round(($star_3 / $total_reviews) * 100, 2) : 0;
        $per_2 = $total_reviews > 0 ? round(($star_2 / $total_reviews) * 100, 2) : 0;
        $per_1 = $total_reviews > 0 ? round(($star_1 / $total_reviews) * 100, 2) : 0;

        $reviewsQuery = (clone $base);

        if ($request->get('sort') == 'rate_asc') {
            $reviewsQuery->orderBy('overall_rating', 'asc');
        } elseif ($request->get('sort') == 'rate_desc') {
            $reviewsQuery->orderBy('overall_rating', 'desc');
        } elseif ($request->get('sort') == 'oldest') {
            $reviewsQuery->orderBy('created_at', 'asc');
        } elseif ($request->get('sort') == 'newest') {
            $reviewsQuery->orderBy('created_at', 'desc');
        } else {
            $reviewsQuery->orderBy('created_at', 'desc');
        }

        $reviews = $reviewsQuery
            ->paginate(10)
            ->appends($request->query());

        $company_state = $company->state_id;

        $comparison_companies = Company::where('is_email_verified', 1)
            ->where('state_id', $company_state)
            ->where('id', '!=', $company->id)
            ->with(['users' => function ($query) {
                $query->where('user_email_verified', 1)
                    ->select('id', 'company_id', 'overall_rating', 'service_cost');
            }])
            ->get()
            ->map(function ($comparisonCompany) {
                $totalReviews = $comparisonCompany->users->count();
                $totalRating = $comparisonCompany->users->sum('overall_rating');
                $totalCost = $comparisonCompany->users->sum('service_cost');

                $comparisonCompany->average_rating = $totalReviews > 0
                    ? round($totalRating / $totalReviews, 2)
                    : 0;

                $comparisonCompany->average_price = $totalReviews > 0
                    ? round($totalCost / $totalReviews, 2)
                    : 0;

                $comparisonCompany->total_reviews = $totalReviews;

                unset($comparisonCompany->users);

                return $comparisonCompany;
            })
            ->values();

        $total_rated_reviews = (clone $base)
            ->whereNotNull('overall_rating')
            ->count();

        $negative_reviews = (clone $base)
            ->where('overall_rating', '>', 0.1)
            ->where('overall_rating', '<=', 3)
            ->count();

        $positive_reviews = (clone $base)
            ->where('overall_rating', '>=', 3.1)
            ->where('overall_rating', '<=', 5)
            ->count();

        $negative_percentage = $total_rated_reviews > 0
            ? round(($negative_reviews / $total_rated_reviews) * 100, 2)
            : 0;

        $positive_percentage = $total_rated_reviews > 0
            ? round(($positive_reviews / $total_rated_reviews) * 100, 2)
            : 0;

        return response()->json([
            'success' => true,
            'message' => 'Company details fetched successfully.',

            'data' => [
                'company' => $company,

                'current_date' => $currentDate,

                'faq' => $company_faq,

                'admins' => $admin,

                'latest_posts' => $post,

                'selected_review' => $review,

                'state_options' => $state_op,

                'unique_states' => $usersUnique,

                'stats' => [
                    'total_reviews' => $total_reviews,
                    'total_rated_reviews' => $total_rated_reviews,
                    'total_rating' => $total_rating,
                    'average_rating' => $avg_rating,

                    'total_cost' => $total_cost,
                    'average_cost' => $avg_cost,
                    'min_price' => $min_price,
                    'max_price' => $max_price,

                    'min_rating' => $min_rating,
                    'max_rating' => $max_rating,
                ],

                'star_breakdown' => [
                    'star_5' => [
                        'count' => $star_5,
                        'percentage' => $per_5,
                    ],
                    'star_4' => [
                        'count' => $star_4,
                        'percentage' => $per_4,
                    ],
                    'star_3' => [
                        'count' => $star_3,
                        'percentage' => $per_3,
                    ],
                    'star_2' => [
                        'count' => $star_2,
                        'percentage' => $per_2,
                    ],
                    'star_1' => [
                        'count' => $star_1,
                        'percentage' => $per_1,
                    ],
                ],

                'sentiment' => [
                    'negative_reviews' => $negative_reviews,
                    'positive_reviews' => $positive_reviews,
                    'negative_percentage' => $negative_percentage,
                    'positive_percentage' => $positive_percentage,
                ],

                'reviews' => [
                    'data' => $reviews->items(),

                    'pagination' => [
                        'current_page' => $reviews->currentPage(),
                        'per_page' => $reviews->perPage(),
                        'total' => $reviews->total(),
                        'last_page' => $reviews->lastPage(),
                        'from' => $reviews->firstItem(),
                        'to' => $reviews->lastItem(),

                        'links' => [
                            'first' => $reviews->url(1),
                            'last' => $reviews->url($reviews->lastPage()),
                            'prev' => $reviews->previousPageUrl(),
                            'next' => $reviews->nextPageUrl(),
                        ],
                    ],
                ],

                'comparison_companies' => $comparison_companies,
            ],
        ], 200);
    }
}
