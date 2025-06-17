<?php

use App\Http\Controllers\Api\v1\AdminController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\DidController;
use App\Http\Controllers\Api\v1\ExtesionController;
use App\Http\Controllers\Api\v1\SnmpController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Middleware\TokenVerify;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){

    Route::middleware([TokenVerify::class])->group(function(){

        // Users.
        Route::get('/users/index', [UserController::class, 'index'])->name('api.users.index');
        Route::post('/users/store', [UserController::class, 'store'])->name('api.users.store');
        Route::put('/users/update/{id}', [UserController::class, 'update'])->name('api.users.update');
        Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');

        // Admins.
        Route::get('/admins/index', [AdminController::class, 'index'])->name('api.admins.index');
        Route::post('/admins/store', [AdminController::class, 'store'])->name('api.admins.store');
        Route::put('/admins/update/{id}', [AdminController::class, 'update'])->name('api.admins.update');
        Route::delete('/admins/destroy/{id}', [AdminController::class, 'destroy'])->name('api.admins.destroy');

        // DID.
        Route::get('/dids/index', [DidController::class, 'index'])->name('api.dids.index');
        Route::post('/dids/store', [DidController::class, 'store'])->name('api.dids.store');
        Route::put('/dids/update/{id}', [DidController::class, 'update'])->name('api.dids.update');
        Route::delete('/dids/destroy/{id}', [DidController::class, 'destroy'])->name('api.dids.destroy');

        // Ramais.
        Route::get('/extesions/index', [ExtesionController::class, 'index'])->name('api.extesions.index');
        Route::post('/extesions/store', [ExtesionController::class, 'store'])->name('api.extesions.store');
        Route::put('/extesions/update/{id}', [ExtesionController::class, 'update'])->name('api.extesions.update');
        Route::delete('/extesions/destroy/{id}', [ExtesionController::class, 'destroy'])->name('api.extesions.destroy');

    });

    // Login.
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');

    // SNMP.
    Route::match(['get', 'post'] ,'/snmp/index/{id}', [SnmpController::class, 'index'])->name('api.snmp.index');

});