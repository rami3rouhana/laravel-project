<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntroController;

Route::prefix('v1')->group(function () {
    Route::post('/string_sort', [IntroController::class, 'sortString']);
    Route::post('/number_deconstruct', [IntroController::class, 'numberDeconstruct']);
    Route::post('/numbers_to_binary', [IntroController::class, 'numbersToBinary']);
    Route::post('/calcuate', [IntroController::class, 'calcuate']);
});
