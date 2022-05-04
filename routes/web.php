<?php

use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\MailController;
use App\Http\Controllers\Frontend\SiteController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


Route::group(['prefix' => 'hfmec'],function (){


    Route::get('/',[SiteController::class,'index'])->name('index');
    Route::get('/about-introduction',[SiteController::class,'introduction'])->name('introduction');
    Route::get('/about-vision&values',[SiteController::class,'vv'])->name('vv');
    Route::get('/about-expertise-summary',[SiteController::class,'es'])->name('es');
    Route::get('/about-ims-policy',[SiteController::class,'ims'])->name('ims');
    Route::get('/about-iso-certificates',[SiteController::class,'iso'])->name('iso');
    Route::get('/about-office-team',[SiteController::class,'team'])->name('team');
    Route::get('/about-team-details/{slug}',[SiteController::class,'teamDetails'])->name('teamDetails');
    Route::get('/service/{slug}',[SiteController::class,'service'])->name('service');

    Route::get('/projects/ongoing',[SiteController::class,'ongoing'])->name('ongoing');
    Route::get('/projects/completed',[SiteController::class,'completed'])->name('completed');
    Route::get('/projects/last10years',[SiteController::class,'last10years'])->name('last10years');
    Route::get('/projects/clients',[SiteController::class,'clients'])->name('clients');
    Route::get('/projects/{slug}',[SiteController::class,'projects'])->name('projects');

    Route::get('/office-news',[SiteController::class,'news'])->name('news');

    Route::get('/contact',[SiteController::class,'getContact'])->name('getContact');
    Route::post('/contact',[MailController::class,'store'])->name('contact');
    Route::get('/career',[SiteController::class,'getCareer'])->name('getCareer');
    Route::get('/download_attachment/{filename}',[CareerController::class,'download_attachment'])->name('admin.download_attachment');


});});
