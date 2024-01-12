<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WordsController;
use App\Http\Controllers\FoldersController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(
        ['prefix' => 'folders'],
        function () {
            Route::get('', [FoldersController::class, 'getAll']);
            Route::post('', [FoldersController::class, 'create']);
            Route::get('{id}', [FoldersController::class, 'get']);
            Route::put('{id}', [FoldersController::class, 'update']);
            Route::delete('{id}', [FoldersController::class, 'delete']);
        }
    );
    Route::group(
        ['prefix' => 'words'],
        function () {
            Route::get('', [WordsController::class, 'getAll']);
            Route::post('', [WordsController::class, 'create']);
            Route::get('{id}', [WordsController::class, 'get']);
            Route::put('{id}', [WordsController::class, 'update']);
            Route::delete('{id}', [WordsController::class, 'delete']);
            Route::get('repeat', [WordsController::class, 'repeat']);
        }
    );
});

Route::group(
    ['prefix' => 'public'],
    function () {
        Route::post('registration', [RegistrationController::class, 'register']);
        Route::post('login', [LoginController::class, 'login']);
    }
);
