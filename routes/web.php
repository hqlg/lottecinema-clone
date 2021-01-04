<?php

use App\Http\Controllers\Admin\AdminAreaController;
use App\Http\Controllers\Admin\AdminCinemaController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminGiftCategoryController;
use App\Http\Controllers\Admin\AdminGiftController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminSeatController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminTimeController;
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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminDashboardController::class, 'index']);
    Route::resources([
        'areas' => AdminAreaController::class,
        'cinemas' => AdminCinemaController::class,
        'movies' => AdminMovieController::class,
        'gifts' => AdminGiftController::class,
        'gift-categories' => AdminGiftCategoryController::class,
        'times' => AdminTimeController::class,
        'tags' => AdminTagController::class,
        'seats' => AdminSeatController::class,
        'rooms' => AdminRoomController::class,
        'customers' => AdminCustomerController::class,
        'orders' => AdminOrderController::class,
    ]);
});
