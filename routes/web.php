<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\PracticeController;
use App\Models\Practice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Livewire\ShowDomainsPractices;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\ReferenceController;

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

Route::get('/domains', [DomainController::class, 'index'])->name('domains');
Route::get('/domain/{domain}', [DomainController::class, 'byDomain'])->name('domain.domain');

// github authentication
Route::get('/login/github', [LoginController::class, 'redirectToProvider'])->name('login.github');
Route::get('/login/github/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/', [HomePage::class, 'index'])->name('homepage');
Route::resource('user', UserController::class);
Route::post('/opinion/{practice_id}/create', [OpinionController::class, 'store'])->name('opinion.store');
Route::get('/opinion/{id}/delete', [OpinionController::class, 'delete'])->name('opinion.delete');

Route::get('/practices', [PracticeController::class, 'index'])->name('practices.index');
Route::get('/practice/{id}', [PracticeController::class, 'show'])->name('practice.show');

Route::get('/opinion/{id}/upvote', [OpinionController::class, 'upvote'])->name('opinion.upvote');
Route::get('/opinion/{id}/downvote', [OpinionController::class, 'downvote'])->name('opinion.downvote');
Route::post('/opinion/{id}/comment', [OpinionController::class, 'comment'])->name('opinion.comment');

Route::resource('references', ReferenceController::class);

require __DIR__.'/auth.php';