<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CareerController::class, 'index']);
Route::post('/recommend-career', [CareerController::class, 'recommend']);