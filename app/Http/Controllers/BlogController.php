<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Post;
use App\Models\Admin;
use Corcel\Model\User;
use App\Models\PostFaq;
use App\Models\PostVisit;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('is_published', 1)
            ->orderByRaw("CASE WHEN published_at IS NOT NULL THEN published_at ELSE created_at END DESC")
            ->paginate(20);

        $data = Post::where('is_published', 1)
            ->orderByRaw("CASE WHEN published_at IS NOT NULL THEN published_at ELSE created_at END DESC")
            ->take(3)
            ->get();
        $categories = PostCategory::withCount(['posts' => function ($query) {
            $query->where('is_published', 1);
        }])->get();
        return view('frontend.company_auth.post', compact('posts', 'data', 'categories'));
    }


    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function commentShow()
    // {
    //     $comments = Comment::all();
    //     return view('frontend.company_auth.commentsDisp', compact('comments'));
    // }

    // public function commentPost(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email:rfc,dns',
    //         'body' => 'required',
    //     ]);

    //     $input = $request->all();

    //     Comment::create($input);

    //     return redirect()->back();

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        $categories = PostCategory::all();
        $post_faqs = PostFaq::where('post_id', $post->id)->get();
        if ($post->is_published == 1) {
            $data = Post::where('is_published', 1)
                ->orderByRaw("CASE WHEN published_at IS NOT NULL THEN published_at ELSE created_at END DESC")
                ->take(3)
                ->get();
            $shareButtons = \Share::page(
                'https://mymovingjourney.com/',
                'Your share text comes here',
            )
                ->facebook()
                ->twitter()
                ->linkedin()
                ->telegram()
                ->whatsapp()
                ->pinterest()
                ->reddit();


            $blog_visit_count = PostVisit::where('post_id', $post->id)->count();
            //-------------------- Post Visits Records ---------------//

            $ipAddress = $request->ip();
            $referrerPage = URL::previous();
            $currentMonth = Carbon::now()->format('Y-m');

            // Check if the visit from this IP address has already been recorded today
            $existingVisit = PostVisit::where('post_id', $post->id)
                ->where('ip_address', $ipAddress)
                // ->where('referrer_page', $referrerPage)
                ->where('date', 'like', $currentMonth . '%')
                ->first();

            if (!$existingVisit) {
                // Record the visit
                PostVisit::create([
                    'post_id' => $post->id,
                    'ip_address' => $ipAddress,
                    'date' => Carbon::now()->toDateString(),
                    'referrer_page' => $referrerPage,
                ]);
            }
            //             $paragraphs = explode('</p>', string: $post->body);
            //             $total = count($paragraphs);

            //             $formHtml1 = '<div class="col-12 my-3">
            //             <div class="new_card p-4 position-relative">
            //                 <div class="card_design">&nbsp;</div>
            //                 <div class="card-body d-sm-flex align-items-center">
            //                     <div class="icon_div me-4 d-flex justify-content-center align-items-center"><img
            //                             src="../../assets/img/annoucement_one.svg" alt="Announcement" width="50px"></div>
            //                     <div class="content_div">
            //                         <p class="MsoNormal mb-md-0 mb-2"><strong>If you\'re getting ready to move and need reliable professionals to handle the job, check out our list of the <a
            //                                     href="https://mymovingjourney.com/resource/best-moving-companies" target="_blank" rel="noopener">best moving companies in USA.</a></strong></p>
            //                     </div>
            //                 </div>
            //             </div>
            //         </div>';
            //             $formHtml2 = '<div class="col-12 my-3">
            //     <div class="new_card p-4 position-relative">
            //         <div class="card_design">&nbsp;</div>
            //         <div class="card-body d-sm-flex align-items-center">
            //             <div class="icon_div me-4 d-flex justify-content-center align-items-center"><img
            //                     src="https://mymovingjourney.com/assets/img/annoucement_four.svg" alt="Announcement" width="50px"></div>
            //             <div class="content_div">
            //                 <p class="MsoNormal mb-md-0 mb-2"><strong>Preparing for a big move? Explore our top picks for the  <a
            //                             href="https://mymovingjourney.com/resource/best-moving-companies" target="_blank" rel="noopener">best long-distance moving companies in USA</a></strong>and find the perfect team to help you get there.</p>
            //             </div>
            //         </div>
            //     </div>
            // </div>';
            //             $insertAfterLast4 = $total - 7;
            //             $bodyWithForm = '';
            //             foreach ($paragraphs as $i => $para) {
            //                 $bodyWithForm .= $para . '</p>';

            //                 if ($i === 3) {
            //                     $bodyWithForm .= $formHtml1;
            //                 }
            //                 if ($i === $insertAfterLast4) {
            //                     $bodyWithForm .= $formHtml2;
            //                 }
            //             }

            //             $post->body = $bodyWithForm;

            //             // Pass the modified body to the view
            //             $post->body = $bodyWithForm;
            return view('frontend.company_auth.post-show', compact(
                'post',
                'shareButtons',
                'data',
                'categories',
                'post_faqs',
                'blog_visit_count',
            ));
        } else {
            abort('404');
        }
    }

    public function authorShow($slug)
    {
        $admin = Admin::where('slug', $slug)->first();
        $posts = $admin->posts()->published()->paginate(6);
        $categories = PostCategory::all();
        // return $posts;
        if ($admin->email != 'contact@mymovingjourney.com') {

            return view('frontend.company_auth.author-show', compact('posts', 'admin', 'categories'));
        } else {
            return redirect()->route('company.listing')->with('error', 'Author does not exist');
        }
    }
    public function catShow(Request $request, PostCategory $category)
    {
        $search = $request->input('search');

        $query = Post::where('is_published', 1)
            ->where('post_category_id', $category->id)
            ->orderByRaw("CASE WHEN published_at IS NOT NULL THEN published_at ELSE created_at END DESC");

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $posts = $query->paginate(20);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('frontend.company_auth.partials.post-cards', compact('posts'))->render(),
                'hasMore' => $posts->hasMorePages(),
            ]);
        }

        return view('frontend.company_auth.post-cat-show', compact('posts', 'category'));
    }

    public function tagShow(Taxonomy $tag, Post $post)
    {

        return view('frontend.company_auth.post-tag-show', compact('post', 'tag'));
    }

    // public function CatShow(Taxonomy $category)
    // {

    //     return view('frontend.company_auth.post-cat-show', compact('category'));
    // }

    // public function tagShow($slug)
    // {

    //     if (Tag::where('slug', $slug)->first()) {
    //         $data = [
    //             'posts' => Post::whereHas('tags', function ($query) use ($slug) {
    //                 $query->where('slug', $slug);
    //             })->published()->orderByDesc('published_at')->get(),
    //             'slug' => $slug,
    //         ];
    //         // return $data;
    //         return view('frontend.company_auth.post-tag-show', compact('data'));
    //     } else {
    //         abort(404);
    //     }
    // }

    // public function topicShow($slug)
    // {
    //     $data = \Canvas\Models\Topic::with('posts')->firstWhere('slug', $slug);
    //     // return $data;

    //     return view('frontend.company_auth.post-topic-show', compact('data'));
    // }

}
