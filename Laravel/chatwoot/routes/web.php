<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AuthMiddleware::class])->group(function () {

    Route::get("/", [HomeController::class, "home"])->name("home"); 

});

Route::get("/page_login", [AuthController::class, "page_login"])->name("page_login");
Route::get("/page_register", [AuthController::class, "page_register"])->name("page_register");
Route::post("/login", [AuthController::class, "login"])->name("login");
Route::post("/register", [AuthController::class, "register"])->name("register");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");