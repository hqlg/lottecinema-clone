<?php

use App\Http\Controllers\Api\ApiAreaController;
use App\Http\Controllers\Api\ApiCinemaController;
use App\Http\Controllers\Api\ApiCommentController;
use App\Http\Controllers\Api\ApiCustomerController;
use App\Http\Controllers\Api\ApiGiftCategoryController;
use App\Http\Controllers\Api\ApiGiftController;
use App\Http\Controllers\Api\ApiMovieController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\Api\ApiOrderDetailController;
use App\Http\Controllers\Api\ApiSeatController;
use App\Http\Controllers\Api\ApiSeatPositionController;
use App\Http\Controllers\Api\ApiSeatTypeController;
use App\Http\Controllers\Api\ApiTagController;
use App\Http\Controllers\Api\ApiTimeController;
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
    'areas' => ApiAreaController::class,
    'cinemas' => ApiCinemaController::class,
    'movies' => ApiMovieController::class,
    'seats' => ApiSeatController::class,
    'seat-positions' => ApiSeatPositionController::class,
    'seat-types' => ApiSeatTypeController::class,
    'order-details' => ApiOrderDetailController::class,
    'orders' => ApiOrderController::class,
    'gifts' => ApiGiftController::class,
    'gift-categories' => ApiGiftCategoryController::class,
    'tags' => ApiTagController::class,
    'customers' => ApiCustomerController::class,
    'comments' => ApiCommentController::class,
    'times' => ApiTimeController::class,
]);
