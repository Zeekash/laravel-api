<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeApiController extends Controller
{
    public function homePage()
    {
        $data = DB::select(DB::raw("
            SELECT
                (
                    SELECT COUNT(id)
                    FROM users
                    WHERE company_id = companies.id
                    AND users.user_email_verified = 1
                    AND users.deleted_at IS NULL
                ) AS total_reviews,

                (
                    SELECT SUM(overall_rating)
                    FROM users
                    WHERE company_id = companies.id
                    AND users.user_email_verified = 1
                    AND users.deleted_at IS NULL
                ) AS sum_overall_rating,

                (
                    (
                        SELECT SUM(overall_rating)
                        FROM users
                        WHERE company_id = companies.id
                        AND users.user_email_verified = 1
                        AND users.deleted_at IS NULL
                    ) /
                    (
                        SELECT COUNT(id)
                        FROM users
                        WHERE company_id = companies.id
                        AND users.user_email_verified = 1
                        AND users.deleted_at IS NULL
                    )
                ) AS average_rating,

                (
                    SELECT MAX(id)
                    FROM users
                    WHERE company_id = companies.id
                    AND users.user_email_verified = 1
                    AND users.deleted_at IS NULL
                ) AS max_id,

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
            LIMIT 6
        "));

        $company_city = DB::select("
            SELECT
                COUNT(*) as total,
                cities.name,
                cities.zip_code,
                companies.city_id
            FROM companies
            LEFT JOIN cities ON companies.city_id = cities.id
            WHERE is_email_verified = 1
            GROUP BY cities.zip_code
            ORDER BY cities.name
        ");

        $companies = Company::with([
            'users' => function ($query) {
                $query->where('user_email_verified', 1)
                    ->orderBy('created_at', 'asc');
            }
        ])
            ->where('is_email_verified', 1)
            ->where('is_featured', 1)
            ->orderBy('created_at', 'asc')
            ->get();

        $states = DB::table('companies')
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->where('companies.is_email_verified', 1)
            ->select(
                'states.slug',
                DB::raw('MAX(states.name) as state'),
                DB::raw('COUNT(*) as company_count'),
                'states.abv'
            )
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
            ->join('states', 'companies.state_id', '=', 'states.id')
            ->where('companies.is_email_verified', 1)
            ->select(
                'states.slug',
                DB::raw('MAX(states.name) as state'),
                DB::raw('COUNT(*) as company_count')
            )
            ->groupBy('states.slug')
            ->orderByDesc('company_count')
            ->limit(9)
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'featured' => $data,
                'companies' => $companies,
                'states' => $states,
                'company_city' => $company_city,
                'posts' => $posts,
                'blogs' => $blogs,
                'topStates' => $topStates,
            ]
        ], 200, [], JSON_PRETTY_PRINT);
    }
}
