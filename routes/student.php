<?php

use App\Http\Controllers\Student\AuthController;
use App\Http\Controllers\Student\FaqController;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\LangController;
use App\Http\Controllers\Student\LessonController;
use App\Http\Controllers\Student\ProfileController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$prefix = 'student.';

// // Before Login Dashboard Routes
Route::group(['middleware' => 'guest:student', 'prefix' => '/student'], function () use ($prefix) {
    // Route Login
    Route::get('login', [AuthController::class, 'view'])->name($prefix . 'view_login');
    Route::post('login', [AuthController::class, 'login'])->name($prefix . 'login');
    Route::get('register', [AuthController::class, 'registerForm'])->name($prefix . 'register');
    Route::post('register', [AuthController::class, 'register'])->name($prefix . 'register.store');

});

Route::group(['middleware' => 'auth:student', 'prefix' => '/student'],function() use ($prefix){

    Route::post('logout', [AuthController::class, 'logout'])->name($prefix . 'logout');
    Route::get('lang', [LangController::class, 'changeLang'])->name($prefix . 'lang');
    Route::get('/', [HomeController::class, 'index'])->name('student.home');

    Route::name('student.')->group(function () {


        Route::get('lessons/download/{id}', [LessonController::class, 'downloadFile'])->name('lessons.download');
        Route::resource('lessons', LessonController::class)->only(['index', 'show']);

        Route::resource('faqs', FaqController::class)->only(['index', 'show']);

        Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('updateProfile/{user}', [ProfileController::class, 'updateProfile'])->name('profile.update');

    });

});



