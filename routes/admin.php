<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\WalletTrabsactionController;
use App\Http\Controllers\Admin\WithdrawRequestController;
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
Route::group(['middleware' => 'guest:admin', 'prefix' => '/admin'], function () use ($prefix) {
    // Route Login
    Route::get('login', [AuthController::class, 'view'])->name($prefix . 'view_login');
    Route::post('login', [AuthController::class, 'login'])->name($prefix . 'login');

});

Route::group(['middleware' => 'auth:admin', 'prefix' => '/admin'],function() use ($prefix){

    Route::post('logout', [AuthController::class, 'logout'])->name($prefix . 'logout');
    Route::get('lang', [LangController::class, 'changeLang'])->name($prefix . 'lang');
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

    Route::name('admin.')->group(function () {
        Route::resource('cities', CityController::class)->except(['show']);
        Route::resource('levels', LevelController::class)->except(['show']);
        Route::resource('courses', CourseController::class)->except(['show']);
        Route::post('courses/change-active', [CourseController::class, 'changeActive'])->name('courses.changeActive');

        Route::resource('lectures', LectureController::class)->except(['show']);
        Route::post('lectures/change-active', [LectureController::class, 'changeActive'])->name('lectures.changeActive');

        Route::resource('students', StudentController::class)->except(['show']);
        Route::post('students/change-status', [StudentController::class, 'changeStatus'])->name('students.changeStatus');
        Route::get('students/trashlist', [StudentController::class, 'trashlist'])->name('students.trashlist');
        Route::get('students/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
        Route::delete('students/hard-delete/{id}', [StudentController::class, 'hardDelete'])->name('students.hard-delete');
        Route::post('students/delete-students', [StudentController::class, 'deleteStudents'])->name('students.delete-students');
        Route::post('students/reset-wallets', [StudentController::class, 'resetWallets'])->name('students.reset-wallets');
        Route::post('students/active-students', [StudentController::class, 'activeStudents'])->name('students.active-students');
        Route::post('students/deactive-students', [StudentController::class, 'deactiveStudents'])->name('students.deactive-students');


        Route::resource('lessons', LessonController::class)->except(['show']);
        Route::post('lessons/change-active', [LessonController::class, 'changeActive'])->name('lessons.changeActive');

        Route::resource('faqs', FaqController::class)->except(['show']);

        Route::resource('withdraw_requests', WithdrawRequestController::class)->except(['show']);
        Route::post('withdraw_requests/change-status', [WithdrawRequestController::class, 'changeStatus'])->name('withdraw_requests.changeStatus');

        // Route::resource('wallet_transactions', WalletTrabsactionController::class)->except(['show', 'destroy']);
        Route::get('wallet_transactions/create/{withdraw_request}', [WalletTrabsactionController::class, 'create'])->name('wallet_transactions.create');
        Route::post('wallet_transactions/store', [WalletTrabsactionController::class, 'store'])->name('wallet_transactions.store');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('saveSettings', [SettingController::class, 'saveSettings'])->name('settings.saveSettings');

        Route::resource('roles', RoleController::class)->except(['show']);
        Route::resource('admins', AdminController::class)->except(['show']);

    });

});



