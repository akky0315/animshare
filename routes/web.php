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

Route::get('/', [ProfileController::class, 'home']);
Route::get('/profile', [ProfileController::class, 'information']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::put('/profile', [ProfileController::class, 'update']);
Route::get('/display', [AnimController::class, 'index']);
