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

            // DoctorController
            Route::get('/edit/profile/{id}', 'DoctorController@editProfile')->name('edit.profile');
            Route::put('/update/profile/{id}', 'DoctorController@updateProfile')->name('update.profile');

            // DashboardController
            Route::get("/dashboard", "DashboardController@index")->name("dashboard");


            // ArticleController
            Route::resource("articles", "ArticleController")->except(['create', 'edit', 'show']);


            // TimeAvilableController
            Route::get("show/times/avilable", "TimeAvilableController@showTimesAvilable")->name("show.times");
            Route::post("update/times/avilable", "TimeAvilableController@updateTimesAvilable")->name("update.times");


            // BookingController
            Route::get("get/appointments", "BookingController@getAppointments")->name("get.appointments");
            Route::put("update/appointment/{id}", "BookingController@update")->name("update.appointment");
            Route::delete("destroy/appointment/{id}", "BookingController@destroy")->name("destroy.appointment");
            Route::put("changeState/appointment/{id}", "BookingController@changeState")->name("changeState.appointment");
            Route::get("show/appointment/{id}", "BookingController@showAppointment")->name("show.appointment");


            // MedicalReportController
            Route::get("create/medical/report/{id}", "MedicalReportController@create")->name("create.medical.report");
            Route::post("store/medical/report", "MedicalReportController@store")->name("store.medical.report");
            Route::get("edit/medical/report/{id}", "MedicalReportController@edit")->name("edit.medical.report");
            Route::put("update/medical/report/{id}", "MedicalReportController@update")->name("update.medical.report");
            /* Route::put("destroy/medical/report/{id}", "MedicalReportController@destroy")->name("destroy.medical.report"); */

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

            // Search Controller ( this is home page for user )
            Route::get("/search/doctor", "SearchController@search")->name("search.doctor");
            Route::get("/get/hospitals-city/ajax/{id}", "SearchController@get_Hospitals_When_Cities")->name("get.hospitals.city.ajax");
            Route::get("/get/specialization-hospitals/ajax/{id}", "SearchController@get_Specialization_When_Hospital")->name("get.specialization.hospitals.ajax");

            // MdeicalController
            Route::get("mdeical/record", "MedicalRecordController@index")->name("mdeical.record");

            // Article Controller
            Route::get("articles", "ArticleController@index")->name("articles");


            // RatingController
            Route::post("submit/rating", "RatingController@submit")->name("submit.rating");

            // BookingController
            Route::get("show/doctor/details/{id}", "BookingController@showDoctorDetails")->name("show.doctor.details");
            Route::post("make/appointment", "BookingController@MakeAppointment")->name("make.appointment");
            Route::put("update/appointment/{id}", "BookingController@UpdateAppointment")->name("update.appointment");
            Route::get("get/appointments", "BookingController@getAppoinmentsForUser")->name("get.appointments");
            Route::get("show/medical/report/{id}", "BookingController@showMedicalReport")->name("show.medical.report");
            Route::delete("remove/appointment/{id}", "BookingController@deleteAppointment")->name("remove.appointment");


            Route::post('/logout', 'UserController@logout')->name('logout');
        });
    });
});
