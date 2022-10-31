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

Route::view('/dashboard', 'authorization')
    ->name('dashboard');

Route::get('/cabinet', [CabinetController::class, 'cabinet'])
    ->name('cabinet');

Route::get('/', [HomeController::class, 'home']);

Route::get('/test', [TestController::class, 'test']);


Route::post('/file/upload', [FileController::class, 'file'])
    ->name('fileUpload');

Route::post('/advertisement/create', [AdvertisementAddController::class, 'addAdvert']);

Route::post('/login', [AuthorizationController::class, 'login']);
