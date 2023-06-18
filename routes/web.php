<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimController;

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
Route::get('/', [ProfileController::class, 'welcome']);
Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profiles/create', [ProfileController::class, 'create']);
Route::get('/profiles/{profile}/complete', [ProfileController::class, 'complete']);
Route::post('/profiles', [ProfileController::class, 'store']);
Route::get('/profiles/{profile}/home', [ProfileController::class, 'home']);
Route::get('/profiles/{profile}', [ProfileController::class, 'information']);
Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit']);
Route::put('/profiles/{profile}', [ProfileController::class, 'update']);

Route::get('/profiles/{profile}/anims/create', [AnimController::class, 'create']);
Route::get('/profiles/{profile}/anims/display', [AnimController::class, 'display']);
Route::get('/profiles/{profile}/anims/edit', [AnimController::class, 'edit']);
Route::get('/profiles/{profile}/anims/{anim}/create/check', [AnimController::class, 'check']);
Route::post('/profiles/{profile}/anims/{anim}/create', [AnimController::class, 'index3']);
Route::post('/profiles/{profile}/anims/{anim}', [AnimController::class, 'insert']);
Route::post('/profiles/{profile}/create', [AnimController::class, 'get']);

Route::get('/display', [AnimController::class, 'index']);

