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

Route::get('/', [CareerController::class, 'home'])->name('home');
Route::get('/index', [CareerController::class, 'index'])->name('index');
Route::post('/result', [CareerController::class, 'recommend'])->name('result');