<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('tic_tac_toe', function () {
//    return event(new \App\Events\MyEvent());
});

Route::post('join/{id}', [\App\Http\Controllers\TicTacToeController::class, 'join']);
Route::post('room/{id}/make-step', [\App\Http\Controllers\TicTacToeController::class, 'makeStep']);
Route::post('room/{id}/restart', [\App\Http\Controllers\TicTacToeController::class, 'restartGame']);
