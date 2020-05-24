<?php

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

Route::get('/test', function () {
    return config('mail.from.address');
});

Route::get('/cache-clear', function (){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return 'DONE';
});



Auth::routes(['verify' => true]);

//////////////Admin Dashboard Routes
Route::group([
    'prefix'        => 'admin',
    'as'            => 'admin.',
    'namespace'     => 'Admin',
    'middleware'    => ['auth', 'verified']
], function(){
    /////////////////////Dashboard
    Route::resource('/dashboard', 'DashboardController');
    /////////////////////Profile
    Route::resource('/profile', 'ProfileController');
    ////////////////////Company
    Route::resource('/company', 'CompanyController');
    ////////////////////Industry
    Route::resource('/industry', 'IndustryController');
    ////////////////////User
    Route::resource('/user', 'UserController');
    ////////////////////Employer
    Route::resource('/employer', 'EmployerController');
    ////////////////////Role
    Route::get('/permission', 'RoleController@permission')->name('permission.index');
    Route::resource('/role', 'RoleController');
    ////////////////////Setting
    Route::resource('/setting', 'SettingController');
    //////////////////// Testimonial
    Route::resource('/testimonial', 'TestimonialController');
    //////////////////// Blog
    Route::resource('/blog', 'BlogController');
    //////////////////// Destination
    Route::resource('/destination', 'DestinationController');
    //////////////////// Moderator
    Route::get('/moderator/getCompanies/{id}', 'ModeratorController@getCompanies')->name('moderator.getCompanies');
    Route::get('/moderator/getUsers/{id}', 'ModeratorController@getUsers')->name('moderator.getUsers');
    Route::get('/moderator/assignCompany', 'ModeratorController@assignCompany')->name('moderator.assignCompany');
    Route::get('/moderator/revokeCompany', 'ModeratorController@revokeCompany')->name('moderator.revokeCompany');
    Route::get('/moderator/assignUser', 'ModeratorController@assignUser')->name('moderator.assignUser');
    Route::get('/moderator/revokeUser', 'ModeratorController@revokeUser')->name('moderator.revokeUser');
    Route::resource('/moderator', 'ModeratorController');
});
////////// User Dashboard Routes
Route::group([
    'prefix'        =>  'dashboard',
    'as'            =>  'user.',
    'namespace'     =>  'User',
    'middleware'    =>  ['auth', 'verified'],
], function(){
    /////////// Dashboard
    Route::resource('/', 'DashboardController');
    ////////// Profile
    Route::resource('/profile', 'ProfileController');
    ////////// Company
    Route::resource('/company', 'CompanyController');
    ////////// Gallery
    Route::resource('/gallery', 'GalleryController');
    ////////// Services
    Route::post('/sortOrder', 'ServiceController@sortOrder')->name('service.sortOrder');
    Route::resource('/service', 'ServiceController');
    ////////// Events
    Route::resource('/event', 'EventController');
    ////////// Events
    Route::resource('/job', 'JobController');
    ////////// Notice
    Route::resource('/notice', 'NoticeController');
    ////////// Contact
    Route::resource('/contact', 'ContactController');
    ///////Review
    Route::resource('/review', 'ReviewController');

});

Route::group([
    'as' => 'front.',
    'namespace' => 'Front',
], function (){
    ///////Home Page
    Route::get('/', 'HomeController@index')->name('home');
    ///////Blog
    Route::resource('/blog', 'BlogController');
    ///////Company
    Route::post('/listing/contact/{id}', 'CompanyController@addContactMessage')->name('listing.addContactMessage');
    Route::post('/listing/save/{id}', 'CompanyController@saveListing')->name('listing.saveListing');
    Route::post('/{slug}/listing', 'CompanyController@industryListing')->name('listing.industryListing');
    Route::resource('/listing', 'CompanyController');
    ///////Review
    Route::resource('/review', 'ReviewController');
    ///////Search
    Route::get('/listing-search', 'SearchController@listing_search')->name('listing_search');
    ///////Industry
    Route::resource('/industry', 'IndustryController');
    ///////Destination
    Route::resource('/destination', 'DestinationController');
});

Route::get('/getDistrict', 'LocationController@getDistrict')->name('getDistrict');
Route::get('/getMunicipal', 'LocationController@getMunicipal')->name('getMunicipal');



