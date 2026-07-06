<?php

use App\Http\Controllers\Backend\CostEstimatorController;
use App\Http\Controllers\Company\Auth\CompanyAuthController;
use App\Http\Controllers\SignUpController;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/movers/{company:slug}', function ($slug) {
//     // Generate the new URL format
//     $newUrl = route('company.show', ['company' => $slug]);

//     // Redirect to the new URL format
//     return Redirect::to($newUrl, 301); // 301 for permanent redirection
// })->name('old.company.show');

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', [SignUpController::class, 'submit'])
    ->name('signup.submit');

Route::get(
    '/review/{company:slug}',
    'Company\Auth\CompanyAuthController@moverReview'
)->name('user.review.create');

Route::post(
    '/review/{company}',
    'Company\Auth\CompanyAuthController@moverReviewPost'
)->name('user.review.store');

Route::controller(App\Http\Controllers\CompareCompanyController::class)->group(function () {
    Route::get('/compare-movers', 'comparePage')->name('companies.comparePage');
    Route::get('/search', 'search')->name('companies.search');
    Route::get('/comp/fetch/{company}', 'fetchCompanyById')->name('companies.fetchById');
});

Route::get('/', 'Company\Auth\CompanyAuthController@companylisting')->name(
    'company.listing'
);
Route::get('/movers-list', 'Company\Auth\CompanyAuthController@moverList')->name('company.mover-list');


Route::get('/thank-you', function () {
    return view('frontend.company_auth.thankyou');
})->name('thankyou');
Auth::routes();
/**
 * Company routes
 */
Route::get('/sitemap', 'Company\Auth\CompanyAuthController@sitemap')->name('sitemap');
// Route::get('/company/login', 'Company\Auth\CompanyAuthController@index')->name(
//     'company.login'
// );
Route::post(
    '/company/post-login',
    'Company\Auth\CompanyAuthController@postLogin'
)->name('login.post');
Route::post(
    '/company/post-register',
    'Company\Auth\CompanyAuthController@postRegister'
)->name('register.post');
/* Company Email Verify Routes */
Route::get('/company/dashboard', 'Company\Auth\CompanyAuthController@dashboard')
    ->name('company.dashboard')
    ->middleware('auth:company', 'is_verify_email');
Route::get(
    'account/verify/{token}',
    'Company\Auth\CompanyAuthController@verifyAccount'
)->name('company.verify');

Route::get('user/verify/{token}', 'Company\Auth\CompanyAuthController@verifyUser')->name('user.verify');

Route::get('/user/{id}', 'Company\Auth\CompanyAuthController@deleteUser')->name('user.delete');

Route::get('/blogs/moving-checklist', 'Company\Auth\CompanyAuthController@checkList')->name('checkLists');
Route::post('/checklist/download', 'Company\Auth\CompanyAuthController@checkListDownloadPDF')->name('checklist.download');


Route::get(
    '/company/logout',
    'Company\Auth\CompanyAuthController@logout'
)->name('company.logout');
Route::get(
    '/company/register',
    'Company\Auth\CompanyAuthController@country'
)->name('company.register');
Route::post(
    'api/fetch-states',
    'Company\Auth\CompanyAuthController@fetchState'
);
Route::post(
    'api/fetch-cities',
    'Company\Auth\CompanyAuthController@fetchCity'
);
// Route::get(
//     '/company/search',
//     'Company\Auth\CompanyAuthController@search'
// )->name('company.search');


// Route::get(
//     '/company/top-movers',
//     'Company\Auth\CompanyAuthController@TopMovers'
// )->name('company.top-movers');
Route::get(
    '/mover/{company:slug}',
    'Company\Auth\CompanyAuthController@companyshow'
)->name('company.show');

//////////////////////////////// Company Claim ///////////////////////////////////
Route::get(
    '/claim-company/{company:slug}',
    'Company\Auth\CompanyAuthController@claimForm'
)->name('claim.form');
Route::post(
    '/claim-company/{company}',
    'Company\Auth\CompanyAuthController@claimFormPost'
)->name('claim.form.post');
Route::get(
    'company/claim/{token}',
    'Company\Auth\CompanyAuthController@companyClaimAccount'
)->name('company.claim.verify');
//////////////////////////////// Company Claim ///////////////////////////////////
Route::get(
    '/company/manage-profile/{company:slug}',
    'Company\Auth\CompanyAuthController@companyedit'
)->name('company.edit');
Route::post(
    '/company/update/{company}',
    'Company\Auth\CompanyAuthController@companyupdate'
)->name('company.update');

Route::get(
    '/company/product/{product}',
    'Company\Auth\CompanyAuthController@productShow'
)->name('company.products.show');

Route::post(
    '/company/orders',
    'Company\Auth\CompanyAuthController@orderStore'
)->name('company.orders.store');
Route::get(
    '/company/thank-you',
    'Company\Auth\CompanyAuthController@paymentThankYou'
)->name('company.thank_you');
Route::get(
    '/company/orders/list',
    'Company\Auth\CompanyAuthController@orderList'
)->name('company.orders.list');
Route::get(
    '/company/submit/{company}',
    'Company\Auth\CompanyAuthController@submit'
)->name('company.submit');

// Route::get(
//     '/company/state',
//     'Company\Auth\CompanyAuthController@stateshow'
// )->name('company.state');

Route::get('/resource/{resourcePage:slug}', 'Company\Auth\CompanyAuthController@resource_page')->name('resource_page');

Route::get('contact-mover/{company:slug}', 'Company\Auth\CompanyAuthController@contactMover')->name('contactMover');
Route::post('contact-mover/{company}/post', 'Company\Auth\CompanyAuthController@contactMoverPost')->name('contactMoverPost');
// Route::get(
//     '/state/{state_id}/{state:slug}',
//     'Company\Auth\CompanyAuthController@stateCompanyShow'
// )->name('company.company-show');

Route::get(
    '/movers-list/{stateSlug}',
    'Company\Auth\CompanyAuthController@stateShowCompany'
)->name('state.show');

// Route::get(
//     '/movers/{city_id}',
//     'Company\Auth\CompanyAuthController@cityCompanyShow'
// )->name('company.city-show');

Route::get(
    '/company/review/{company:slug}',
    'Company\Auth\CompanyAuthController@companyReview'
)->name('company.review');

Route::get(
    '/company/review-respond/{user}',
    'Company\Auth\CompanyAuthController@reviewRespond'
)->name('company.review-respond');

Route::post(
    '/company/review-respond/{user}',
    'Company\Auth\CompanyAuthController@reviewRespondpost'
)->name('company.review-respond.post');

Route::post(
    '/company/review/{review}/flag',
    'Company\Auth\CompanyAuthController@reviewFlagPost'
)->name('company.review.flag');

Route::get(
    'forget-password',
    'Company\Auth\ForgotPasswordController@showForgetPasswordForm'
)->name('forget.password.get');
Route::post(
    'forget-password',
    'Company\Auth\ForgotPasswordController@submitForgetPasswordForm'
)->name('forget.password.post');
Route::get(
    'reset-password/{token}',
    'Company\Auth\ForgotPasswordController@showResetPasswordForm'
)->name('reset.password.get');
Route::post(
    'reset-password',
    'Company\Auth\ForgotPasswordController@submitResetPasswordForm'
)->name('reset.password.post');

// Route::get('/company/get-quote', 'GetQuoteController@index')->name(
//     'company.get-quote'
// );
// Route::post('/company/get-quote/create', 'GetQuoteController@create')->name(
//     'company.get-quote.create'
// );
Route::get('/company/thankyou', 'Company\Auth\CompanyAuthController@quoteThankyou')->name('company.getquote-thankyou');

// Route::get('/movers', 'Company\Auth\CompanyAuthController@companySearch')->name('company.company-search');

Route::get('/post-search', 'Company\Auth\CompanyAuthController@postSearch')->name('company.post-search');

Route::get('/blogs', 'BlogController@index')->name('posts.index');

Route::get('/blogs/{post:slug}', 'BlogController@show')->name('posts.show');

Route::get('/tag/{tag:term_id}/{slug}', 'BlogController@tagShow')->name('tag.show');

Route::get('/category/{category:slug}', 'BlogController@catShow')->name('cat.show');


// Route::get('/comment', 'BlogController@commentShow')->name('comments');
// Route::post('/comment/post', 'BlogController@commentPost')->name('comments.post');

// Route::get('/blogs/{post_category:slug}', 'Company\Auth\CompanyAuthController@postCategory')->name('company.post-category');


// Route::get('/author','BlogController@author')->name('author.index');
Route::get('/author/{slug}', 'BlogController@authorShow')->name('author.show');

// Route::get('/author/{slug}', function ($slug) {
//     $user = \Corcel\Model\User::where('user_nicename', $slug)->first();
//     $posts = $user->posts()->published()->get();
//     // return $posts;
//     return view('frontend.company_auth.author-show', compact('user', 'posts'))->name('author.show');
// });


Route::get('/company/live-calls/{company:slug}', 'Company\Auth\CompanyAuthController@liveCall')->name('company.liveCall');
Route::get('/company/live-call-dispute/{liveCall}', 'Company\Auth\CompanyAuthController@liveCallDispute')->name('company.liveCall.dispute');
Route::post('/company/live-calls/store', 'Company\Auth\CompanyAuthController@liveCallDisputeStore')->name('company.liveCall.dispute.store');


