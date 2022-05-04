<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\CoverController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MailController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ProjectsController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\SettingsController;
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

        ########################### covers Route Begin ##############################


        Route::group(['prefix' => 'covers', 'as' => 'admin.'],function (){

              Route::post('/media/delete/cover', [CoverController::class, 'removeImage'])->name('covers.removeImage');

              Route::get('/index', [CoverController::class, 'index'])->name('covers');
              Route::get('/create', [CoverController::class, 'create'])->name('covers.create');
              Route::post('/store', [CoverController::class, 'store'])->name('covers.store');
              Route::get('/edit/{id}', [CoverController::class, 'edit'])->name('covers.edit');
              Route::patch('/update', [CoverController::class, 'update'])->name('covers.update');
              Route::delete('/delete', [CoverController::class, 'destroy'])->name('covers.delete');


          });
        ########################### covers Route  End ##############################


    ########################### services Route Begin ##############################


        Route::group(['prefix' => 'services', 'as' => 'admin.', 'middleware' => 'can:services'],function (){

              Route::post('/media/delete', [ServicesController::class, 'removeImage'])->name('services.removeImage');

              Route::get('/index', [ServicesController::class, 'index'])->name('services');
              Route::get('/create', [ServicesController::class, 'create'])->name('services.create');
              Route::post('/store', [ServicesController::class, 'store'])->name('services.store');
              Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('services.edit');
              Route::patch('/update', [ServicesController::class, 'update'])->name('services.update');
              Route::delete('/delete', [ServicesController::class, 'destroy'])->name('services.delete');


          });
        ########################### projects Route  End ##############################



        Route::group(['prefix' => 'projects', 'as' => 'admin.', 'middleware' => 'can:projects'],function (){

              Route::post('/media/delete', [ProjectsController::class, 'removeImage'])->name('projects.removeImage');
              Route::post('/media/delete/client', [ProjectsController::class, 'clientremoveImage'])->name('client.removeImage');

              Route::get('/index', [ProjectsController::class, 'index'])->name('projects');
              Route::get('/create', [ProjectsController::class, 'create'])->name('projects.create');
              Route::post('/store', [ProjectsController::class, 'store'])->name('projects.store');
              Route::get('/edit/{id}', [ProjectsController::class, 'edit'])->name('projects.edit');
              Route::get('/show/{id}', [ProjectsController::class, 'show'])->name('projects.show');
              Route::patch('/update', [ProjectsController::class, 'update'])->name('projects.update');
              Route::delete('/delete', [ProjectsController::class, 'destroy'])->name('projects.delete');


          });
        ########################### projects Route  End ##############################




        Route::group(['prefix' => 'about', 'as' => 'admin.', 'middleware' => 'can:about'],function (){

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


        Route::group(['prefix' => 'news', 'as' => 'admin.', 'middleware' => 'can:news'],function (){

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


        Route::group(['prefix' => 'teams', 'as' => 'admin.', 'middleware' => 'can:teams'],function (){

            Route::post('/media/delete', [TeamController::class, 'removeImage'])->name('teams.removeImage');

            Route::get('/index', [TeamController::class, 'index'])->name('teams');
            Route::get('/create', [TeamController::class, 'create'])->name('teams.create');
            Route::post('/store', [TeamController::class, 'store'])->name('teams.store');
            Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
            Route::patch('/update', [TeamController::class, 'update'])->name('teams.update');
            Route::delete('/delete', [TeamController::class, 'destroy'])->name('teams.delete');


        });
        ########################### teams Route  End ##############################

        ########################### careers Route Begin ##############################


        Route::group(['prefix' => 'careers', 'as' => 'admin.', 'middleware' => 'can:careers'],function (){

            Route::post('/media/delete', [CareerController::class, 'removeImage'])->name('careers.removeImage');

            Route::get('/index', [CareerController::class, 'index'])->name('careers');
            Route::post('/store', [CareerController::class, 'store'])->name('careers.store');
            Route::get('/show/{id}', [CareerController::class, 'show'])->name('careers.show');
            Route::delete('/delete', [CareerController::class, 'destroy'])->name('careers.delete');
            Route::get('/markAsReadc', [CareerController::class,'markAsReadc'])->name('markc');



        });
        ########################### careers Route  End ##############################

        ########################### mails Route Begin ##############################


        Route::group(['prefix' => 'mails', 'as' => 'admin.', 'middleware' => 'can:mails'],function (){

            Route::post('/media/delete', [MailController::class, 'removeImage'])->name('mails.removeImage');

            Route::get('/index', [MailController::class, 'index'])->name('mails');
            Route::post('/store', [MailController::class, 'store'])->name('mails.store');
            Route::get('/show/{id}', [MailController::class, 'show'])->name('mails.show');
            Route::delete('/delete', [MailController::class, 'destroy'])->name('mails.delete');
            Route::get('/markAsRead', [MailController::class,'markAsRead'])->name('mark');


        });
        ########################### mails Route  End ##############################


        ########################### roles Route Begin ##############################


        Route::group(['prefix' => 'roles', 'as' => 'admin.', 'middleware' => 'can:roles'],function (){


            Route::get('/index', [RoleController::class, 'index'])->name('roles');
            Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
            Route::patch('/update', [RoleController::class, 'update'])->name('roles.update');
            Route::delete('/delete', [RoleController::class, 'destroy'])->name('roles.delete');


        });
        ########################### roles Route  End ##############################



        ########################### users Route Begin ##############################


        Route::group(['prefix' => 'users', 'as' => 'admin.', 'middleware' => 'can:users'],function (){


            Route::get('/index', [AdminController::class, 'index'])->name('users');
            Route::get('/create', [AdminController::class, 'create'])->name('users.create');
            Route::post('/store', [AdminController::class, 'store'])->name('users.store');
            Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
            Route::patch('/update', [AdminController::class, 'update'])->name('users.update');
            Route::delete('/delete', [AdminController::class, 'destroy'])->name('users.delete');


        });
        ########################### users Route  End ##############################



        ########################### settings Route Begin ##############################


        Route::group(['prefix' => 'settings', 'as' => 'admin.', 'middleware' => 'can:settings'],function (){
            Route::post('/media/delete/login', [SettingsController::class, 'removeLoginImage'])->name('removeLoginImage');

            Route::post('/media/delete', [SettingsController::class, 'removeImage'])->name('profile.removeImage');

            Route::get('/account-setting', [SettingsController::class, 'account_settings'])->name('account_settings');
            Route::patch('account-setting/update', [SettingsController::class, 'updateAccount'])->name('account_settings.update');
            Route::get('setting/update', [SettingsController::class, 'settings'])->name('settings.update');
            Route::patch('setting/update', [SettingsController::class, 'settingsUpdate'])->name('settings.updatee');


        });
        ########################### settings Route  End ##############################


        ########################### job Route Begin ##############################


        Route::group(['prefix' => 'jobs', 'as' => 'admin.', 'middleware' => 'can:jobs'],function (){


            Route::get('/index', [CareerController::class, 'jobsIndex'])->name('jobs');
            Route::get('/create', [CareerController::class, 'jobsCreate'])->name('jobs.create');
            Route::post('/store', [CareerController::class, 'jobsStore'])->name('jobs.store');
            Route::get('/edit/{id}', [CareerController::class, 'jobsEdit'])->name('jobs.edit');
            Route::patch('/update', [CareerController::class, 'jobsUpdate'])->name('jobs.update');
            Route::delete('/delete', [CareerController::class, 'jobsDestroy'])->name('jobs.delete');


        });
        ########################### job Route  End ##############################


    });


});




