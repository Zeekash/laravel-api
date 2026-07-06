<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Models\CompanyLeadPlanSubscription;
use App\Models\LeadBillingHistory;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SponsoredPostRequestMail;
use App\Mail\SponsoredPostPaymentConfirmationMail;
use App\Mail\SponsoredPostResubmitAdminMail;
use App\Mail\SponsoredPostResubmitUserMail;
use App\Mail\SponsoredPostSubmitUserMail;
use Stripe\StripeClient;
use Carbon\Carbon;

class SponsoredPostController extends Controller
{
    public function index()
    {
        $company = Auth::guard('company')->user();

        $posts = Post::where('company_id', $company->id)
            ->where('post_type', 'sponsored')
            ->latest()
            ->get();

        return view('company.sponsored-posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = PostCategory::orderBy('name')->get();

        return view('company.sponsored-posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'meta_description' => 'required|string|max:160',
            'focus_keyword' => 'required|string|max:120',
            'post_category_id' => 'required|exists:post_categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'body' => 'required|string',
        ]);

        $wordCount = str_word_count(strip_tags($request->body));

        if ($wordCount < 300) {
            return back()
                ->withInput()
                ->withErrors(['body' => 'Post body must be at least 300 words.']);
        }

       $company = Auth::guard('company')->user();

        abort_if(!$company, 403);

        $imagePath = $request->file('image')->store('posts', 'public');

        $post = Post::create([
            'admin_id' => null,
            'company_id' => $company->id,
            'post_category_id' => $request->post_category_id,

            'post_type' => 'sponsored',
            'sponsored_status' => 'pending',
            'payment_status' => 'unpaid',

            'price' => 199.00,
            'currency' => 'usd',

            'title' => $request->title,
            'description' => $request->meta_description,
            'slug' => Str::slug($request->title) . '-' . Str::random(6),

            'meta_title' => $request->title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->focus_keyword,

            'body' => $request->body,
            'image' => $imagePath,
            'img_alt' => $request->title,

            'is_published' => 0,
            'is_featured' => 0,
            'published_at' => null,
        ]);

        Mail::to('contact@mymovingjourney.com')->send(new SponsoredPostRequestMail($post));
        
        if ($company->email) {
            Mail::to($company->email)->send(new SponsoredPostSubmitUserMail($post));
        }

        return redirect()
            ->route('company.sponsored-posts.submitted', $post->id)
            ->with('success', 'Request submitted successfully. No payment has been taken.');
    }

