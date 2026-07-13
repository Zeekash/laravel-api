<?php

use App\Models\Company;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/companies', function () {
    return (Company::all());
});

//Company Registration
Route::post('/company/register', 'Api\Frontend\RegistrationApiController@postRegister');

//Home Page
Route::get('/home', 'Api\Frontend\HomeApiController@homePage');

//Company Profile Page
Route::get('/mover/{company:slug}', 'Api\Frontend\CompanyApiController@companyShow');

// Main API
Route::controller(App\Http\Controllers\Api\Frontend\MainApiController::class)->group(function () {
    Route::get('/states', 'states');
    Route::get('/fetch-cities', 'fetchCities');
    Route::get('/company/search/{slug?}', 'searchCompaniesApi')->name('api.company.search');
    Route::get('/mover-list', 'moverList');
    Route::post('/contact-us', 'usercontactUspost');
    Route::post('/review/{slug}', 'moverReviewPost');
    Route::get('/resource-page/{slug}', 'resourcePageApi');
});
// Blog API
Route::controller(App\Http\Controllers\Api\Frontend\BlogApiController::class)->group(function () {
    Route::get('/blogs', 'index');
    Route::get('/blogs/{post:slug}', 'show');
    Route::get('/category/{category:slug}', 'catShow');
});
