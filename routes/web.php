<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

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

/**
 * Landing Page
 */
Route::get('/', [LandingPageController::class, 'index'])->name('landingPage.index');

/**
 * News Page
 */
Route::get('/news', [ContentController::class, 'index'])->name('news.index');