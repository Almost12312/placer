<?php

use App\Http\Controllers\AdvertisementAddController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authorization;
use App\Http\Middleware\CreateMDW;
use App\Http\Middleware\Redaction;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FileController;
use \App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdController;

Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::view('/authorization', 'authorization')
    ->name('authorization');

Route::post('/login', [AuthorizationController::class, 'login']);

Route::view('/registration', 'registration');

Route::get('/cabinet', [CabinetController::class, 'cabinet'])
    ->name('cabinet')
    ->middleware(Authorization::class);



Route::post('/advertisement/create', [AdvertisementAddController::class, 'addAdvert'])
    ->name('createPostAdvert');

Route::view('/advertisement/create', 'addAdvert')
    ->name('createBladeAdvert')
    ->middleware(CreateMDW::class);

Route::get('/advertisement/{id?}/redaction', [AdvertisementAddController::class, 'view'])
    ->name('addAdvert')
    ->middleware(Redaction::class);

Route::post('/file/upload', [FileController::class, 'file'])
    ->name('fileUpload');

Route::post('/advertisement/delete', [AdvertisementAddController::class, 'delAdvert']);


Route::get('/test', [TestController::class, 'test']);
