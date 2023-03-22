<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/links', [LinkController::class, 'show'])->name('links.show');
Route::post('/links', [LinkController::class, 'send'])->where('prefix', '\w+')->name('links.send');
Route::get('/links/{prefix}', [LinkController::class, 'away'])->name('links.away');
Auth::routes();