Route::prefix('company')->name('company.')->group(function () {

    Route::get('/lead-plans',  [\App\Http\Controllers\Company\Auth\CompanyLeadPlanSubscriptionController::class, 'index'])->name('lead_plans.index');

    Route::post('/lead-plans/{plan}/subscribe', [\App\Http\Controllers\Company\Auth\CompanyLeadPlanSubscriptionController::class, 'subscribe'])->name('lead_plans.subscribe');

    Route::post('/lead-plans/{plan}/change', [\App\Http\Controllers\Company\Auth\CompanyLeadPlanSubscriptionController::class, 'changePlan'])->name('lead_plans.change');

    Route::post('/lead-plans/cancel', [\App\Http\Controllers\Company\Auth\CompanyLeadPlanSubscriptionController::class, 'cancel'])->name('lead_plans.cancel');
    Route::post('/lead-plans/renew', [\App\Http\Controllers\Company\Auth\CompanyLeadPlanSubscriptionController::class, 'renew'])->name('lead_plans.renew');
    Route::post('/lead-plans/schedule-renewal', [\App\Http\Controllers\Company\Auth\CompanyLeadPlanSubscriptionController::class, 'scheduleRenewal'])->name('lead_plans.schedule_renewal');

    Route::get('/lead-plans/success', [\App\Http\Controllers\Company\Auth\CompanyLeadPlanSubscriptionController::class, 'success'])->name('lead_plans.success');

    Route::get('/lead-plans/invoice/{id}/download', [\App\Http\Controllers\Company\Auth\CompanyLeadPlanSubscriptionController::class, 'downloadInvoice'])->name('lead_plans.invoice.download');
});




Route::get('/company/mover-leads/', 'Company\Auth\CompanyAuthController@moverLead')->name('company.mover_leads');
Route::get('/company/mover-leads/{company}/pause', 'Company\Auth\CompanyAuthController@leadPauseButton')->name('company.mover_leads.pause');
Route::get('/company/mover-leads/{company}/continue', 'Company\Auth\CompanyAuthController@leadContinueButton')->name('company.mover_leads.continue');


Route::delete('/company/mover-leads/{id}', 'Company\Auth\CompanyAuthController@contactListDelete')->name('mover.contact.delete');

Route::put('/company/mover-leads/{id}/update-flow',  'Company\Auth\CompanyAuthController@updateFlow')->name('company.leads.updateFlow');

Route::get('/company/mover-leads/{id}/read', 'Company\Auth\CompanyAuthController@markedAsRead')->name('mover.contact.read');

Route::put('company/mover-leads/{id}/status', 'Company\Auth\CompanyAuthController@contactMoverUpdateStatus')->name('mover-leads.updateStatus');

// Route::put('company/mover-leads/{id}/comment', 'updateComment')->name('mover-leads.comment');

Route::post('/company/mover-leads/{lead}/unlock-extra', 'Company\Auth\CompanyAuthController@leadUnlock')->name('company.leads.unlock-extra');

Route::get('/company/mover-quotations/export-pdf', 'Company\Auth\CompanyAuthController@exportPdf')->name('company.mover.quote.export-pdf');
Route::get('/company/mover-quotations/export-excel', 'Company\Auth\CompanyAuthController@exportExcel')->name('company.mover.quote.export-excel');



//packing calculator
Route::get('/packing-calculator', 'Company\Auth\CompanyAuthController@packingCalculator')->name('packing-calculator');




/**
 * Get Quote Routes
 */
Route::get('autocomplete', 'Company\Auth\CompanyAuthController@autocomplete')->name('autocomplete');
// Route::get('/quotation', 'Company\Auth\CompanyAuthController@Quotation')->name('company.quotation');
// Route::post('/quotation/post', 'Company\Auth\CompanyAuthController@QuotePost')->name('quotation.post');


Route::post('/subscription/post', 'Company\Auth\CompanyAuthController@SubscriptionPost')->name('subscription.post');


Route::get('/moving-cost-calculator', 'Company\Auth\CompanyAuthController@CostEstimator')->name('company.cost-estimator');
Route::post('/cost-estimator/post', 'Company\Auth\CompanyAuthController@CostEstimatorPost')->name('cost-estimator.post');
Route::post('/cost-estimator/post/result', 'Company\Auth\CompanyAuthController@CostEstimatorStoreResult')->name('cost-estimator.post.result');
Route::get('cost-estimator-thank-you', 'Company\Auth\CompanyAuthController@CostEstimatorThankyou')->name('cost-estimator.thankyou');

/**
 * Company Dispute Review Routes
 */
Route::get('/company/dispute/{user}', 'Company\Auth\CompanyAuthController@dispute')->name('company.dispute');
Route::post('/company/dispute/{user}', 'Company\Auth\CompanyAuthController@disputepost')->name('company.dispute.post');

/**
 * Company Cotact Us Routes
 */
Route::get('/company/contact-us/{company:slug}', 'Company\Auth\CompanyAuthController@contactUs')->name('company.contact-us');
Route::post('/company/contact-us/{company}', 'Company\Auth\CompanyAuthController@contactUspost')->name('company.contact-us.post');

/**
 * User Cotact Us Routes
 */
Route::get('/contact', 'Company\Auth\CompanyAuthController@usercontactUs')->name('company.user-contact-us');
Route::post('/contact', 'Company\Auth\CompanyAuthController@usercontactUspost')->name('company.user-contact-us.post');

Route::get('/movers', 'Company\Auth\CompanyAuthController@movers')->name('company.movers');

/**
 * write review
 */
Route::get('/company/write-review', 'Company\Auth\CompanyAuthController@writeReview')->name('company.write-review');

/**
 * moving tips
 */
// Route::get('/company/moving-tips', 'Company\Auth\CompanyAuthController@movingTip')->name('company.moving-tips');

/**
 * packing tips
 */
// Route::get('/company/packing-tips', 'Company\Auth\CompanyAuthController@packingTip')->name('company.packing-tips');


/**
 * check list
 */
// Route::get('/company/check-list', 'Company\Auth\CompanyAuthController@movingCheckList')->name('company.moving-checklist');

/**
 * moving guide
 */
// Route::get('/company/moving-guide', 'Company\Auth\CompanyAuthController@movingGuide')->name('company.moving-guide');

// /**
//  * move tips
//  */
// Route::get('/company/move-tips', 'Company\Auth\CompanyAuthController@moveTip')->name('company.move-tips');



// Route::get('/biz-lead', 'StaticPageController@bizLead')->name('biz-lead');


// Route::get('/biz/businesses-home', 'StaticPageController@businessesHome')->name('businesses-home');

// Route::get('/biz/FAQs', 'StaticPageController@Faqs')->name('faqs');


// Route::get('/biz/registered-movers', 'StaticPageController@registeredMover')->name('registered-movers');

// Route::get('/biz/brand-center', 'StaticPageController@brandCenter')->name('brand-center');


// Route::get('/biz/live-call-transfer', 'StaticPageController@liveCalltransfer')->name('live-call-transfer');


// Route::get('/biz/leads-help-document', 'StaticPageController@leadDocument')->name('leads-help-document');

// Route::get('/biz/ads', 'StaticPageController@Ads')->name('advertising');


// Route::get('/biz/ads/faqs', 'StaticPageController@AdsFaqs')->name('advertising-faqs');


// Route::get('/biz/ads/plans', 'StaticPageController@AdsPlans')->name('advertising-plans');


// Route::get('/biz/ads/listing-ads', 'StaticPageController@AdsListing')->name('listing-ads');


// Route::get('/biz/ads/profile-ads', 'StaticPageController@AdsProfile')->name('profile-ads');

// Route::get('/biz/contact-sales', 'StaticPageController@contactSale')->name('contact-sales');

// Route::get('/biz/affiliate', 'StaticPageController@affiliate')->name('affiliate');


// Route::get('/biz/wp-lead-form', 'StaticPageController@leadForm')->name('wp-lead-form');

// Route::get('/biz/blog/marketing-tips', 'StaticPageController@marketTips')->name('marketing-tips');


// Route::get('/biz/blog/moving-reviews-reputation-guide', 'StaticPageController@reputationGuide')->name('reputation-guide');


// Route::get('/biz/blog/review-filter', 'StaticPageController@reviewFilter')->name('review-filter');

// Route::get('/biz/blog/moving-leads-tips', 'StaticPageController@moveLeadtips')->name('moving-leads-tips');



Route::get('/company/payment-methods', [\App\Http\Controllers\CompanyPaymentMethodController::class, 'index'])->name('company.payment-methods.index');

Route::get('/company/payment-methods/create', [\App\Http\Controllers\CompanyPaymentMethodController::class, 'create'])->name('company.payment-methods.create');

Route::post('/company/payment-methods/default', [\App\Http\Controllers\CompanyPaymentMethodController::class, 'setDefault'])->name('company.payment-methods.default');

Route::delete('/company/payment-methods/{id}', [\App\Http\Controllers\CompanyPaymentMethodController::class, 'destroy'])->name('company.payment-methods.destroy');

Route::get('/company/payment-methods/setup-intent', [\App\Http\Controllers\CompanyPaymentMethodController::class, 'createSetupIntent'])->name('company.payment-methods.setupIntent');

