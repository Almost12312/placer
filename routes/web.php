<?php

use App\Http\Controllers\AdvertisementAddController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FileController;
use \App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\TestController;

Route::view('/authorization', 'authorization')
    ->name('authorization');

Route::view('/registration', 'registration');

Route::view('/dashboard', 'authorization')
    ->name('dashboard');

Route::get('/cabinet', [CabinetController::class, 'cabinet'])
    ->name('cabinet');

Route::get('/', [HomeController::class, 'home'])
    ->name('home');

Route::post('/login', [AuthorizationController::class, 'login']);

Route::get('/test', [TestController::class, 'test']);


Route::post('/file/upload', [FileController::class, 'file'])
    ->name('fileUpload');


Route::post('/advertisement/delete', [AdvertisementAddController::class, 'delAdvert']);

Route::post('/advertisement/redaction', [AdvertisementAddController::class, 'redAdvert']);

Route::post('/advertisement/create', [AdvertisementAddController::class, 'addAdvert']);
Route::get('/advertisement/create', [AdvertisementAddController::class, 'view'])
    ->name('addAdvert');

Route::post('/advertisement/view', [AdvertisementAddController::class, 'view'])
    ->name('thisAdv');
