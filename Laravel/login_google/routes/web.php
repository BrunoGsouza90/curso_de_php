<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([LoginMiddleware::class, ])->group(function () {

    Route::get("/", [HomeController::class, "index"])->name("home");
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");

});

Route::get("login", [LoginController::class, "login"])->name("login");
Route::post("auth", [LoginController::class, "auth"])->name("auth");