    public function edit(Post $post)
    {
        $this->checkCompanyPost($post);

        if (!in_array($post->sponsored_status, ['rejected', 'pending'])) {
            return back()->with('error', 'You cannot edit this post at the moment.');
        }

        $categories = PostCategory::orderBy('name')->get();

        return view('company.sponsored-posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $this->checkCompanyPost($post);

        if (!in_array($post->sponsored_status, ['rejected', 'pending'])) {
            return back()->with('error', 'You cannot edit this post at the moment.');
        }

        $request->validate([
            'title' => 'required|string|max:100',
            'meta_description' => 'required|string|max:160',
            'focus_keyword' => 'required|string|max:120',
            'post_category_id' => 'required|exists:post_categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'body' => 'required|string',
        ]);

        $wordCount = str_word_count(strip_tags($request->body));

        if ($wordCount < 300) {
            return back()
                ->withInput()
                ->withErrors(['body' => 'Post body must be at least 300 words.']);
        }

        $data = [
            'post_category_id' => $request->post_category_id,
            'title' => $request->title,
            'description' => $request->meta_description,
            'meta_title' => $request->title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->focus_keyword,
            'body' => $request->body,
            'img_alt' => $request->title,
            'sponsored_status' => 'pending',
            'admin_note' => null,
        ];

        if ($request->title !== $post->title) {
            $data['slug'] = \Illuminate\Support\Str::slug($request->title) . '-' . \Illuminate\Support\Str::random(6);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $data['image'] = $imagePath;
        }

        $post->update($data);

        Mail::to('contact@mymovingjourney.com')->send(new SponsoredPostResubmitAdminMail($post));

        if ($post->company && $post->company->email) {
            Mail::to($post->company->email)->send(new SponsoredPostResubmitUserMail($post));
        }

        return redirect()
            ->route('company.sponsored-posts.index')
            ->with('success', 'Post updated and resubmitted successfully.');
    }

    public function submitted(Post $post)
    {
        $this->checkCompanyPost($post);

        return view('company.sponsored-posts.submitted', compact('post'));
    }

    public function checkout(Post $post)
    {
        $this->checkCompanyPost($post);

        $company = Auth::guard('company')->user();

        //  default saved card
        if (!$company->stripe_payment_method_id || !$company->stripe_customer_id) {
            return redirect()
                ->route('company.payment-methods.index')
                ->with('error', 'Pehle ek default payment method add karein phir pay karein.');
        }

        $isExpired = $post->sponsored_status === 'published'
            && $post->expires_at
            && now()->greaterThan($post->expires_at);

        $isRenewing = $post->sponsored_status === 'published'
            && $post->expires_at
            && now()->greaterThanOrEqualTo($post->expires_at->copy()->subDays(5));

        if (! $isRenewing && ! $isExpired
            && ($post->sponsored_status !== 'awaiting_payment' || $post->payment_status !== 'unpaid')
        ) {
            return back()->with('error', 'Payment is not available for this post.');
        }

        // Check payment window (48 h)
        if (!$isRenewing && !$isExpired && $post->payment_due_at && now()->greaterThan($post->payment_due_at)) {
            $post->update(['sponsored_status' => 'expired']);
            return back()->with('error', 'Payment window expired. Please contact support.');
        }

        $stripe = new StripeClient(config('services.stripe.secret'));

        try {
            // ── STEP 1: Ensure Stripe Customer is ready ────────
            $this->ensureStripeCustomer($stripe, $company);

            // ── STEP 2: Create Stripe Product + Price
            [$productId, $priceId] = $this->createBlogStripeProduct($stripe, $post, $company);

            // ── STEP 3: Create a NEW Subscription on Stripe (charges the default card)
            $subscription = $stripe->subscriptions->create([
                'customer' => $company->stripe_customer_id,
                'items' => [
                    ['price' => $priceId],
                ],
                'default_payment_method' => $company->stripe_payment_method_id,
                'expand' => ['latest_invoice.payment_intent'],
                'metadata' => [
                    'module'  => 'sponsored_blog',
                    'post_id' => (string) $post->id,
                ],
            ]);

            $intent = $subscription->latest_invoice->payment_intent ?? null;

            if ($subscription->status !== 'active') {
                return back()->with('error', 'Payment incomplete. Please check your card.');
            }

            CompanyLeadPlanSubscription::create([
                'company_id'             => $company->id,
                'lead_subscription_plan_id' => null, 
                'stripe_customer_id'     => $company->stripe_customer_id,
                'stripe_subscription_id' => $subscription->id,
                'interval'               => 'month',
                'status'                 => $subscription->status,
                'current_period_end'     => \Carbon\Carbon::createFromTimestamp($subscription->current_period_end),
            ]);

            $amountCents = $intent ? $intent->amount : (int) round($post->price * 100);
            $intentId    = $intent ? $intent->id : 'sub_first_invoice';
            
            $this->markPostPaid($post, $intentId, $amountCents, $productId);

            return redirect()
                ->route('company.sponsored-posts.index')
                ->with('success', 'Payment successful! Your Sponsored post has been published and is now live.');

        } catch (\Stripe\Exception\CardException $e) {
            return back()->with('error', 'Card declined: ' . $e->getMessage());
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return back()->with('error', 'Stripe error: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Sponsored post checkout failed', [
                'post_id'    => $post->id,
                'company_id' => $company->id,
                'error'      => $e->getMessage(),
            ]);
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Mark the post as paid and record billing history.
     */
    private function markPostPaid(
        Post   $post,
        string $stripeInvoiceId,
        int    $amountCents,
        string $productId      = ''
    ): void {
        $expiresAt = $post->expires_at && now()->lessThan($post->expires_at)
            ? $post->expires_at->copy()->addMonth()
            : now()->addMonth();

        $updateData = [
            'payment_status'   => 'paid',
            'sponsored_status' => 'published',
            'is_published'     => 1,
            'is_featured'      => 1,
            'paid_at'          => now(),
            'published_at'     => $post->published_at ?? now(),
            'expires_at'       => $expiresAt,
        ];

        if ($productId) $updateData['stripe_product_id'] = $productId;

        $post->update($updateData);

        LeadBillingHistory::create([
            'company_id'        => $post->company_id,
            'subscription_id'   => null,
            'invoice_no'        => 'INV-SP-' . strtoupper(uniqid()),
            'amount_cents'      => $amountCents,
            'status'            => 'paid',
            'payment_method'    => 'stripe',
            'stripe_invoice_id' => $stripeInvoiceId,
            'paid_at'           => now(),
        ]);

        // Refresh post 
        $post->refresh();
        $post->load('company');

        try {
            if ($post->company && $post->company->email) {
                retry(3, function () use ($post) {
                    Mail::to($post->company->email)
                        ->send(new SponsoredPostPaymentConfirmationMail($post, false));
                }, 2000);
            }
        } catch (\Exception $e) {
            Log::error('Company payment email failed: ' . $e->getMessage());
        }

        sleep(2);

        try {
            retry(3, function () use ($post) {
                Mail::to('contact@mymovingjourney.com')
                    ->send(new SponsoredPostPaymentConfirmationMail($post, true));
            }, 3000);
        } catch (\Exception $e) {
            Log::error('Admin payment email failed: ' . $e->getMessage());
        }
    }

    private function createBlogStripeProduct(StripeClient $stripe, Post $post, $company): array
    {
        // ── 1. Create Stripe Product ───────────────────────────────────
        $product = $stripe->products->create([
            'name'        => 'Sponsored Blog - ' . $post->title,
            'description' => 'Monthly sponsored blog post price - $' . number_format($post->price ?? 199, 2) . '/month',
            'metadata'    => [
                'module'     => 'sponsored_blog',
                'post_id'    => (string) $post->id,
                'company_id' => (string) $company->id,
                'app'        => config('app.name'),
            ],
        ]);

        $priceCents = (int) round(($post->price ?? 199) * 100);
        $currency   = $post->currency ?? config('services.stripe.currency', 'usd');

        $price = $stripe->prices->create([
            'product'     => $product->id,
            'unit_amount' => $priceCents,
            'currency'    => $currency,
            'recurring'   => ['interval' => 'month'],
            'metadata'    => [
                'module'  => 'sponsored_blog',
                'post_id' => (string) $post->id,
            ],
        ]);

        return [$product->id, $price->id];
    }


    private function ensureStripeCustomer(StripeClient $stripe, $company): void
    {
        try {
            $stripe->paymentMethods->attach(
                $company->stripe_payment_method_id,
                ['customer' => $company->stripe_customer_id]
            );
        } catch (\Throwable) {

        }

        $stripe->customers->update($company->stripe_customer_id, [
            'invoice_settings' => [
                'default_payment_method' => $company->stripe_payment_method_id,
            ],
        ]);
    }

    
    public function paymentSuccess(Request $request)
    {
        return redirect()
            ->route('company.sponsored-posts.index')
            ->with('success', 'Payment completed successfully.');
    }

    public function paymentCancel()
    {
        return redirect()
            ->route('company.sponsored-posts.index')
            ->with('error', 'Payment cancelled. You can pay again from your dashboard.');
    }

    private function checkCompanyPost(Post $post): void
    {
       $company = Auth::guard('company')->user();

        abort_if(!$company, 403);
        abort_if($post->company_id != $company->id, 403);
        abort_if($post->post_type !== 'sponsored', 404);
    }
}
