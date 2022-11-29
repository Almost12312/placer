<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdvResourceController;
use App\Http\Middleware\Authorization;
use App\Http\Middleware\CreateMDW;
use App\Http\Middleware\Redaction;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\AdvFileResourse;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
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
Route::post('/logout', [AuthorizationController::class, 'logout']);

Route::view('/registration', 'registration')
    ->name('registration');
// Resource
Route::post('/reg-or-update', [AuthorizationController::class, 'reg']);


Route::get('/cabinet', [CabinetController::class, 'cabinet'])
    ->name('cabinet')
    ->middleware(Authorization::class);
//Resource
Route::post('/profile', [CabinetController::class, 'profile']);
Route::post('/file/upload-avatar', [CabinetController::class, 'changeAvatar'])
    ->name('avatar');


Route::post('/advertisement/create', [AdvertisementController::class, 'addAdvert'])
    ->name('createPostAdvert');

Route::post('/advertisement/change-status', [AdvertisementController::class, 'changeStatus'])
    ->name('draftAdvert');

Route::view('/advertisement/create', 'redAdvert')
    ->name('createBladeAdvert')
    ->middleware(CreateMDW::class);

Route::get('/advertisement/{id?}/redaction', [AdvertisementController::class, 'view'])
    ->name('addAdvert')
    ->middleware(Redaction::class);

Route::post('/preview/get-imgs', [FileController::class, 'getCurrentFile'])
    ->name('getCurrentImgs');

Route::post('/file/upload', [FileController::class, 'file'])
    ->name('fileUpload');

Route::post('/advertisement/delete', [AdvertisementController::class, 'delAdvert']);






Route::get('/test', [TestController::class, 'test']);

Route::post('/load-adv', [AdvResourceController::class, 'res']);
