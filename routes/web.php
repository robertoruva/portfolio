<?php

use App\Http\Controllers\LugarController;
use App\Http\Controllers\RestApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api/rest')->name('api.rest.')->group(function () {
    Route::get('/', [RestApiController::class, 'index'])->name('index');
    Route::get('/producto/{id}', [RestApiController::class, 'show'])->name('show');
    Route::get('/create', [RestApiController::class, 'create'])->name('crear');
    Route::post('/create', [RestApiController::class, 'store'])->name('store');
});

Route::resource('lugares', LugarController::class)->parameters([
	'lugares' => 'lugar'
]);

