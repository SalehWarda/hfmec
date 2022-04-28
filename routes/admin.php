<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ProjectsController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\TeamController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    Route::get('/login', [LoginController::class, 'getLogin'])->name('getLogin');
    Route::post('/login', [LoginController::class, 'login'])->name('login');


    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

          Route::get('/logout', [LoginController::class, 'logout'])->name('logoutAdmin');
          Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        ########################### services Route Begin ##############################


        Route::group(['prefix' => 'services', 'as' => 'admin.'],function (){

              Route::post('/media/delete', [ServicesController::class, 'removeImage'])->name('services.removeImage');

              Route::get('/index', [ServicesController::class, 'index'])->name('services');
              Route::get('/create', [ServicesController::class, 'create'])->name('services.create');
              Route::post('/store', [ServicesController::class, 'store'])->name('services.store');
              Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('services.edit');
              Route::patch('/update', [ServicesController::class, 'update'])->name('services.update');
              Route::delete('/delete', [ServicesController::class, 'destroy'])->name('services.delete');


          });
        ########################### projects Route  End ##############################



        Route::group(['prefix' => 'projects', 'as' => 'admin.'],function (){

              Route::post('/media/delete', [ProjectsController::class, 'removeImage'])->name('projects.removeImage');

              Route::get('/index', [ProjectsController::class, 'index'])->name('projects');
              Route::get('/create', [ProjectsController::class, 'create'])->name('projects.create');
              Route::post('/store', [ProjectsController::class, 'store'])->name('projects.store');
              Route::get('/edit/{id}', [ProjectsController::class, 'edit'])->name('projects.edit');
              Route::get('/show/{id}', [ProjectsController::class, 'show'])->name('projects.show');
              Route::patch('/update', [ProjectsController::class, 'update'])->name('projects.update');
              Route::delete('/delete', [ProjectsController::class, 'destroy'])->name('projects.delete');


          });
        ########################### projects Route  End ##############################




        Route::group(['prefix' => 'about', 'as' => 'admin.'],function (){

              Route::post('/introduction/media/delete', [AboutController::class, 'introductionRemoveImage'])->name('introduction.removeImage');
              Route::get('/Introduction', [AboutController::class, 'introduction'])->name('about.introduction');
              Route::patch('/update-introduction', [AboutController::class, 'updateIntroduction'])->name('introduction.update');

              Route::post('/vision&value/media/delete', [AboutController::class, 'vvRemoveImage'])->name('vv.removeImage');
              Route::get('/vision&value', [AboutController::class, 'vv'])->name('about.vv');
              Route::patch('/update-vision&value', [AboutController::class, 'updateVV'])->name('vv.update');


              Route::post('/expertise-summary/media/delete', [AboutController::class, 'expertiseSummaryRemoveImage'])->name('expertise.summary.removeImage');
              Route::get('/expertise-summary', [AboutController::class, 'expertiseSummary'])->name('about.expertise-summary');
              Route::patch('/update-expertise-summary', [AboutController::class, 'updateExpertiseSummary'])->name('expertise.summary.update');



              Route::post('/ims-policy/media/delete', [AboutController::class, 'imsPolicyRemoveImage'])->name('imsPolicy.removeImage');
              Route::get('/ims-policy', [AboutController::class, 'imsPolicy'])->name('about.imsPolicy');
              Route::patch('/update-ims-policy', [AboutController::class, 'updateimsPolicy'])->name('imsPolicy.update');



              Route::post('/iso-certificates/media/delete', [AboutController::class, 'isoCertificatesRemoveImage'])->name('isoCertificates.removeImage');
              Route::get('/iso-certificates', [AboutController::class, 'isoCertificates'])->name('about.isoCertificates');
              Route::patch('/update-iso-certificates', [AboutController::class, 'updateisoCertificates'])->name('isoCertificates.update');


          });
        ########################### about Route  End ##############################


        ########################### news Route Begin ##############################


        Route::group(['prefix' => 'news', 'as' => 'admin.'],function (){

            Route::post('/media/delete', [NewsController::class, 'removeImage'])->name('news.removeImage');

            Route::get('/index', [NewsController::class, 'index'])->name('news');
            Route::get('/create', [NewsController::class, 'create'])->name('news.create');
            Route::post('/store', [NewsController::class, 'store'])->name('news.store');
            Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
            Route::patch('/update', [NewsController::class, 'update'])->name('news.update');
            Route::delete('/delete', [NewsController::class, 'destroy'])->name('news.delete');


        });
        ########################### news Route  End ##############################

        ########################### teams Route Begin ##############################


        Route::group(['prefix' => 'teams', 'as' => 'admin.'],function (){

            Route::post('/media/delete', [TeamController::class, 'removeImage'])->name('teams.removeImage');

            Route::get('/index', [TeamController::class, 'index'])->name('teams');
            Route::get('/create', [TeamController::class, 'create'])->name('teams.create');
            Route::post('/store', [TeamController::class, 'store'])->name('teams.store');
            Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
            Route::patch('/update', [TeamController::class, 'update'])->name('teams.update');
            Route::delete('/delete', [TeamController::class, 'destroy'])->name('teams.delete');


        });
        ########################### teams Route  End ##############################

    });


});




