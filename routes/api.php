<?php

use App\Http\Controllers\Api\CosplayController;
use App\Http\Controllers\Api\HqController;
use App\Http\Controllers\Api\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
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

    Route::post('/votes', [VoteController::class, 'vote'])->name('votes.vote');
    Route::get('/votes/score', [VoteController::class, 'score'])->name('votes.score');
    Route::put('/votes/update', [VoteController::class, 'update'])->name('votes.update');
    Route::delete('/votes/delete', [VoteController::class, 'delete'])->name('votes.delete');
});
