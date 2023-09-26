<?php

use App\Http\Controllers\CosplayController;
use App\Http\Controllers\HqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () { return view('welcome'); });

Route::middleware('auth')->group(function () {
    Route::get('/home', function () { return view('home'); })->name('home');

    Route::get('/s3', function () { return view('upload'); });
    Route::get('/s3/{id}', [CosplayController::class, 'show']);
    Route::post('/s3', [CosplayController::class, 'store'])->name('upload');

    Route::post('/votes', [VoteController::class, 'vote'])->name('votes.vote');
    Route::get('/votes/score', [VoteController::class, 'score'])->name('votes.score');
    Route::put('/votes/update', [VoteController::class, 'update'])->name('votes.update');
    Route::delete('/votes/delete', [VoteController::class, 'delete'])->name('votes.delete');

    Route::get('/cosplays', [CosplayController::class, 'index'])->name('cosplay.index');
    Route::get('/cosplays/{id}', [CosplayController::class, 'show'])->name('cosplay.show');
    Route::post('/cosplays/create', [CosplayController::class, 'store'])->name('cosplay.store');
    Route::put('/cosplays/{id}', [CosplayController::class, 'update'])->name('cosplay.update');
    Route::delete('/cosplays/{id}', [CosplayController::class, 'delete'])->name('cosplay.delete');

    Route::get('/hqs', [HqController::class, 'index'])->name('hq.index');
    Route::get('/hqs/{id}', [HqController::class, 'show'])->name('hq.show');
    Route::post('/hqs/create', [HqController::class, 'create'])->name('hq.create');
    Route::put('/hqs/{id}', [HqController::class, 'update'])->name('hq.update');
    Route::delete('/hqs/{id}', [HqController::class, 'delete'])->name('hq.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});