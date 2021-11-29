<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\PracticeController;
use App\Models\Practice;
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
    return view('welcome');
});

Route::get('/accueil', [HomePage::class, 'index'])->name('homepage');
Route::get('practice/{id}', [PracticeController::class, 'show'])->name('practice.show');

// github authentication
Route::get('/login/github', [LoginController::class, 'redirectToProvider']);
Route::get('/login/github/callback', [LoginController::class, 'handleProviderCallback']);

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');
