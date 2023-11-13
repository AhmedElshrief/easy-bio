<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

$prefix = 'front.';
Route::get('/', [HomeController::class, 'index'])->name($prefix . 'home');
Route::get('/courses', [HomeController::class, 'courses'])->name($prefix . 'courses');
Route::get('/courses/{id}', [HomeController::class, 'viewCourse'])->name($prefix . 'showCourses');
// Route::get('/lectures', [HomeController::class, 'index'])->name($prefix . 'lectures');
Route::get('/lectures/{id}', [HomeController::class, 'viewLecture'])->name($prefix . 'showLecture');
Route::get('/lessons', [HomeController::class, 'index'])->name($prefix . 'lessons');
Route::get('/lessons/{id}', [HomeController::class, 'index'])->name($prefix . 'showLessons');
Route::get('/contact', [HomeController::class, 'contact'])->name($prefix . 'contact');
Route::post('/buy-lesson', [HomeController::class, 'buyLesson'])->name($prefix . 'buyLesson');
Route::get('/withdraw', [HomeController::class, 'withdraw'])->name($prefix . 'withdraw');
Route::post('/withdraw', [HomeController::class, 'StoreWithdraw'])->name($prefix . 'withdraw.store');
