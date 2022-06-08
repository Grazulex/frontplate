<?php

use App\Http\Controllers\CashController;
use App\Http\Controllers\CloseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomingController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/productions/print/{production}', [ProductionController::class, 'print'])->name('productions.print');
    Route::resource('plates', PlateController::class)->except(['create', 'store', 'edit', 'update']);
    Route::resource('productions', ProductionController::class)->only(['index', 'show']);
    Route::resource('cashes', CashController::class)->except(['show']);
    Route::resource('closes', CloseController::class)->except(['edit', 'update']);
    Route::resource('receptions', ReceptionController::class);
    Route::resource('customers', CustomerController::class)->except(['show']);
    Route::get('/incomings/step2/{incoming}', [IncomingController::class, 'step2'])->name('incomings.step2');
    Route::resource('incomings', IncomingController::class)->except(['edit', 'update']);
    Route::get('/users/{user}/password', [UserController::class, 'editPassword'])->name('users.edit.password');
    Route::post('/users/{user}/password', [UserController::class, 'updatePassword'])->name('users.update.password');
    Route::resource('users', UserController::class);
});
require __DIR__.'/auth.php';
