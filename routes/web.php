<?php

use App\Http\Controllers\AdminController;
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
Route::get('/content/news', [ContentController::class, 'news'])->name('content.news');
Route::get('/content/register', [ContentController::class, 'register'])->name('content.register');
Route::get('/content/loker', [ContentController::class, 'loker'])->name('content.loker');

/**
 * Admin
 */
Route::group(['prefix' => 'admin'],function(){    
    Route::get('/content/news', [ContentController::class, 'adminNews'])->name('admin.news');
    Route::get('/content/register', [ContentController::class, 'adminRegister'])->name('admin.register');
    Route::get('/content/loker', [ContentController::class, 'adminLoker'])->name('admin.loker');
    
    Route::get('/content/createForm', [ContentController::class, 'createContentForm'])->name('admin.createContentForm');
    Route::get('/content/editForm/{id}', [ContentController::class, 'editContentForm'])->name('admin.editContentForm');
    Route::post('/content/store', [ContentController::class, 'store'])->name('admin.contentStore');
    Route::post('/content/update/{id}', [ContentController::class, 'update'])->name('admin.contentUpdate');
    Route::post('/content/delete/{id}', [ContentController::class, 'delete'])->name('admin.contentDelete');
});

