<?php

use App\Http\Controllers\AdvertisementAddController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authorization;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FileController;
use \App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdController;

Route::view('/authorization', 'authorization')
    ->name('authorization');

Route::view('/registration', 'registration');

Route::view('/dashboard', 'authorization')
    ->name('dashboard');

Route::get('/cabinet', [CabinetController::class, 'cabinet'])
    ->name('cabinet')
    ->middleware(Authorization::class);

Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::post('/login', [AuthorizationController::class, 'login']);

Route::get('/test', [TestController::class, 'test']);


Route::post('/file/upload', [FileController::class, 'file'])
    ->name('fileUpload');


//Route::get('/advertisement/{id}/edit', [AdController::class, 'edit']);


Route::post('/advertisement/delete', [AdvertisementAddController::class, 'delAdvert']);

//Route::get('/advertisement/redaction', [AdvertisementAddController::class, 'redAdvert']);

Route::post('/advertisement/create', [AdvertisementAddController::class, 'addAdvert'])
    ->name('createPostAdvert');
Route::view('/advertisement/create', 'addAdvert')
    ->name('createBladeAdvert');

Route::get('/advertisement/{id?}/redaction', [AdvertisementAddController::class, 'view'])
    ->name('addAdvert');

Route::post('/advertisement/view', [AdvertisementAddController::class, 'view'])
    ->name('thisAdv');
