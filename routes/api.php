<?php

use App\Http\Controllers\Api\v1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::get('/tasks', [TaskController:: class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController:: class, 'create'])->name('tasks.create');
});
