<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostFaq;
use App\Models\PostVisit;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    public function index()
    {
        $baseQuery = Post::select([
            'title',
            'description',
            'slug',
            'title',
            'image',
            'img_alt',
            'created_at',
            'admin_id',
        ])
            ->where('is_published', 1)
            ->orderByRaw("
            CASE
                WHEN published_at IS NOT NULL THEN published_at
                ELSE created_at
            END DESC
        ");

        $posts = (clone $baseQuery)->paginate(20);

        $featuredPosts = (clone $baseQuery)
            ->take(3)
            ->get();

        $categories = PostCategory::withCount([
            'posts' => function ($query) {
                $query->where('is_published', 1);
            }
        ])->get();

        return response()->json([
            'success' => true,
            'message' => 'Posts retrieved successfully.',
            'data' => [
                'posts' => $posts,
                'featured_posts' => $featuredPosts,
                'categories' => $categories,
            ],
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function show(Request $request, Post $post)
    {
        if (!$post->is_published) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found.'
            ], 404);
        }

        $categories = PostCategory::all();
        $authors = Admin::all();

        $postFaqs = PostFaq::where('post_id', $post->id)->get();

        $featuredPosts = Post::where('is_published', 1)
            ->orderByRaw("CASE WHEN published_at IS NOT NULL THEN published_at ELSE created_at END DESC")
            ->take(3)
            ->get();

        // Count visits before adding the current visit
        // $blogVisitCount = PostVisit::where('post_id', $post->id)->count();

        // $ipAddress = $request->ip();
        // $referrerPage = $request->headers->get('referer');
        // $currentMonth = now()->format('Y-m');

        // $existingVisit = PostVisit::where('post_id', $post->id)
        //     ->where('ip_address', $ipAddress)
        //     ->where('date', 'like', $currentMonth . '%')
        //     ->first();

        // if (!$existingVisit) {
        //     PostVisit::create([
        //         'post_id' => $post->id,
        //         'ip_address' => $ipAddress,
        //         'date' => now()->toDateString(),
        //         'referrer_page' => $referrerPage,
        //     ]);

        //     // Increase count after inserting
        //     $blogVisitCount++;
        // }

        return response()->json([
            'success' => true,
            'message' => 'Post retrieved successfully.',
            'data' => [
                'post' => $post,
                'featured_posts' => $featuredPosts,
                'categories' => $categories,
                'authors' => $authors,
                'faqs' => $postFaqs,
                // 'visit_count' => $blogVisitCount,

                // Share URLs instead of HTML buttons
                'share_links' => [
                    'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode(url('/posts/' . $post->slug)),
                    'twitter' => 'https://twitter.com/intent/tweet?url=' . urlencode(url('/posts/' . $post->slug)),
                    'linkedin' => 'https://www.linkedin.com/shareArticle?url=' . urlencode(url('/posts/' . $post->slug)),
                    'telegram' => 'https://t.me/share/url?url=' . urlencode(url('/posts/' . $post->slug)),
                    'whatsapp' => 'https://wa.me/?text=' . urlencode(url('/posts/' . $post->slug)),
                    'pinterest' => 'https://pinterest.com/pin/create/button/?url=' . urlencode(url('/posts/' . $post->slug)),
                    'reddit' => 'https://reddit.com/submit?url=' . urlencode(url('/posts/' . $post->slug)),
                ]
            ]
        ]);
    }

    public function catShow(Request $request, PostCategory $category)
    {
        $search = $request->input('search');

        $query = Post::select(['title','slug','description','image','img_alt'])->where('is_published', 1)
            ->where('post_category_id', $category->id)
            ->orderByRaw("
            CASE
                WHEN published_at IS NOT NULL THEN published_at
                ELSE created_at
            END DESC
        ");

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(20);

        return response()->json([
            'success' => true,
            'message' => 'Category posts retrieved successfully.',
            'data' => [
                'category' => $category,
                'posts' => $posts,
            ],
        ], 200);
    }
}
