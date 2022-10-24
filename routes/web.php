<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FileController;
use \App\Http\Controllers\AuthorizationController;

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
Route::view('/authorization', 'authorization')
    ->name('authorization');

Route::view('/dashboard', 'authorization')
    ->name('dashboard');

Route::view('/cabinet', 'cabinet')
    ->name('cabinet');

Route::get('/', function () {
    return view('home');
});

Route::post('/file', [FileController::class, 'file']);

Route::post('/login', [AuthorizationController::class, 'login']);
