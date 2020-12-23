<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\CinemaController;
use App\Http\Controllers\Api\GiftCategoryController;
use App\Http\Controllers\Api\GiftController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\MovieSticketController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderDetailController;
use App\Http\Controllers\Api\SeatController;
use App\Http\Controllers\Api\SeatPositionController;
use App\Http\Controllers\Api\TypeSeatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources([
    'areas' => AreaController::class,
    'cinemas' => CinemaController::class,
    'movies' => MovieController::class,
    'movie-stickets' => MovieSticketController::class,
    'seats' => SeatController::class,
    'seat-positions' => SeatPositionController::class,
    'type-seats' => TypeSeatController::class,
    'order-details' => OrderDetailController::class,
    'orders' => OrderController::class,
    'gifts' => GiftController::class,
    'gift-categories' => GiftCategoryController::class
]);
