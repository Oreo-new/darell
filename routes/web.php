<?php

use App\Http\Controllers\PageController;
// use App\Http\Controllers\VideoController;
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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/study-guide', [PageController::class, 'study'])->name('study-guide');
Route::get('/end-times', [PageController::class, 'end'])->name('end-times');
Route::get('/current-events', [PageController::class, 'current'])->name('current-events');
Route::post('/contact-us', [ PageController::class , 'submitForm' ] )->name('contact-us');

Route::post('/comment', [PageController::class, 'store'])->name('comments');

// Route::get('/download', [VideoController::class, 'downloadVideo']);