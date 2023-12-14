<?php

use App\Models\DashPackage;
use App\Models\DashCategory;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MineController;
use App\Http\Controllers\DashPackageController;
use App\Http\Controllers\DashCategoryController;

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


Route::get('/', [MineController::class , 'index']);
Route::get('/tour', [MineController::class , 'tour'])->name('tour');
Route::get('/tour/category/{single_category:slug}', [MineController::class , 'single_category'])->name('single_category');
Route::get('/tour/package/{single_package:slug}', [MineController::class , 'single_package'])->name('single_package');


Route::middleware('guest')->group(function () {
    Route::get('/dash/login', [AuthController::class , 'index_login'])->name('login');
    Route::post('/dash/login', [AuthController::class , 'auth_login'])->name('auth_login');
});

Route::get('/dash/logout', [AuthController::class , 'abort']);
Route::middleware('auth')->group(function () {
    Route::post('/dash/logout', [AuthController::class , 'auth_logout'])->name('auth_logout');
    Route::post('/dash/changepw', [AuthController::class , 'changepw'])->name('changepw');
    Route::get('/dash/changepw', [AuthController::class , 'abort']);

    Route::resources([
        'dash/category' => DashCategoryController::class,
        'dash/package'   => DashPackageController::class,
    ]);
    
    Route::get('/dash', function () {
        return view('dash/home' , [
            'category' => DashCategory::all(),
            'package' => DashPackage::all(),
        ]);
    })->name('dashboard');
});
