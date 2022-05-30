<?php

use App\Http\Controllers\CashController;
use App\Http\Controllers\CloseController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\ProductionController;
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
    return View('pages.index');
});

Route::get('/productions/print/{production}', [ProductionController::class, 'print'])->name('productions.print');
Route::resource('plates', PlateController::class)->except(['create', 'store', 'edit', 'update']);
Route::resource('productions', ProductionController::class)->only(['index', 'show']);
Route::resource('cashes', CashController::class)->except(['show']);
Route::resource('closes', CloseController::class)->except(['edit', 'update']);;
