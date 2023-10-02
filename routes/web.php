<?php

use App\Http\Controllers\CosplayController;
use App\Http\Controllers\HqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () { return view('welcome'); });
Route::get('/privacity-police', function() { return view('privacity_police'); });

Route::middleware('auth')->group(function () {
    Route::get('/home', function () { return view('home'); })->name('home');

    Route::post('/votes', [VoteController::class, 'vote'])->name('votes.vote');
    Route::get('/votes/score', [VoteController::class, 'score'])->name('votes.score');
    Route::put('/votes/update', [VoteController::class, 'update'])->name('votes.update');
    Route::delete('/votes/delete', [VoteController::class, 'delete'])->name('votes.delete');

    Route::get('/cosplays', [CosplayController::class, 'index'])->name('cosplays.index');
    // Route::get('/cosplays/{class}/{filters}', [CosplayController::class, 'classIndex'])->name('cosplays.class.index');
    Route::get('/cosplays/create', [CosplayController::class, 'create'])->name('cosplays.create');
    Route::get('/cosplays/{id}/edit', [CosplayController::class, 'edit'])->name('cosplays.edit');
    Route::get('/cosplays/{id}', [CosplayController::class, 'show'])->name('cosplays.show');
    Route::post('/cosplays', [CosplayController::class, 'store'])->name('cosplays.store');
    Route::put('/cosplays/{id}', [CosplayController::class, 'update'])->name('cosplays.update');
    Route::delete('/cosplays/{id}', [CosplayController::class, 'destroy'])->name('cosplays.destroy');

    Route::get('/hqs', [HqController::class, 'index'])->name('hqs.index');
    // Route::get('/hqs/{class}/{filters}', [HqController::class, 'classIndex'])->name('hqs.class.index');
    Route::get('/hqs/create', [HqController::class, 'create'])->name('hqs.create');
    Route::get('/hqs/{id}/edit', [HqController::class, 'edit'])->name('hqs.edit');
    Route::get('/hqs/{id}', [HqController::class, 'show'])->name('hqs.show');
    Route::post('/hqs', [HqController::class, 'store'])->name('hqs.store');
    Route::put('/hqs/{id}', [HqController::class, 'update'])->name('hqs.update');
    Route::delete('/hqs/{id}', [HqController::class, 'destroy'])->name('hqs.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});