<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\FoldersController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('word', WordController::class);
    Route::get('word/repeat', [WordController::class, 'repeat']);
    Route::resource('folder', FoldersController::class);
});

Route::group(
    ['prefix' => 'public'],
    function () {
        Route::post('/registration', [RegistrationController::class, 'register']); // проверить разницу с put
        Route::post('/login', [LoginController::class, 'login']);
    }
);
