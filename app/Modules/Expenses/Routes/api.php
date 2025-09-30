<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Expenses\Controllers\ExpenseController;

Route::prefix('expenses')->group(function () {
    Route::get('/', [ExpenseController::class, 'index']);
    Route::post('/', [ExpenseController::class, 'store']);
    Route::put('/{expense}', [ExpenseController::class, 'update']);
    Route::delete('/{expense}', [ExpenseController::class, 'destroy']);
});