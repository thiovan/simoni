<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\TypeController;
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

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () { 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/report', [DashboardController::class, 'report'])->name('report');
    Route::post('/update', [DashboardController::class, 'update'])->name('update');

    Route::get('/keyword', [KeywordController::class, 'index'])->name('keyword');
    Route::post('/keyword/add', [KeywordController::class, 'add']);
    Route::post('/keyword/update', [KeywordController::class, 'update']);
    Route::get('/keyword/delete/{uuid}', [KeywordController::class, 'delete']);

    Route::get('/type', [TypeController::class, 'index'])->name('type');
    Route::post('/type/add', [TypeController::class, 'add']);
    Route::post('/type/update', [TypeController::class, 'update']);
    Route::get('/type/delete/{uuid}', [TypeController::class, 'delete']);

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category/add', [CategoryController::class, 'add']);
    Route::post('/category/update', [CategoryController::class, 'update']);
    Route::get('/category/delete/{uuid}', [CategoryController::class, 'delete']);
});

Route::get('/playground', [PlaygroundController::class, 'index']);