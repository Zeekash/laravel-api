<?php

use App\Models\State;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;



Route::get('/state/{state:slug}', function (State $state) {
    return Redirect::to('/movers-list/' . $state->slug, 301);
});



Route::get('https://mymovingjourney.com/cdn-cgi/l/email-protection', function () {
    return abort(404);
});

Route::get('/quotation', function () {
    return Redirect::to('/moving-cost-calculator', 301);
});



// Route::get('/movers/33/nm', function () {
//     return Redirect::to('/state/new-mexico', 301);
// });

Route::get('/mover-search', function () {
    return Redirect::to('/movers-list', 301);
});
Route::get('/mover/dumbo-moving-storage', function () {
    return Redirect::to('/mover/dumbo-moving-and-storage', 301);
});

Route::get('/moving-routes/atlanta-movers-movers', function () {
    return Redirect::to('/moving-routes/boston-to-atlanta-movers', 301);
});


Route::get('/company/top-movers', function () {
    return redirect('/mover-search', 301);
});
Route::get('/company/state', function () {
    return redirect('/movers', 301);
});
Route::get('/company/get-quote', function () {
    return redirect('/quotation', 301);
});
Route::get('/company/moving-tips', function () {
    return redirect('/category/moving-guide', 301);
});
Route::get('/company/packing-tips', function () {
    return redirect('/category/packing-tips', 301);
});
Route::get('/company/check-list', function () {
    return redirect('/checklist', 301);
});
Route::get('/checklist', function () {
    return redirect('blogs/moving-checklist', 301);
});
Route::get('/company/moving-guide', function () {
    return redirect('/category/moving-guide', 301);
});

Route::get('/help/contact-us', function () {
    return redirect('/contact', 301);
});

Route::get('/top-movers', function () {
    return redirect('/movers', 301);
});
Route::get('/top-movers/cross-country-moving-llc', function () {
    return redirect('/mover/cross-country-moving-llc', 301);
});
Route::get('/top-movers/pen-transit-van-lines', function () {
    return redirect('/mover/pan-transit-vanlines-llc', 301);
});


Route::get('/moving-resources/{slug}', function ($slug) {
    return redirect("/blogs/$slug", 301);
});
Route::get('/routes/{slug}', function ($slug) {
    return redirect("/moving-routes/$slug", 301);
});
Route::get('/routes', function () {
    return redirect("/moving-routes", 301);
});

Route::redirect('/mover/swift-shift-van-lines', '/mover/swift-shift-vanlines', 301);

Route::get('/company/listing', function () {
    return Redirect::to('/', 301);
});
Route::get('/blogs/managing-depression-after-relocating', function () {
    return Redirect::to('/blogs/how-to-cope-with-relocation-depression', 301);
});
Route::get('/sitemap.html', function () {
    return Redirect::to('/sitemap', 301);
});


// City movers redirects
Route::get('/city/movers-in-los-angeles-ca', function () {
    return redirect('/movers/california/los-angeles', 301);
});
Route::get('/city/movers-in-san-francisco-ca', function () {
    return redirect('/movers/california/san-francisco', 301);
});
Route::get('/city/movers-in-san-deigo-ca', function () {
    return redirect('/movers/california/san-diego', 301);
});
Route::get('/city/movers-in-houston-tx', function () {
    return redirect('/movers/texas/houston', 301);
});
Route::get('/city/movers-in-dallas-tx', function () {
    return redirect('/movers/texas/dallas', 301);
});
Route::get('/city/movers-in-austin-tx', function () {
    return redirect('/movers/texas/austin', 301);
});
Route::get('/city/movers-in-miami-fl', function () {
    return redirect('/movers/florida/miami', 301);
});
Route::get('/city/movers-in-orlando-fl', function () {
    return redirect('/movers/florida/orlando', 301);
});
Route::get('/city/movers-in-atlanta-ga', function () {
    return redirect('/movers/georgia/atlanta', 301);
});
Route::get('/city/movers-in-charlotte-nc', function () {
    return redirect('/movers/north-carolina/charlotte', 301);
});
Route::get('/city/movers-in-denver-co', function () {
    return redirect('/movers/colorado/denver', 301);
});
Route::get('/city/movers-in-nashville-tn', function () {
    return redirect('/movers/tennessee/nashville', 301);
});

Route::get('/local-movers', function () {
    return redirect('/resource/best-local-moving-companies', 301);
});

Route::get('/long-distance-movers', function () {
    return redirect('/resource/best-long-distance-moving-companies', 301);
});

Route::get('/commercial-moving', function () {
    return redirect('/resource/best-commercial-moving-companies', 301);
});

Route::get('/packing-and-storage', function () {
    return redirect('/resource/best-packing-and-moving-companies-in-usa', 301);
});

Route::get('/resource/top-rated-moving-companies-in-florida', function () {
    return redirect('/movers/florida', 301);
});

Route::get('/resource/top-rated-moving-companies-in-california', function () {
    return redirect('/movers/california', 301);
});

Route::get('/resource/top-rated-moving-companies-in-illinois', function () {
    return redirect('/movers/illinois', 301);
});

Route::get('/resource/top-rated-moving-companies-in-new-york', function () {
    return redirect('/movers/new-york', 301);
});

Route::get('/resource/top-rated-moving-companies-in-texas', function () {
    return redirect('/movers/texas', 301);
});

Route::get('/resource/top-rated-moving-companies-in-new-jersey', function () {
    return redirect('/movers/new-jersey', 301);
});

Route::get('/movers/alaska', function () {
    return Redirect::to('/movers-list/alaska', 301);
});
Route::get('/movers/hawaii', function () {
    return Redirect::to('/movers-list/hawaii', 301);
});
Route::get('/movers/district-of-columbia', function () {
    return Redirect::to('/movers-list/district-of-columbia', 301);
});
Route::get('/cost-estimator', function () {
    return Redirect::to('/moving-cost-calculator', 301);
});
Route::get('/move-cost/utha', function () {
    return Redirect::to('/move-cost/utah', 301);
});
Route::get('/move-cost/lowa', function () {
    return Redirect::to('/move-cost/iowa', 301);
});
Route::get('/mover/swift-shift-van-lines', function () {
    return Redirect::to('/mover/swift-shift-vanlines', 301);
});
Route::get('/resource/best-state-to-state-moving-companies', function () {
    return redirect('/resource/best-long-distance-moving-companies', 301);
});
Route::get('/resource/best-state-to-state-moving-companies', function () {
    return Redirect::to('/resource/best-long-distance-moving-companies', 301);
});
Route::get('/resource/best-moving-companies', function () {
    return redirect('/resource/best-long-distance-moving-companies', 301);
});
Route::get('/mover/sample', function () {
    return redirect('/movers-list', 301);
});