Route::post('/company/payment-methods/store-card', [\App\Http\Controllers\CompanyPaymentMethodController::class, 'storeCard'])->name('company.payment-methods.store');


Route::prefix('company')->name('company.')->group(function () {
    Route::get('/sponsored-posts', 'Company\Auth\SponsoredPostController@index')->name('sponsored-posts.index');

    Route::get('/sponsored-posts/create', 'Company\Auth\SponsoredPostController@create')->name('sponsored-posts.create');

    Route::post('/sponsored-posts', 'Company\Auth\SponsoredPostController@store')->name('sponsored-posts.store');

    Route::get('/sponsored-posts/{post}/edit', 'Company\Auth\SponsoredPostController@edit')->name('sponsored-posts.edit');

    Route::put('/sponsored-posts/{post}', 'Company\Auth\SponsoredPostController@update')->name('sponsored-posts.update');

    Route::get('/sponsored-posts/{post}/submitted', 'Company\Auth\SponsoredPostController@submitted')->name('sponsored-posts.submitted');

    Route::post('/sponsored-posts/{post}/checkout', 'Company\Auth\SponsoredPostController@checkout')->name('sponsored-posts.checkout');

    Route::get('/sponsored-posts/payment/success', 'Company\Auth\SponsoredPostController@paymentSuccess')->name('sponsored-posts.payment.success');

    Route::get('/sponsored-posts/payment/cancel', 'Company\Auth\SponsoredPostController@paymentCancel')->name('sponsored-posts.payment.cancel');
});

Route::prefix('company')->group(function () {
    Route::name('company.')->group(function () {
        Route::get('/state-featured-ads', 'Company\Auth\StateFeaturedAdController@index')->name('state-featured-ads.index');
        Route::post('/state-featured-ads/checkout', 'Company\Auth\StateFeaturedAdController@checkout')->name('state-featured-ads.checkout');
        Route::get('/state-featured-ads/success', 'Company\Auth\StateFeaturedAdController@success')->name('state-featured-ads.success');
        Route::post('/state-featured-ads/{subscription}/cancel', 'Company\Auth\StateFeaturedAdController@cancelSubscription')->name('state-featured-ads.cancel-subscription');

        Route::get('/state-featured-invoices', 'Company\Auth\StateFeaturedInvoiceController@index')->name('state-featured-invoices.index');
        Route::get('/state-featured-invoices/{invoice}', 'Company\Auth\StateFeaturedInvoiceController@show')->name('state-featured-invoices.show');
    });


    Route::name('company.')->group(function () {
        Route::get('/city-featured-ads', 'Company\Auth\CityFeaturedAdController@index')->name('city-featured-ads.index');
        Route::post('/city-featured-ads/checkout', 'Company\Auth\CityFeaturedAdController@checkout')->name('city-featured-ads.checkout');
        Route::post('/city-featured-ads/{subscription}/cancel', 'Company\Auth\CityFeaturedAdController@cancelSubscription')->name('city-featured-ads.cancel');

        Route::get('/city-featured-invoices', 'Company\Auth\CityFeaturedInvoiceController@index')->name('city-featured-invoices.index');
        Route::get('/city-featured-invoices/{invoice}', 'Company\Auth\CityFeaturedInvoiceController@show')->name('city-featured-invoices.show');
    });

    Route::name('company.')->group(function () {
        Route::get('/route-featured-ads', 'Company\Auth\StateRouteFeaturedAdController@index')->name('route-featured-ads.index');
        Route::post('/route-featured-ads/checkout', 'Company\Auth\StateRouteFeaturedAdController@checkout')->name('route-featured-ads.checkout');
        Route::post('/route-featured-ads/{subscription}/cancel', 'Company\Auth\StateRouteFeaturedAdController@cancelSubscription')->name('route-featured-ads.cancel');

        Route::get('/route-featured-invoices', 'Company\Auth\StateRouteFeaturedInvoiceController@index')->name('route-featured-invoices.index');
        Route::get('/route-featured-invoices/{invoice}', 'Company\Auth\StateRouteFeaturedInvoiceController@show')->name('route-featured-invoices.show');
    });

    Route::name('company.')->group(function () {
        Route::get('/resource-featured-ads', 'Company\Auth\ResourceFeaturedAdController@index')->name('resource-featured-ads.index');
        Route::post('/resource-featured-ads/checkout', 'Company\Auth\ResourceFeaturedAdController@checkout')->name('resource-featured-ads.checkout');
        Route::post('/resource-featured-ads/{subscription}/cancel', 'Company\Auth\ResourceFeaturedAdController@cancelSubscription')->name('resource-featured-ads.cancel');

        Route::get('/resource-featured-invoices', 'Company\Auth\ResourceFeaturedInvoiceController@index')->name('resource-featured-invoices.index');
        Route::get('/resource-featured-invoices/{invoice}', 'Company\Auth\ResourceFeaturedInvoiceController@show')->name('resource-featured-invoices.show');
    });
});




Route::get('/privacy-policy', 'StaticPageController@privacyPolicy')->name('privacy-policy');

/**
 * contact-us
 */
// Route::get('/help/contact-us', 'StaticPageController@Contact')->name('contact-us');

/**
 * terms of service
 */
Route::get('/terms-of-service', 'StaticPageController@termService')->name('terms-of-service');

/**
 * help&support
 */
// Route::get('/support', 'StaticPageController@helpSupport')->name('help-support');

/**
 * about us
 */
Route::get('/about', 'StaticPageController@aboutUs')->name('about-us');

/**
 * content guidelines
 */
// Route::get('/support/content-guidelines', 'StaticPageController@contentGuideline')->name('content-guidelines');

/**
 * support faqs
 */
// Route::get('/support/faq', 'StaticPageController@supportFaqs')->name('support-faqs');

/**
 * Top Movers
 */
// Route::get('/top-movers', 'StaticPageController@topMovers')->name('top-movers');

/**
 * Top Movers one
 */
// Route::get('/top-movers/allied-transportation-group', 'StaticPageController@topMoverOne')->name('top-mover-one');

/**
 * Top Movers two
 */
// Route::get('/top-movers/cross-country-moving-llc', 'StaticPageController@topMoverTwo')->name('top-mover-two');

/**
 * Top Movers three
 */
// Route::get('/top-movers/pen-transit-van-lines', 'StaticPageController@topMoverThree')->name('top-mover-three');

/**
 * Routes Controller
 */
Route::controller(App\Http\Controllers\RouteController::class)->group(function () {
    // Routes Hub Page
    Route::get('/moving-routes', 'routePage')->name('route.page');
    // State Routes Hub Page
    Route::get('/moving-routes/{abv}', 'stateRouteListPage')->name('stateRouteList.page')->where('abv', '[A-Za-z]{2}');
    // City to another state City Route, City to State Route, State to City Route Show Page
    Route::get('/moving-routes/{fromStateAbv}/{toStateAbv}/{fromSlug}-to-{toSlug}', 'handleMovingRoute')->where([
        'fromStateAbv' => '[A-Za-z]{2}',
        'toStateAbv' => '[A-Za-z]{2}',
        'fromSlug' => '[a-z0-9\-]+',
        'toSlug' => '[a-z0-9\-]+',
    ])->name('route.dynamic');
    // State to State Route Page
    Route::get('/moving-routes/{fromStateAbv}/{toStateAbv}', 'stateToStateRoutePage')->where([
        'fromStateAbv' => '[A-Za-z]{2}',
        'toStateAbv'   => '[A-Za-z]{2}',
    ])->name('route.state-to-state.show');
    Route::get('/moving-routes/{stateAbv}/{cityFromSlug}-to-{cityToSlug}', 'handleCityToCityRoute')->where([
        'stateAbv'     => '[A-Za-z]{2}',
        'cityFromSlug' => '[a-z0-9\-]+',
        'cityToSlug'   => '[a-z0-9\-]+',
    ])->name('route.city-to-city.show');
    // City Routes Hub Page
    Route::get('/moving-routes/{fromStateAbv}/{fromCitySlug}', 'cityRouteListPage')->where([
        'fromStateAbv' => '[A-Za-z]{2}',
        'fromCitySlug' => '[a-z0-9\-]+',
    ])->name('cityRouteList.page');
    // City to Same State City Route Page
    Route::get('/moving-routes/{movingRoute:slug}', 'MovingRouteShow')->name('moving.route.show');
});
// Route::get('/thumbnail.png', [App\Http\Controllers\ThumbnailController::class, 'movingFromTo'])
//     ->name('thumbnail.moving-from-to.png');

Route::get('/advertisement', 'AdvertiseController@advertiseFormPage')->name('advertisement.page');
Route::post('/advertisement/store', 'AdvertiseController@store')->name('advertisement.store');

Route::get('/advertising', 'AdvertiseController@advertisingPage');


// Route::get('/test', 'Company\Auth\CompanyAuthController@testPage');


Route::get('/move-cost', 'Company\Auth\CompanyAuthController@moveCostPage')->name('moveCostPage');

Route::get('/move-cost/{stateCostPage:slug}', 'Company\Auth\CompanyAuthController@moveCostShowPage')->name('moveCostShowPage');

Route::get('/movers/{bestStatePage:slug}', 'Company\Auth\CompanyAuthController@bestStateShowPage')->name('best_state_show');

