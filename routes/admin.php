<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\Admin\LevelController;
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

$prefix = 'admin.';

// // Before Login Dashboard Routes
Route::group(['middleware' => 'guest:admin'], function () use ($prefix) {
    // Route Login
    Route::get('login', [AuthController::class, 'view'])->name($prefix . 'view_login');
    Route::post('login', [AuthController::class, 'login'])->name($prefix . 'login');

});

Route::group(['middleware' => 'auth:admin'],function() use ($prefix){

    Route::post('logout', [AuthController::class, 'logout'])->name($prefix . 'logout');
    Route::get('lang', [LangController::class, 'changeLang'])->name($prefix . 'lang');
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');

    Route::name('admin.')->group(function () {
        Route::resource('cities', CityController::class)->except(['show']);
        Route::resource('levels', LevelController::class)->except(['show']);
        Route::resource('courses', CourseController::class)->except(['show']);
        Route::post('courses/change-active', [CourseController::class, 'changeActive'])->name('courses.changeActive');

        Route::resource('lectures', LectureController::class)->except(['show']);
        Route::post('lectures/change-active', [LectureController::class, 'changeActive'])->name('lectures.changeActive');

        // Route::resource('customers', CustomerController::class)->except(['show', 'create', 'store']);
        // Route::post('customers/changeGuest', [CustomerController::class, 'changeGuest'])->name('customers.changeGuest');
        // Route::post('customers/changeStatus', [CustomerController::class, 'changeStatus'])->name('customers.changeStatus');
        // Route::resource('admins', AdminController::class)->except(['show']);

    });

});



