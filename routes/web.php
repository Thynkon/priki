<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\PracticeController;
use App\Models\Practice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Livewire\ShowDomainsPractices;
use App\Http\Controllers\UserController;

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

//Route::get('/', [HomePage::class, 'index'])->name('homepage');
Route::get('practice/{id}', [PracticeController::class, 'show'])->name('practice.show');
Route::get('/domains', [DomainController::class, 'index'])->name('domains');
Route::get('/domain/{domain}', [DomainController::class, 'byDomain'])->name('domain.domain');

// github authentication
Route::get('/login/github', [LoginController::class, 'redirectToProvider'])->name('login.github');
Route::get('/login/github/callback', [LoginController::class, 'handleProviderCallback']);


Route::get('/', [HomePage::class, 'index'])->name('homepage');
Route::resource('user', UserController::class);

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');
*/

require __DIR__.'/auth.php';