/**
 * User Review Steps Routes
 */
Route::get(
    '/review/step-one/{company:slug}',
    'Company\Auth\CompanyAuthController@createStepOne'
)->name('user.register.create-step-one');
Route::post(
    '/review/step-one/{company}',
    'Company\Auth\CompanyAuthController@postCreateStepOne'
)->name('user.post-create-step-one');

Route::get(
    '/review/step-two/{company:slug}',
    'Company\Auth\CompanyAuthController@createStepTwo'
)->name('user.register.create-step-two');
Route::post(
    '/review/step-two/{company}',
    'Company\Auth\CompanyAuthController@postCreateStepTwo'
)->name('user.post-create-step-two');

Route::get(
    '/review/step-three/{company:slug}',
    'Company\Auth\CompanyAuthController@createStepThree'
)->name('user.register.create-step-three');
Route::post(
    '/review/step-three/{company}',
    'Company\Auth\CompanyAuthController@postCreateStepThree'
)->name('user.post-create-step-three');


Route::get('/local-movers', 'Company\Auth\CompanyAuthController@localMover')->name('localMover');

Route::get('/long-distance-movers', 'Company\Auth\CompanyAuthController@longDisMover')->name('longDisMover');

Route::get('/small-moving', 'Company\Auth\CompanyAuthController@smallMove')->name('smallMove');

Route::get('/residential-moving', 'Company\Auth\CompanyAuthController@residentialMove')->name('residentialMove');

Route::get('/commercial-moving', 'Company\Auth\CompanyAuthController@commercialMove')->name('commercialMove');

Route::get('/packing-and-storage', 'Company\Auth\CompanyAuthController@packingAndStorage')->name('packingAndStorage');

Route::get('/certified-mover', 'Company\Auth\CompanyAuthController@certificationPage')->name('certification.page');


