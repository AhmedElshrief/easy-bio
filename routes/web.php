<?php

use App\Http\Controllers\front\HomeController;
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
Route::get('/courses', [HomeController::class, 'index'])->name($prefix . 'courses');
Route::get('/courses/{id}', [HomeController::class, 'index'])->name($prefix . 'showCourses');
Route::get('/lectures', [HomeController::class, 'index'])->name($prefix . 'lectures');
Route::get('/lectures/{id}', [HomeController::class, 'index'])->name($prefix . 'showLectures');
Route::get('/lessons', [HomeController::class, 'index'])->name($prefix . 'lessons');
Route::get('/lessons/{id}', [HomeController::class, 'index'])->name($prefix . 'showLessons');
Route::get('/contact', [HomeController::class, 'contact'])->name($prefix . 'contact');
