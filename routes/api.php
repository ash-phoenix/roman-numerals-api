<?php

use App\Http\Controllers\Api\IntegerConversionController;
use Illuminate\Http\Request;
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

Route::get('/conversion/latest/{type?}', [IntegerConversionController::class, 'latest']);
Route::get('/conversion/popular/{type?}', [IntegerConversionController::class, 'popular']);
Route::post('/conversion/convert', [IntegerConversionController::class, 'store']);
