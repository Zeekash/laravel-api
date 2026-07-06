<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\SponsoredPostApprovedMail;
use App\Mail\SponsoredPostRejectedMail;
use App\Models\LeadBillingHistory;
use App\Models\Post;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SponsoredPostController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');

        $base = Post::with('company', 'postCategory')->where('post_type', 'sponsored');

        $totalPosts      = (clone $base)->count();
        $pendingCount    = (clone $base)->where('sponsored_status', 'pending')->count();
        $awaitingCount   = (clone $base)->where('sponsored_status', 'awaiting_payment')->count();
        $publishedCount  = (clone $base)->where('sponsored_status', 'published')->count();
        $rejectedCount   = (clone $base)->where('sponsored_status', 'rejected')->count();
        $paidCount       = (clone $base)->where('payment_status', 'paid')->count();
        $totalCompanies  = (clone $base)->distinct('company_id')->count('company_id');
        $totalRevenue    = (clone $base)->where('payment_status', 'paid')->sum('price');

        $query = clone $base;
        if ($filter !== 'all') {
            $query->where('sponsored_status', $filter);
        }
        $posts = $query->latest()->get();

        $billing = LeadBillingHistory::with('company')
            ->where('invoice_no', 'like', 'INV-SP-%')
            ->latest('paid_at')
            ->get();

        return view('backend.pages.sponsored-posts.index', compact(
            'posts',
            'filter',
            'totalPosts',
            'pendingCount',
            'awaitingCount',
            'publishedCount',
            'rejectedCount',
            'paidCount',
            'totalCompanies',
            'totalRevenue',
            'billing'
        ));
    }

    public function show(Post $post)
    {
        abort_if($post->post_type !== 'sponsored', 404);

        $post->load('company', 'postCategory');

        return view('backend.pages.sponsored-posts.show', compact('post'));
    }

    public function approve(Post $post)
    {
        abort_if($post->post_type !== 'sponsored', 404);

        if (!$post->seo_complete) {
            return back()->with('error', 'SEO fields are incomplete. Complete SEO fields before approval.');
        }

        $post->update([
            'sponsored_status' => 'awaiting_payment',
            'approved_at'      => now(),
            'payment_due_at'   => now()->addHours(48),
            'admin_note'       => null,
        ]);

        try {
            if ($post->company && $post->company->email) {
                Mail::to($post->company->email)->send(new SponsoredPostApprovedMail($post));
            }
        } catch (\Exception $e) {
            Log::error('Approved company email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Sponsored post approved. Payment link sent to company.');
    }

    public function reject(Request $request, Post $post)
    {
        abort_if($post->post_type !== 'sponsored', 404);

        $request->validate([
            'admin_note' => 'required|string|max:2000',
        ]);

        $post->update([
            'sponsored_status' => 'rejected',
            'admin_note'       => $request->admin_note,
            'is_published'     => 0,
        ]);

        try {
            if ($post->company && $post->company->email) {
                Mail::to($post->company->email)->send(new SponsoredPostRejectedMail($post));
            }
        } catch (\Exception $e) {
            Log::error('Rejected company email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Sponsored post rejected with admin note.');
    }

    public function revision(Request $request, Post $post)
    {
        abort_if($post->post_type !== 'sponsored', 404);

        $request->validate([
            'admin_note' => 'required|string|max:2000',
        ]);

        $post->update([
            'sponsored_status' => 'revision_requested',
            'admin_note'       => $request->admin_note,
            'is_published'     => 0,
        ]);

        // Notify company about revision request
        try {
            if ($post->company && $post->company->email) {
                Mail::to($post->company->email)->send(new SponsoredPostRejectedMail($post));
            }
        } catch (\Exception $e) {
            Log::error('Revision company email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Revision requested from company with admin note.');
    }

    public function renew(Request $request, Post $post)
    {
        abort_if($post->post_type !== 'sponsored', 404);

        $expiresAt = $post->expires_at && now()->lessThan($post->expires_at)
            ? $post->expires_at->copy()->addMonth()
            : now()->addMonth();

        $post->update([
            'sponsored_status' => 'published',
            'is_published'     => 1,
            'expires_at'       => $expiresAt,
            'published_at'     => $post->published_at ?? now(),
        ]);

        return back()->with('success', 'Sponsored post successfully renewed for another month.');
    }
}
