<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VoterController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/', [DashboardController::class, 'vote'])->name('vote');






Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // CRUD Candidates
    Route::get('/admin/candidates', [AdminController::class, 'candidates'])->name('candidate');
    Route::get('/admin/candidates/create', [AdminController::class, 'createCandidate'])->name('candidate.create');
    Route::post('/admin/candidates', [AdminController::class, 'storeCandidate'])->name('candidate.store');
    Route::get('/admin/candidates/{id}/edit', [AdminController::class, 'editCandidate'])->name('candidate.edit');
    Route::put('/admin/candidates/{id}', [AdminController::class, 'updateCandidate'])->name('candidate.update');
    Route::delete('/admin/candidates/{id}', [AdminController::class, 'deleteCandidate'])->name('candidate.destroy');
    Route::get('/admin/voters', [VoterController::class, 'index'])->name('voter');
    Route::get('/admin/voters/create', [VoterController::class, 'create'])->name('voter.create');
    Route::post('/admin/candidates', [VoterController::class, 'store'])->name('voter.store');
    Route::delete('/admin/voters/{id}', [VoterController::class, 'destroy'])->name('voter.destroy');
});




