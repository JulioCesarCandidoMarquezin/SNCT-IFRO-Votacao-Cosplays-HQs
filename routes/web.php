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

    Route::post('/vote', [VoteController::class, 'vote'])->name('vote.vote');
    Route::get('/vote/score', [VoteController::class, 'score'])->name('vote.score');
    Route::get('/vote/edit', [VoteController::class, 'edit'])->name('vote.edit');
    Route::put('/vote/update', [VoteController::class, 'update'])->name('vote.update');
    Route::delete('/vote/delete', [VoteController::class, 'delete'])->name('vote.delete');

    Route::get('/cosplay', [CosplayController::class, 'index'])->name('cosplay.index');
    Route::get('/cosplay/{id}', [CosplayController::class, 'show'])->name('cosplay.show');
    Route::post('/cosplay/create', [CosplayController::class, 'create'])->name('cosplay.create');
    Route::put('/cosplay/{id}', [CosplayController::class, 'update'])->name('cosplay.update');
    Route::delete('/cosplay/{id}', [CosplayController::class, 'delete'])->name('cosplay.delete');

    Route::get('/hq', [HqController::class, 'index'])->name('hq.index');
    Route::get('/hq/{id}', [HqController::class, 'show'])->name('hq.show');
    Route::post('/hq/create', [HqController::class, 'create'])->name('hq.create');
    Route::put('/hq/{id}', [HqController::class, 'update'])->name('hq.update');
    Route::delete('/hq/{id}', [HqController::class, 'delete'])->name('hq.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});