Route::get('/cities', 'Company\Auth\CompanyAuthController@cityPage')->name('city.page');
Route::get('/movers/{stateSlug}/{citySlug}', 'Company\Auth\CompanyAuthController@cityShowPage')->name('city.show.page');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {


    Route::name('admin.')->group(function () {
        Route::get('/sponsored-posts', 'Backend\SponsoredPostController@index')->name('sponsored-posts.index');

        Route::get('/sponsored-posts/{post}', 'Backend\SponsoredPostController@show')->name('sponsored-posts.show');

        Route::post('/sponsored-posts/{post}/approve', 'Backend\SponsoredPostController@approve')->name('sponsored-posts.approve');

        Route::post('/sponsored-posts/{post}/reject', 'Backend\SponsoredPostController@reject')->name('sponsored-posts.reject');

        Route::post('/sponsored-posts/{post}/revision', 'Backend\SponsoredPostController@revision')->name('sponsored-posts.revision');

        Route::post('/sponsored-posts/{post}/renew', 'Backend\SponsoredPostController@renew')->name('sponsored-posts.renew');
    });

    Route::name('admin.')->group(function () {
        Route::get('/state-featured-slots', 'Backend\StateFeaturedSlotController@index')->name('state-featured-slots.index');
        Route::post('/state-featured-slots/update-many', 'Backend\StateFeaturedSlotController@updateMany')->name('state-featured-slots.updateMany');

        Route::get('/state-featured-invoices', 'Backend\StateFeaturedInvoiceController@index')->name('state-featured-invoices.index');
        Route::get('/state-featured-invoices/{invoice}', 'Backend\StateFeaturedInvoiceController@show')->name('state-featured-invoices.show');
    });

    Route::name('admin.')->group(function () {
        Route::get('/city-featured-slots', 'Backend\CityFeaturedSlotController@index')->name('city-featured-slots.index');
        Route::post('/city-featured-slots/update-many', 'Backend\CityFeaturedSlotController@updateMany')->name('city-featured-slots.updateMany');

        Route::get('/city-featured-invoices', 'Backend\CityFeaturedInvoiceController@index')->name('city-featured-invoices.index');
        Route::get('/city-featured-invoices/{invoice}', 'Backend\CityFeaturedInvoiceController@show')->name('city-featured-invoices.show');
    });

    Route::name('admin.')->group(function () {
        Route::get('/route-featured-slots', 'Backend\StateRouteFeaturedSlotController@index')->name('route-featured-slots.index');
        Route::post('/route-featured-slots/update-many', 'Backend\StateRouteFeaturedSlotController@updateMany')->name('route-featured-slots.updateMany');

        Route::get('/route-featured-invoices', 'Backend\StateRouteFeaturedInvoiceController@index')->name('route-featured-invoices.index');
        Route::get('/route-featured-invoices/{invoice}', 'Backend\StateRouteFeaturedInvoiceController@show')->name('route-featured-invoices.show');
    });

    Route::name('admin.')->group(function () {
        Route::get('/resource-featured-slots', 'Backend\ResourceFeaturedSlotController@index')->name('resource-featured-slots.index');
        Route::post('/resource-featured-slots/update-many', 'Backend\ResourceFeaturedSlotController@updateMany')->name('resource-featured-slots.updateMany');

        Route::get('/resource-featured-invoices', 'Backend\ResourceFeaturedInvoiceController@index')->name('resource-featured-invoices.index');
        Route::get('/resource-featured-invoices/{invoice}', 'Backend\ResourceFeaturedInvoiceController@show')->name('resource-featured-invoices.show');
    });


    Route::get('/', 'Backend\DashboardController@index')->name(
        'admin.dashboard'
    );
    Route::get('/chart', 'Backend\DashboardController@index')->name('chart.show');

    Route::get('city-pages/trashed', 'Backend\CityPageController@trashed')->name('admin.citypages.trashed');
    Route::post('city-pages/restore/{id}', 'Backend\CityPageController@restore')->name('admin.citypages.restore');
    Route::delete('city-pages/force-delete/{id}', 'Backend\CityPageController@forceDelete')->name('admin.citypages.forceDelete');
    Route::resource('city-pages', 'Backend\CityPageController', [
        'names' => 'admin.citypages',
    ]);

    Route::get('city-cost-of-livings', 'Backend\CityCostOfLivingController@index')->name('admin.cityCostOfLiving.index');
    Route::get('city-cost-of-livings/create', 'Backend\CityCostOfLivingController@create')->name('admin.cityCostOfLiving.create');
    Route::post('city-cost-of-livings/store', 'Backend\CityCostOfLivingController@store')->name('admin.cityCostOfLiving.store');
    Route::get('city-cost-of-livings/{cityCostOfLiving}/edit', 'Backend\CityCostOfLivingController@edit')->name('admin.cityCostOfLiving.edit');
    Route::put('city-cost-of-livings/{cityCostOfLiving}/', 'Backend\CityCostOfLivingController@update')->name('admin.cityCostOfLiving.update');
    Route::delete('city-cost-of-livings/{id}/delete', 'Backend\CityCostOfLivingController@destroy')->name('admin.cityCostOfLiving.destroy');

    Route::get('city-route-cost', 'Backend\CityRouteCostController@index')->name('admin.city-route-cost.index');
    Route::get('city-route-cost/create', 'Backend\CityRouteCostController@create')->name('admin.city-route-cost.create');
    Route::post('city-route-cost/store', 'Backend\CityRouteCostController@store')->name('admin.city-route-cost.store');
    Route::get('city-route-cost/{cityRouteCost}/edit', 'Backend\CityRouteCostController@edit')->name('admin.city-route-cost.edit');
    Route::put('city-route-cost/{cityRouteCost}/update', 'Backend\CityRouteCostController@update')->name('admin.city-route-cost.update');
    Route::delete('city-route-cost/{id}/delete', 'Backend\CityRouteCostController@destroy')->name('admin.city-route-cost.destroy');
    // City Average Cost Routes
    Route::get('city-avg-cost', 'Backend\CityAvgCostController@index')->name('admin.city-avg-cost.index');
    Route::get('city-avg-cost/create', 'Backend\CityAvgCostController@create')->name('admin.city-avg-cost.create');
    Route::post('city-avg-cost/store', 'Backend\CityAvgCostController@store')->name('admin.city-avg-cost.store');
    Route::get('city-avg-cost/{cityAvgCost}/edit', 'Backend\CityAvgCostController@edit')->name('admin.city-avg-cost.edit');
    Route::put('city-avg-cost/{cityAvgCost}/update', 'Backend\CityAvgCostController@update')->name('admin.city-avg-cost.update');
    Route::delete('city-avg-cost/{id}/delete', 'Backend\CityAvgCostController@destroy')->name('admin.city-avg-cost.destroy');


    Route::get('city-life-styles', 'Backend\CityLifeStyleController@index')->name('admin.cityLifeStyle.index');
    Route::get('city-life-styles/create', 'Backend\CityLifeStyleController@create')->name('admin.cityLifeStyle.create');
    Route::post('city-life-styles/store', 'Backend\CityLifeStyleController@store')->name('admin.cityLifeStyle.store');
    Route::get('city-life-styles/{cityLifeStyle}/edit', 'Backend\CityLifeStyleController@edit')->name('admin.cityLifeStyle.edit');
    Route::put('city-life-styles/{cityLifeStyle}/', 'Backend\CityLifeStyleController@update')->name('admin.cityLifeStyle.update');
    Route::delete('city-life-styles/{id}/delete', 'Backend\CityLifeStyleController@destroy')->name('admin.cityLifeStyle.destroy');

    Route::resource('roles', 'Backend\RolesController', [
        'names' => 'admin.roles',
    ]);

    Route::resource('users', 'Backend\UsersController', [
        'names' => 'admin.users',
    ]);

    Route::get('/admin/user/{id}/delete', 'Backend\UsersController@destroy')->name('admin.users.destroy');
    Route::delete('usersDeleteAll', 'Backend\UsersController@deleteAll')->name('admin.users.deleteall');
    Route::delete('/admin/reviews/bulk-delete',  'Backend\UsersController@bulkDestroy')->name('admin.users.bulkDestroy');
    Route::get('users/soft/delete', 'Backend\UsersController@reviewSoftDeletePage')->name('admin.users.reviewSoftDeletePage');
    Route::get('users/soft/delete/{id}', 'Backend\UsersController@reviewRestoreSoftDeleted')->name('admin.users.reviewRestoreSoftDeleted');
    Route::get('users/soft/delete/{id}/force', 'Backend\UsersController@reviewSoftDelete')->name('admin.users.reviewSoftDelete');

    Route::get('disputes', 'Backend\UsersController@allDisputes')->name('admin.alldisputes');
    Route::get('disputes/{id}/edit', 'Backend\UsersController@editdispute')->name('admin.dispute.edit');
    Route::put('disputes/{id}/update', 'Backend\UsersController@updatedispute')->name('admin.dispute.update');
    Route::delete('disputes/bulkdestroy', 'Backend\UsersController@bulkDestroyDisputes')->name('admin.disputes.bulkDestroy');
    Route::delete('disputes/deletealldisputes', 'Backend\UsersController@deleteAllDisputes')->name('admin.disputes.deleteAllDisputes');
    Route::get('dispute/{id}/delete', 'Backend\UsersController@destroyDispute')->name('admin.dispute.destroy');

    Route::get('checklist-categories', 'Backend\ChecklistCategoryController@index')->name('admin.checklist.categories.index');
    Route::get('checklist-categories/create', 'Backend\ChecklistCategoryController@create')->name('admin.checklist.categories.create');
    Route::post('checklist-categories/store', 'Backend\ChecklistCategoryController@store')->name('admin.checklist.categories.store');
    Route::get('checklist-categories/{checklistCategory}/edit', 'Backend\ChecklistCategoryController@edit')->name('admin.checklist.categories.edit');
    Route::put('checklist-categories/{checklistCategory}/update', 'Backend\ChecklistCategoryController@update')->name('admin.checklist.categories.update');
    Route::get('checklist-categories/{id}/delete', 'Backend\ChecklistCategoryController@destroy')->name('admin.checklist.categories.delete');
    Route::delete('checklist-categories/delete-selected', 'Backend\ChecklistCategoryController@deleteSelected')->name('admin.checklist.categories.deleteSelected');


    Route::get('checklists', 'Backend\ChecklistController@index')->name('admin.checklists.index');
    Route::get('checklists/create', 'Backend\ChecklistController@create')->name('admin.checklists.create');
    Route::post('checklists/store', 'Backend\ChecklistController@store')->name('admin.checklists.store');
    Route::get('checklists/{checklist}/edit', 'Backend\ChecklistController@edit')->name('admin.checklists.edit');
    Route::put('checklists/{checklist}/update', 'Backend\ChecklistController@update')->name('admin.checklists.update');
    Route::get('checklists/{id}/delete', 'Backend\ChecklistController@destroy')->name('admin.checklists.delete');
    Route::delete('checklists/delete-selected', 'Backend\ChecklistController@deleteSelected')->name('admin.checklists.deleteSelected');


    // city living expense 
    Route::get('city-living-expense', 'Backend\CityLivingExpenseController@index')->name('admin.city-living-expense.index');
    Route::get('city-living-expense/create', 'Backend\CityLivingExpenseController@create')->name('admin.city-living-expense.create');
    Route::post('city-living-expense/store', 'Backend\CityLivingExpenseController@store')->name('admin.city-living-expense.store');
    Route::get('city-living-expense/{city_living_expenses}/edit', 'Backend\CityLivingExpenseController@edit')->name('admin.city-living-expense.edit');
    Route::put('city-living-expense/{city_living_expenses}/update', 'Backend\CityLivingExpenseController@update')->name('admin.city-living-expense.update');
    Route::get('city-living-expense/{id}/delete', 'Backend\CityLivingExpenseController@destroy')->name('admin.city-living-expense.delete');

    Route::get('state-cost-pages', 'Backend\StateCostPageController@index')->name('admin.state-cost-pages.index');
    Route::get('state-cost-pages/create', 'Backend\StateCostPageController@create')->name('admin.state-cost-pages.create');
    Route::post('state-cost-pages/store', 'Backend\StateCostPageController@store')->name('admin.state-cost-pages.store');
    Route::get('state-cost-pages/{stateCostPage}/edit', 'Backend\StateCostPageController@edit')->name('admin.state-cost-pages.edit');
    Route::put('state-cost-pages/{stateCostPage}/update', 'Backend\StateCostPageController@update')->name('admin.state-cost-pages.update');
    Route::get('state-cost-pages/{id}/delete', 'Backend\StateCostPageController@destroy')->name('admin.state-cost-pages.delete');

    Route::get('state-cost-top-mover', 'Backend\StateCostTopMoverController@index')->name('admin.state-cost.top-mover.index');
    Route::get('state-cost-top-mover/create', 'Backend\StateCostTopMoverController@create')->name('admin.state-cost.top-mover.create');
    Route::post('state-cost-top-mover/store', 'Backend\StateCostTopMoverController@store')->name('admin.state-cost.top-mover.store');
    Route::get('state-cost-top-mover/{stateCostTopMover}/edit', 'Backend\StateCostTopMoverController@edit')->name('admin.state-cost.top-mover.edit');
    Route::put('state-cost-top-mover/{stateCostTopMover}/update', 'Backend\StateCostTopMoverController@update')->name('admin.state-cost.top-mover.update');
    Route::get('state-cost-top-mover/{id}/delete', 'Backend\StateCostTopMoverController@destroy')->name('admin.state-cost.top-mover.destroy');

    Route::get('state-cost-page-faqs', 'Backend\StateCostPageFaqController@index')->name('admin.state-cost-page-faqs.index');
    Route::get('state-cost-page-faqs/create', 'Backend\StateCostPageFaqController@create')->name('admin.state-cost-page-faqs.create');
    Route::post('state-cost-page-faqs/store', 'Backend\StateCostPageFaqController@store')->name('admin.state-cost-page-faqs.store');
    Route::get('state-cost-page-faqs/{faq}/edit', 'Backend\StateCostPageFaqController@edit')->name('admin.state-cost-page-faqs.edit');
    Route::put('state-cost-page-faqs/{faq}/update', 'Backend\StateCostPageFaqController@update')->name('admin.state-cost-page-faqs.update');
    Route::delete('state-cost-page-faqs/{id}/delete', 'Backend\StateCostPageFaqController@destroy')->name('admin.state-cost-page-faqs.destroy');

    Route::get('state-life-style', 'Backend\StateLifeStyleController@index')->name('admin.state-life-style.index');
    Route::get('state-life-style/create', 'Backend\StateLifeStyleController@create')->name('admin.state-life-style.create');
    Route::post('state-life-style/store', 'Backend\StateLifeStyleController@store')->name('admin.state-life-style.store');
    Route::get('state-life-style/{stateLifeStyle}/edit', 'Backend\StateLifeStyleController@edit')->name('admin.state-life-style.edit');
    Route::put('state-life-style/{stateLifeStyle}/update', 'Backend\StateLifeStyleController@update')->name('admin.state-life-style.update');
    Route::get('state-life-style/{id}/delete', 'Backend\StateLifeStyleController@destroy')->name('admin.state-life-style.destroy');

    Route::get('state-cost-of-livings', 'Backend\StateCostOfLivingController@index')->name('admin.stateCostOfLiving.index');
    Route::get('state-cost-of-livings/create', 'Backend\StateCostOfLivingController@create')->name('admin.stateCostOfLiving.create');
    Route::post('state-cost-of-livings/store', 'Backend\StateCostOfLivingController@store')->name('admin.stateCostOfLiving.store');
    Route::get('state-cost-of-livings/{stateCostOfLiving}/edit', 'Backend\StateCostOfLivingController@edit')->name('admin.stateCostOfLiving.edit');
    Route::put('state-cost-of-livings/{stateCostOfLiving}/update', 'Backend\StateCostOfLivingController@update')->name('admin.stateCostOfLiving.update');
    Route::delete('state-cost-of-livings/{id}/delete', 'Backend\StateCostOfLivingController@destroy')->name('admin.stateCostOfLiving.destroy');

    Route::get('state-pro-cons', 'Backend\StateProConController@index')->name('admin.state-pro-cons.index');
    Route::get('state-pro-cons/create', 'Backend\StateProConController@create')->name('admin.state-pro-cons.create');
    Route::post('state-pro-cons/store', 'Backend\StateProConController@store')->name('admin.state-pro-cons.store');
    Route::get('state-pro-cons/{stateProCon}/edit', 'Backend\StateProConController@edit')->name('admin.state-pro-cons.edit');
    Route::put('state-pro-cons/{stateProCon}/update', 'Backend\StateProConController@update')->name('admin.state-pro-cons.update');
    Route::get('state-pro-cons/{id}/delete', 'Backend\StateProConController@destroy')->name('admin.state-pro-cons.delete');

    Route::get('best-state-pages', 'Backend\BestStatePageController@index')->name('admin.best-state-pages.index');
    Route::get('best-state-pages/create', 'Backend\BestStatePageController@create')->name('admin.best-state-pages.create');
    Route::post('best-state-pages/store', 'Backend\BestStatePageController@store')->name('admin.best-state-pages.store');
    Route::get('best-state-pages/{bestStatePage}/edit', 'Backend\BestStatePageController@edit')->name('admin.best-state-pages.edit');
    Route::put('best-state-pages/{bestStatePage}/update', 'Backend\BestStatePageController@update')->name('admin.best-state-pages.update');
    Route::get('best-state-pages/{id}/delete', 'Backend\BestStatePageController@destroy')->name('admin.best-state-pages.delete');

    Route::get('best-state-top-mover', 'Backend\BestStateTopMoverController@index')->name('admin.best-state.top-mover.index');
    Route::get('best-state-top-mover/create', 'Backend\BestStateTopMoverController@create')->name('admin.best-state.top-mover.create');
    Route::post('best-state-top-mover/store', 'Backend\BestStateTopMoverController@store')->name('admin.best-state.top-mover.store');
    Route::get('best-state-top-mover/{bestStateTopMover}/edit', 'Backend\BestStateTopMoverController@edit')->name('admin.best-state.top-mover.edit');
    Route::put('best-state-top-mover/{bestStateTopMover}/update', 'Backend\BestStateTopMoverController@update')->name('admin.best-state.top-mover.update');
    Route::get('best-state-top-mover/{id}/delete', 'Backend\BestStateTopMoverController@destroy')->name('admin.best-state.top-mover.destroy');

    Route::get('best-state-page-faqs', 'Backend\BestStatePageFaqController@index')->name('admin.best-state-page-faqs.index');
    Route::get('best-state-page-faqs/create', 'Backend\BestStatePageFaqController@create')->name('admin.best-state-page-faqs.create');
    Route::post('best-state-page-faqs/store', 'Backend\BestStatePageFaqController@store')->name('admin.best-state-page-faqs.store');
    Route::get('best-state-page-faqs/{faq}/edit', 'Backend\BestStatePageFaqController@edit')->name('admin.best-state-page-faqs.edit');
    Route::put('best-state-page-faqs/{faq}/update', 'Backend\BestStatePageFaqController@update')->name('admin.best-state-page-faqs.update');
    Route::delete('best-state-page-faqs/{id}/delete', 'Backend\BestStatePageFaqController@destroy')->name('admin.best-state-page-faqs.destroy');

    // City to city routes
    Route::get('city-to-city-routes', 'Backend\CityToCityRouteController@index')->name('admin.city-to-city-routes.index');
    Route::get('city-to-city-routes/create', 'Backend\CityToCityRouteController@create')->name('admin.city-to-city-routes.create');
    Route::post('city-to-city-routes/store', 'Backend\CityToCityRouteController@store')->name('admin.city-to-city-routes.store');
    Route::get('city-to-city-routes/trashed', 'Backend\CityToCityRouteController@trashed')->name('admin.city-to-city-routes.trashed');
    Route::post('city-to-city-routes/{id}/restore', 'Backend\CityToCityRouteController@restore')->name('admin.city-to-city-routes.restore');
    Route::delete('city-to-city-routes/{id}/force-delete', 'Backend\CityToCityRouteController@forceDelete')->name('admin.city-to-city-routes.forceDelete');
    Route::get('city-to-city-routes/{cityToCityRoute}/edit', 'Backend\CityToCityRouteController@edit')->name('admin.city-to-city-routes.edit');
    Route::put('city-to-city-routes/{cityToCityRoute}/update', 'Backend\CityToCityRouteController@update')->name('admin.city-to-city-routes.update');
    Route::delete('city-to-city-routes/{id}/delete', 'Backend\CityToCityRouteController@destroy')->name('admin.city-to-city-routes.destroy');
    Route::post('city-to-city-routes/import', 'Backend\CityToCityRouteController@import')->name('admin.city-to-city-routes.import')->middleware('auth:admin');

    // City to city move size costs
    Route::get('city-to-city-move-size-costs', 'Backend\CityToCityRouteController@moveSizeCostIndex')->name('admin.city-to-city-routes.move-size-cost.index');
    Route::get('city-to-city-move-size-costs/create', 'Backend\CityToCityRouteController@moveSizeCostCreate')->name('admin.city-to-city-routes.move-size-cost.create');
    Route::post('city-to-city-move-size-costs/store', 'Backend\CityToCityRouteController@moveSizeCostStore')->name('admin.city-to-city-routes.move-size-cost.store');
    Route::get('city-to-city-move-size-costs/{moveSizeCost}/edit', 'Backend\CityToCityRouteController@moveSizeCostEdit')->name('admin.city-to-city-routes.move-size-cost.edit');
    Route::put('city-to-city-move-size-costs/{moveSizeCost}/update', 'Backend\CityToCityRouteController@moveSizeCostUpdate')->name('admin.city-to-city-routes.move-size-cost.update');
    Route::delete('city-to-city-move-size-costs/{id}/delete', 'Backend\CityToCityRouteController@moveSizeCostDestroy')->name('admin.city-to-city-routes.move-size-cost.destroy');

    // State to state routes
    Route::get('state-to-state-routes', 'Backend\StateToStateRouteController@index')->name('admin.state-to-state-routes.index');
    Route::get('state-to-state-routes/create', 'Backend\StateToStateRouteController@create')->name('admin.state-to-state-routes.create');
    Route::post('state-to-state-routes/store', 'Backend\StateToStateRouteController@store')->name('admin.state-to-state-routes.store');
    Route::get('state-to-state-routes/trashed', 'Backend\StateToStateRouteController@trashed')->name('admin.state-to-state-routes.trashed');
    Route::post('state-to-state-routes/restore/{id}', 'Backend\StateToStateRouteController@restore')->name('admin.state-to-state-routes.restore');
    Route::delete('state-to-state-routes/force-delete/{id}', 'Backend\StateToStateRouteController@forceDelete')->name('admin.state-to-state-routes.forceDelete');
    Route::get('state-to-state-routes/{stateToStateRoute}/edit', 'Backend\StateToStateRouteController@edit')->name('admin.state-to-state-routes.edit');
    Route::put('state-to-state-routes/{stateToStateRoute}/update', 'Backend\StateToStateRouteController@update')->name('admin.state-to-state-routes.update');
    Route::delete('state-to-state-routes/{id}/delete', 'Backend\StateToStateRouteController@destroy')->name('admin.state-to-state-routes.destroy');

    // State to state move size costs
    Route::get('state-to-state-move-size-costs', 'Backend\StateToStateRouteController@moveSizeCostIndex')->name('admin.state-to-state-routes.move-size-cost.index');
    Route::get('state-to-state-move-size-costs/create', 'Backend\StateToStateRouteController@moveSizeCostCreate')->name('admin.state-to-state-routes.move-size-cost.create');
    Route::post('state-to-state-move-size-costs/store', 'Backend\StateToStateRouteController@moveSizeCostStore')->name('admin.state-to-state-routes.move-size-cost.store');
    Route::get('state-to-state-move-size-costs/{moveSizeCost}/edit', 'Backend\StateToStateRouteController@moveSizeCostEdit')->name('admin.state-to-state-routes.move-size-cost.edit');
    Route::put('state-to-state-move-size-costs/{moveSizeCost}/update', 'Backend\StateToStateRouteController@moveSizeCostUpdate')->name('admin.state-to-state-routes.move-size-cost.update');
    Route::delete('state-to-state-move-size-costs/{id}/delete', 'Backend\StateToStateRouteController@moveSizeCostDestroy')->name('admin.state-to-state-routes.move-size-cost.destroy');

    // State to City Routes
    Route::get('state-to-city-routes', 'Backend\StateToCityRouteController@index')->name('admin.state-to-city-routes.index');
    Route::get('state-to-city-routes/create', 'Backend\StateToCityRouteController@create')->name('admin.state-to-city-routes.create');
    Route::post('state-to-city-routes/store', 'Backend\StateToCityRouteController@store')->name('admin.state-to-city-routes.store');
    Route::get('state-to-city-routes/trashed', 'Backend\StateToCityRouteController@trashed')->name('admin.state-to-city-routes.trashed');
    Route::post('state-to-city-routes/{id}/restore', 'Backend\StateToCityRouteController@restore')->name('admin.state-to-city.restore');
    Route::delete('state-to-city-routes/{id}/force-delete', 'Backend\StateToCityRouteController@forceDelete')->name('admin.state-to-city.forceDelete');
    Route::get('state-to-city-routes/{stateToCityRoute}/edit', 'Backend\StateToCityRouteController@edit')->name('admin.state-to-city-routes.edit');
    Route::put('state-to-city-routes/{stateToCityRoute}/update', 'Backend\StateToCityRouteController@update')->name('admin.state-to-city-routes.update');
    Route::delete('state-to-city-routes/{id}/delete', 'Backend\StateToCityRouteController@destroy')->name('admin.state-to-city-routes.destroy');
    Route::post('state-to-city-routes/import', 'Backend\StateToCityRouteController@import')->name('admin.state-to-city-routes.import')->middleware('auth:admin');

    // State to City Move Size Costs
    Route::get('state-to-city-move-size-costs', 'Backend\StateToCityRouteController@moveSizeCostIndex')->name('admin.state-to-city-routes.move-size-cost.index');
    Route::get('state-to-city-move-size-costs/create', 'Backend\StateToCityRouteController@moveSizeCostCreate')->name('admin.state-to-city-routes.move-size-cost.create');
    Route::post('state-to-city-move-size-costs/store', 'Backend\StateToCityRouteController@moveSizeCostStore')->name('admin.state-to-city-routes.move-size-cost.store');
    Route::get('state-to-city-move-size-costs/{moveSizeCost}/edit', 'Backend\StateToCityRouteController@moveSizeCostEdit')->name('admin.state-to-city-routes.move-size-cost.edit');
    Route::put('state-to-city-move-size-costs/{moveSizeCost}/update', 'Backend\StateToCityRouteController@moveSizeCostUpdate')->name('admin.state-to-city-routes.move-size-cost.update');
    Route::delete('state-to-city-move-size-costs/{id}/delete', 'Backend\StateToCityRouteController@moveSizeCostDestroy')->name('admin.state-to-city-routes.move-size-cost.destroy');

    // City to State Routes
    Route::get('city-to-state-routes', 'Backend\CityToStateRouteController@index')->name('admin.city-to-state-routes.index');
    Route::get('city-to-state-routes/create', 'Backend\CityToStateRouteController@create')->name('admin.city-to-state-routes.create');
    Route::post('city-to-state-routes/store', 'Backend\CityToStateRouteController@store')->name('admin.city-to-state-routes.store');
    Route::get('city-to-state-routes/trashed', 'Backend\CityToStateRouteController@trashed')->name('admin.city-to-state-routes.trashed');
    Route::post('city-to-state-routes/{id}/restore', 'Backend\CityToStateRouteController@restore')->name('admin.city-to-state.restore');
    Route::delete('city-to-state-routes/{id}/force-delete', 'Backend\CityToStateRouteController@forceDelete')->name('admin.city-to-state.forceDelete');
    Route::get('city-to-state-routes/{cityToStateRoute}/edit', 'Backend\CityToStateRouteController@edit')->name('admin.city-to-state-routes.edit');
    Route::put('city-to-state-routes/{cityToStateRoute}/update', 'Backend\CityToStateRouteController@update')->name('admin.city-to-state-routes.update');
    Route::delete('city-to-state-routes/{id}/delete', 'Backend\CityToStateRouteController@destroy')->name('admin.city-to-state-routes.destroy');
    Route::post('city-to-state-routes/import', 'Backend\CityToStateRouteController@import')->name('admin.city-to-state-routes.import')->middleware('auth:admin');

    // City to State Move Size Costs
    Route::get('city-to-state-move-size-costs', 'Backend\CityToStateRouteController@moveSizeCostIndex')->name('admin.city-to-state-routes.move-size-cost.index');
    Route::get('city-to-state-move-size-costs/create', 'Backend\CityToStateRouteController@moveSizeCostCreate')->name('admin.city-to-state-routes.move-size-cost.create');
    Route::post('city-to-state-move-size-costs/store', 'Backend\CityToStateRouteController@moveSizeCostStore')->name('admin.city-to-state-routes.move-size-cost.store');
    Route::get('city-to-state-move-size-costs/{moveSizeCost}/edit', 'Backend\CityToStateRouteController@moveSizeCostEdit')->name('admin.city-to-state-routes.move-size-cost.edit');
    Route::put('city-to-state-move-size-costs/{moveSizeCost}/update', 'Backend\CityToStateRouteController@moveSizeCostUpdate')->name('admin.city-to-state-routes.move-size-cost.update');
    Route::delete('city-to-state-move-size-costs/{id}/delete', 'Backend\CityToStateRouteController@moveSizeCostDestroy')->name('admin.city-to-state-routes.move-size-cost.destroy');

    //  Import Info Routes
    Route::get('import-info-summary', 'Backend\ImportInfoController@checkSummary')->name('import-info-summary')->middleware('auth:admin');
    Route::get('clear-info-summary', 'Backend\ImportInfoController@clearSummary')->name('clear-info-summary')->middleware('auth:admin');

    Route::resource('admins', 'Backend\AdminsController', [
        'names' => 'admin.admins',
    ]);

    Route::resource('companies', 'Backend\CompanyController', [
        'names' => 'admin.companies',
    ]);
    Route::get('companies/{company}/review', 'Backend\CompanyController@review')->name('admin.companies.review');
    Route::get('admin/companies/export-excel', 'Backend\CompanyController@companiesexportExcel')->name('admin.companies.export.excel');

    Route::resource('live-calls', 'Backend\LiveCallController', [
        'names' => 'admin.live-calls',
    ]);
    Route::get('companies/password/{id}', 'Backend\CompanyController@passEdit')->name(
        'admin.comp.pass'
    );
    Route::post('companies/{company}', 'Backend\CompanyController@passUpdate')->name(
        'admin.comp.pass.update'
    );
    Route::get('companies/{id}/active', 'Backend\CompanyController@companyIsLeadActive')->name(
        'admin.companies.isLeadActive'
    );
    Route::get('companies/{id}/un-active', 'Backend\CompanyController@companyIsLeadUnActive')->name(
        'admin.companies.isLeadUnActive'
    );
















    // Route::get('/admin/companies/password/{id}', 'passPage')->name('admin.comp.pass');
    //     Route::post('/admin/companies/{company}', 'passUpdate')->name('admin.comp.pass.update');

    Route::controller(App\Http\Controllers\NotificationController::class)->group(function () {
        Route::get('/notification', 'index')->name('notifications');
        Route::get('/delete_notification/{id}', 'notiification_delete');
        Route::get('read_all_notification', 'read_all_notiification');
        Route::get('/mark_read_notification/{id}', 'noti_read');
        Route::get('/delete_all_notification', 'all_notiification_delete');
        Route::post('/admin/delete-selected-notifications', 'delete_selected_notifications')->name('del_selected_noti');
    });

    Route::controller(\App\Http\Controllers\Backend\ContactMoverController::class)->group(function () {
        Route::get('/mover-quotations', 'index')->name('admin.mover_quotations.index');
        Route::delete('/mover-quotations/{id}', 'destroy')->name('admin.mover_quotations.destroy');
        Route::delete('mover-quotationsDeleteAll', 'deleteAll')->name('admin.mover_quotations..deleteall');
        Route::get('mover-quotations/{id}/markasread', 'markAsRead')->name('admin.mover_quotations..markAsRead');
    });

    Route::controller(\App\Http\Controllers\Backend\ResourceController::class)->group(function () {
        // ---------------Resource Pages-----------------///
        Route::get('/resource-pages', 'resource_index')->name('admin.resource.index');
        Route::get('/resource-pages/create', 'resource_create')->name('admin.resource.create');
        Route::post('/resource-pages/store', 'resource_store')->name('admin.resource.store');
        Route::get('/resource-pages/edit/{id}', 'resource_edit')->name('admin.resource.edit');
        Route::put('/resource-pages/update/{id}', 'resource_update')->name('admin.resource.update');
        Route::delete('/resource-pages/{id}', 'resource_destroy')->name('admin.resource.destroy');

        // ---------------Resource Page Top Movers-----------------///
        Route::get('/resource-top-movers', 'resource_top_mover_index')->name('admin.resource.top.mover.index');
        Route::get('/resource-top-movers/create', 'resource_top_mover_create')->name('admin.resource.top.mover.create');
        Route::post('/resource-top-movers/store', 'resource_top_mover_store')->name('admin.resource.top.mover.store');
        Route::get('/resource-top-movers/edit/{id}', 'resource_top_mover_edit')->name('admin.resource.top.mover.edit');
        Route::put('/resource-top-movers/update/{id}', 'resource_top_mover_update')->name('admin.resource.top.mover.update');
        Route::delete('/resource-top-movers/{id}', 'resource_top_mover_destroy')->name('admin.resource.top.mover.destroy');

        // ---------------Resource Page Bottom Movers-----------------///
        Route::get('/resource-bottom-movers', 'resource_bottom_mover_index')->name('admin.resource.bottom.mover.index');
        Route::get('/resource-bottom-movers/create', 'resource_bottom_mover_create')->name('admin.resource.bottom.mover.create');
        Route::post('/resource-bottom-movers/store', 'resource_bottom_mover_store')->name('admin.resource.bottom.mover.store');
        Route::get('/resource-bottom-movers/edit/{id}', 'resource_bottom_mover_edit')->name('admin.resource.bottom.mover.edit');
        Route::put('/resource-bottom-movers/update/{id}', 'resource_bottom_mover_update')->name('admin.resource.bottom.mover.update');
        Route::delete('/resource-bottom-movers/{id}', 'resource_bottom_mover_destroy')->name('admin.resource.bottom.mover.destroy');

        // ---------------Resource Page Other Movers-----------------///
        Route::get('/resource-other-movers', 'resource_other_mover_index')->name('admin.resource.other.mover.index');
        Route::get('/resource-other-movers/create', 'resource_other_mover_create')->name('admin.resource.other.mover.create');
        Route::post('/resource-other-movers/store', 'resource_other_mover_store')->name('admin.resource.other.mover.store');
        Route::get('/resource-other-movers/edit/{id}', 'resource_other_mover_edit')->name('admin.resource.other.mover.edit');
        Route::put('/resource-other-movers/update/{id}', 'resource_other_mover_update')->name('admin.resource.other.mover.update');
        Route::delete('/resource-other-movers/{id}', 'resource_other_mover_destroy')->name('admin.resource.other.mover.destroy');

        // ---------------Resource Page Faqs-----------------///
        Route::get('/resource-faqs', 'resource_faq_index')->name('admin.resource-faq.index');
        Route::get('/resource-faqs/create', 'resource_faq_create')->name('admin.resource-faq.create');
        Route::post('/resource-faqs/store', 'resource_faq_store')->name('admin.resource-faq.store');
        Route::get('/resource-faqs/edit/{id}', 'resource_faq_edit')->name('admin.resource-faq.edit');
        Route::put('/resource-faqs/update/{id}', 'resource_faq_update')->name('admin.resource-faq.update');
        Route::delete('/resource-faqs/{id}', 'resource_faq_destroy')->name('admin.resource-faq.destroy');
    });

    Route::controller(\App\Http\Controllers\Backend\ProductController::class)->group(function () {
        // ---------------Products-----------------///
        Route::get('/products', 'index')->name('admin.products.index');
        Route::get('/products/create', 'create')->name('admin.products.create');
        Route::post('/products/store', 'store')->name('admin.products.store');
        Route::get('/products/edit/{product}', 'edit')->name('admin.products.edit');
        Route::put('/products/update/{product}', 'update')->name('admin.products.update');
        Route::delete('/products/{id}/delete', 'destroy')->name('admin.products.destroy');
        Route::delete('/products/delete-selected', 'deleteSelected')->name('admin.products.deleteSelected');
    });
    Route::controller(\App\Http\Controllers\Backend\OrderController::class)->group(function () {
        // --------------- Orders ----------------///
        Route::get('/orders', 'index')->name('admin.orders.index');
        Route::delete('/orders/{id}/delete', 'destroy')->name('admin.orders.destroy');
        Route::delete('/orders/delete-selected', 'deleteSelected')->name('admin.orders.deleteSelected');
    });

    Route::resource('company-info', 'Backend\CompanyInfoController', [
        'names' => 'admin.company-info',
    ]);
    Route::resource('company-faq', 'Backend\CompanyFaqController', [
        'names' => 'admin.company-faq',
    ]);

    Route::delete('companiesDeleteAll', 'Backend\CompanyController@deleteAll')->name(
        'admin.companies.deleteall'
    );


    Route::get('PageViews', 'Backend\PageViewVisitorController@PageView')->name('admin.pageview');
    Route::get('PageVisitors', 'Backend\PageViewVisitorController@PageVisitor')->name('admin.pagevisitor');
    Route::get('VisitorDetails', 'Backend\PageViewVisitorController@VisitorDetail')->name('admin.visitordetail');



    Route::get('quotations', 'Backend\QuotationController@index')->name(
        'admin.quotations.index'
    );
    Route::delete('quotations/{id}', 'Backend\QuotationController@destroy')->name(
        'admin.quotations.destroy'
    );
    Route::delete('quotationsDeleteAll', 'Backend\QuotationController@deleteAll')->name(
        'admin.quotations.deleteall'
    );

    Route::resource('comments', 'Backend\CommentController', [
        'names' => 'admin.comments',
    ]);
    Route::delete('admin/comments/delete-selected', 'Backend\CommentController@deleteSelected')->name('admin.comments.deleteSelected');


    Route::resource('post-category', 'Backend\PostCategoryController', [
        'names' => 'admin.post-categories',
    ]);
    Route::delete('admin/post-category/delete-selected', 'Backend\PostCategoryController@deleteSelected')->name('admin.post-categories.deleteSelected');


    Route::get('posts/trashed', 'Backend\PostController@trashed')->name('admin.posts.trashed');
    Route::post('posts/restore/{id}', 'Backend\PostController@restore')->name('admin.posts.restore');
    Route::delete('posts/force-delete/{id}', 'Backend\PostController@forceDelete')->name('admin.posts.forceDelete');
    Route::delete('posts/delete-all', 'Backend\PostController@deleteAll')->name('admin.posts.deleteall');
    Route::resource('posts', 'Backend\PostController', [
        'names' => 'admin.posts',
    ]);

    Route::resource('post-faq', 'Backend\PostFaqController', [
        'names' => 'admin.post-faq',
    ]);
    Route::delete('admin/post-faq/delete-selected', 'Backend\PostFaqController@deleteSelected')->name('admin.post-faq.deleteSelected');

    Route::resource('moving-route', 'Backend\MovingRoutesController', [
        'names' => 'admin.moving-route',
    ]);
    Route::resource('contact-us', 'Backend\ContactUsController', [
        'names' => 'admin.contact-us',
    ]);
    Route::delete('contact-usDeleteAll', 'Backend\ContactUsController@deleteAll')->name(
        'admin.contact-us.deleteall'
    );

    Route::resource('user-contact-us', 'Backend\UserContactUsController', [
        'names' => 'admin.user-contact-us',
    ]);
    Route::delete('user-contact-usDeleteAll', 'Backend\UserContactUsController@deleteAll')->name(
        'admin.user-contact-us.deleteall'
    );

    Route::resource('categories', 'Backend\GetQuote\CategoryController', [
        'names' => 'admin.estimate-pages.categories',
    ]);

    Route::prefix('cost-estimator')
        ->name('admin.cost-estimator.')
        ->controller(CostEstimatorController::class)
        ->group(function () {

            Route::get('/', 'index')->name('index');

            Route::get('/export/excel', 'costEstimatorExcel')->name('export.excel');

            Route::get('/{cost_estimator}', 'show')->name('show');

            Route::post('/{cost_estimator}/assign-companies', 'assignToCompanies')
                ->name('assign-companies');

            Route::post('/{cost_estimator}/mark-spam', 'markAsSpam')
                ->name('mark-spam');

            Route::delete('/bulk-destroy', 'bulkDestroy')->name('bulkDestroy');

            Route::delete('/{cost_estimator}', 'destroy')->name('destroy');
        });

    Route::get('admin/cost-estimator/export-excel', 'Backend\CostEstimatorController@costEstimatorExcel')->name('admin.cost-estimator.export.excel');
    Route::delete('admin/cost-estimator/bulk-delete', 'Backend\CostEstimatorController@bulkDestroy')->name('admin.cost-estimator.bulkDestroy');

    Route::resource('sub-categories', 'Backend\GetQuote\SubCategoryController', [
        'names' => 'admin.estimate-pages.sub-categories',
    ]);

    Route::resource('items', 'Backend\GetQuote\ItemController', [
        'names' => 'admin.estimate-pages.items',
    ]);



    Route::controller(\App\Http\Controllers\Backend\LeadPlanController::class)->group(function () {
        Route::get('lead-plans', 'index')->name('admin.lead_plans.index');
        Route::post('lead-plans', 'store')->name('admin.lead_plans.store');
        Route::put('lead-plans/{plan}', 'update')->name('admin.lead_plans.update');
        Route::post('lead-plans/{plan}/toggle', 'toggle')->name('admin.lead_plans.toggle');
        Route::delete('lead-plans/{plan}', 'destroy')->name('admin.lead_plans.destroy');
        Route::post('lead-plans/reset-defaults', 'resetDefaults')->name('admin.lead_plans.reset_defaults');
    });


    // Route::post('comment-store', 'CommentController@store')->name('admin.comments.store');

    // Route::post('comment-update/{comment}', 'CommentController@update')->name('admin.comments.update');


    Route::get('get-quotes', 'Backend\GetQuoteController@index')->name(
        'admin.get-quotes.index'
    );
    Route::get('get-quotes/show/{id}', 'Backend\GetQuoteController@show')->name(
        'admin.get-quotes.show'
    );
    Route::delete('get-quotes/{id}', 'Backend\GetQuoteController@destroy')->name(
        'admin.get-quotes.destroy'
    );

    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name(
        'admin.login'
    );
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name(
        'admin.login.submit'
    );
    Route::get('/login/otp', 'Backend\Auth\LoginController@showOtpForm')->name(
        'admin.login.otp.form'
    );
    Route::post('/login/otp', 'Backend\Auth\LoginController@verifyOtp')->name(
        'admin.login.otp.verify'
    );
    Route::post('/login/otp/resend', 'Backend\Auth\LoginController@resendOtp')->name(
        'admin.login.otp.resend'
    );


    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name(
        'admin.logout.submit'
    );

    // Forget Password Routes
    Route::get(
        '/password/reset',
        'Backend\Auth\ForgetPasswordController@showLinkRequestForm'
    )->name('admin.password.request');
    Route::post(
        '/password/reset/submit',
        'Backend\Auth\ForgetPasswordController@reset'
    )->name('admin.password.update');
});
