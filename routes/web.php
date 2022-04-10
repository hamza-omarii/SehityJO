<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::view('/', 'welcome');
    Route::view('/who-are-you', 'whoAreYou');
    Auth::routes();

    /*
    ===========================
    ===    Admin Routes     ===
    ===========================
    */
    Route::group(["prefix" => "admin", "namespace" => "Admin", "as" => "admin."], function () {

        Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
            Route::get('/login', 'AdminController@ShowLoginForm')->name('login');
            Route::post('/check', 'AdminController@check')->name('check');
        });

        Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
            Route::post('/logout', 'AdminController@logout')->name('logout');
            Route::get('/edit/profile/{id}', 'AdminController@editProfile')->name('edit.profile');
            Route::put('/update/profile/{id}', 'AdminController@updateProfile')->name('update.profile');

            // DashboardController
            Route::get("/dashboard", "DashboardController@index")->name("dashboard");

            // DoctorController
            Route::get("/doctors", "DoctorController@index")->name("doctors");
            Route::delete("/destroy/doctor/{id}", "DoctorController@destroy")->name("destroy.doctor");
            Route::get("/show/doctor/details/{id}", "DoctorController@showDoctorDetails")->name("show.doctor.details");
            Route::post("/approve/doctor/{id}", "DoctorController@approveDoctor")->name("approve.doctor");

            // Specialization Controller
            Route::resource('/specialization', "SpecializationController")->except(['create', 'edit', 'show']);

            // Hospitals Controller
            Route::resource('/hospitals', "HospitalController")->except(['show']);

            //SuggestionsController
            Route::get("/suggestions", "SuggestionsAndComplaintsController@index")->name("suggestions");
            Route::get("/suggestions/show/{id}", "SuggestionsAndComplaintsController@show")->name("suggestions.show");
            Route::delete("/suggestions/destroy/{id}", "SuggestionsAndComplaintsController@destroy")->name("suggestions.destroy");
        });
        Route::post("/suggestions/store", "SuggestionsAndComplaintsController@store")->name("suggestions.store");
    });

    /*
    ===========================
    ===    Doctor Routes    ===
    ===========================
    */
    Route::group(["prefix" => "doctor", "namespace" => "Doctor", "as" => "doctor."], function () {

        Route::middleware(['guest:doctor', 'PreventBackHistory'])->group(function () {
            Route::get('/login', 'DoctorController@ShowLoginForm')->name('login');
            Route::post('/check', 'DoctorController@check')->name('check');
            Route::get('/register', 'DoctorController@ShowRegisterForm')->name('register');
            Route::post('/create', 'DoctorController@create')->name('create');
            Route::get("/get/specific/specialization/{id}", 'DoctorController@getSpecificSpecialization')->name("get.specific.specialization");
        });

        Route::middleware(['auth:doctor', 'PreventBackHistory', 'CheckIfActive'])->group(function () {
            // put your routes here
            Route::view('/dashboard', 'doctor.dashboard')->name('dashboard');
            Route::post('/logout', 'DoctorController@logout')->name('logout');
        });
    });


    /*
    ===========================
    ===    User Routes      ===
    ===========================
    */
    Route::group(["prefix" => "user", "namespace" => "User", "as" => "user."], function () {

        Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
            Route::get('/login', 'UserController@ShowLoginForm')->name('login');
            Route::view('/register', 'auth.register')->name('register');
            Route::post('/create', 'UserController@create')->name('create');
            Route::post('/check', 'UserController@check')->name('check');
        });

        Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {
            // put your routes here
            Route::view('/home', 'user.dashboard')->name('dashboard');
            Route::post('/logout', 'UserController@logout')->name('logout');
        });
    });
});
