<?php

use App\Http\Controllers\Api\IncomingController;
use App\Http\Controllers\Api\NotificationController;
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
Route::get('/notifications', [NotificationController::class, 'index']);
Route::get('/incomings/cod', [IncomingController::class, 'getCod']);
Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy']);
