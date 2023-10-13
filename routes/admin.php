<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LangController;
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

// Route::get('/', function () {
//     return view('admin.home.index');
// });

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
        // Route::resource('countries', CountryController::class)->except(['show']);

        // Route::resource('customers', CustomerController::class)->except(['show', 'create', 'store']);
        // Route::post('customers/changeGuest', [CustomerController::class, 'changeGuest'])->name('customers.changeGuest');
        // Route::post('customers/changeStatus', [CustomerController::class, 'changeStatus'])->name('customers.changeStatus');
        // Route::resource('admins', AdminController::class)->except(['show']);

    });


//     // // route of products
//     // Route::group(['prefix' => '/products'], function () use ($prefix) {
//     //     Route::controller('ProductController')->group(function () use ($prefix)  {
//     //         Route::get('/', 'index')->name($prefix.'product.index');
//     //         Route::get('/create', 'create')->name($prefix.'product.create');
//     //         Route::post('/store', 'store')->name($prefix.'product.store');
//     //         Route::get('/edit/{id}', 'edit')->name($prefix.'product.edit');
//     //         Route::post('/update/{id}', 'update')->name($prefix.'product.update');
//     //         Route::delete('/delete/{id}', 'destroy')->name($prefix.'product.delete');
//     //     });
//     // });

//     // Route::group(['prefix' => '/fields'], function () use ($prefix) {
//     //     Route::controller('FieldController')->group(function () use ($prefix)  {
//     //         Route::get('/', 'index')->name($prefix.'field.index');
//     //         Route::get('/create', 'create')->name($prefix.'field.create');
//     //         Route::post('/store', 'store')->name($prefix.'field.store');
//     //         Route::get('/edit/{id}', 'edit')->name($prefix.'field.edit');
//     //         Route::post('/update/{id}', 'update')->name($prefix.'field.update');
//     //         Route::delete('/delete/{id}', 'destroy')->name($prefix.'field.delete');
//     //         Route::post('/statusChange', 'statusChange')->name($prefix.'field.statusChange');

//     //     });
//     // });



//     // Route::group(['prefix' => '/languages'], function () use ($prefix) {
//     //     Route::controller('LanguageContoller')->group(function () use ($prefix)  {
//     //         Route::get('/', 'index')->name($prefix.'language.index');
//     //         Route::get('/create', 'create')->name($prefix.'language.create');
//     //         Route::post('/store', 'store')->name($prefix.'language.store');
//     //         Route::get('/edit/{id}', 'edit')->name($prefix.'language.edit');
//     //         Route::post('/update/{id}', 'update')->name($prefix.'language.update');
//     //         Route::delete('/delete/{id}', 'destroy')->name($prefix.'language.delete');

//     //     });
//     // });


//     // Route::group(['prefix' => '/words-translation'], function () use ($prefix) {
//     //     Route::controller('WordTranslationController')->group(function () use ($prefix)  {
//     //         Route::get('/', 'index')->name($prefix.'translation.index');
//     //         Route::post('/save-Translations', 'saveTranslations')->name($prefix.'translation.saveTranslations');

//     //     });
//     // });

//     // Route::group(['prefix' => '/settings'], function () use ($prefix) {
//     //     Route::controller('SettingController')->group(function () use ($prefix)  {
//     //         Route::get('/', 'index')->name($prefix.'settings.index');
//     //         Route::post('saveSettings', 'saveSettings')->name($prefix.'settings.saveSettings');
//     //     });
//     // });


//     //  //role routes
//     //  Route::group(['prefix' => 'roles'], function () use ($prefix) {
//     //     Route::controller(RoleController::class)->group(function () use ($prefix) {
//     //         Route::get('/', 'index')->name($prefix . 'role.index');
//     //         Route::get('/create', 'create')->name($prefix . 'role.create');
//     //         Route::post('/store', 'store')->name($prefix . 'role.store');
//     //         Route::get('/edit/{id}', 'edit')->name($prefix . 'role.edit');
//     //         Route::post('/update/{id}', 'update')->name($prefix . 'role.update');
//     //         Route::delete('/destroy/{id}', 'destroy')->name($prefix . 'role.delete');
//     //     });
//     // });

//     // //admins routes
//     // Route::group(['prefix' => 'admins'], function () use ($prefix) {
//     //     Route::controller(AdminController::class)->group(function () use ($prefix) {
//     //         Route::get('/', 'index')->name($prefix . 'admin.index');
//     //         Route::get('/create', 'create')->name($prefix . 'admin.create');
//     //         Route::post('/store', 'store')->name($prefix . 'admin.store');
//     //         Route::get('/edit/{id}', 'edit')->name($prefix . 'admin.edit');
//     //         Route::post('/update/{id}', 'update')->name($prefix . 'admin.update');
//     //         Route::delete('/destroy/{id}', 'destroy')->name($prefix . 'admin.delete');
//     //     });
//     // });

//     // //admins routes
//     // Route::group(['prefix' => 'users'], function () use ($prefix) {
//     //     Route::controller(UserController::class)->group(function () use ($prefix) {
//     //         Route::get('/', 'index')->name($prefix . 'user.index');
//     //         Route::delete('/destroy/{id}', 'destroy')->name($prefix . 'user.delete');
//     //     });
//     // });

});



