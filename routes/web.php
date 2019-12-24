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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
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
    //////////////////// Testimonial
    Route::resource('/blog', 'BlogController');
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
    ////////// Company
    Route::resource('/gallery', 'GalleryController');
});



