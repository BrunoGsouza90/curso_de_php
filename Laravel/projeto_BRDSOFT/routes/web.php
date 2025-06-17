<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DidController;
use App\Http\Controllers\ExtesionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImpersonateController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SnmpController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminMiddleware::class])->group(function(){

    // Página principal.
    Route::get('/', [HomeController::class, 'index'])->name('index');

    // Usuários.
    Route::get('/users/index', [UserController::class, 'index'])->name('users.index')->middleware('can:can-view_users');
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::match(['get', 'post'], '/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/reactivate/{id}', [UserController::class, 'reactivate'])->name('users.reactivate');

    //Admins.
    Route::get('/admins/index', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/admins/show/{id}', [AdminController::class, 'show'])->name('admins.show');
    Route::post('/admins/search', [AdminController::class, 'search'])->name('admins.search');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('/admins/store', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/admins/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/update{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('/admins/destroy/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
    Route::put('/admins/reactivate/{id}', [AdminController::class, 'reactivate'])->name('admins.reactivate');

    // Relatórios.
    Route::get('/reports/index', [ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports/search', [ReportController::class, 'search'])->name('reports.search');
    Route::post('/reports/csv', [ReportController::class, 'csv'])->name('reports.csv');
    Route::post('/reports/pdf', [ReportController::class, 'pdf'])->name('reports.pdf');    

    // Audits.
    Route::get('/audit/index', [AuditController::class, 'index'])->name('audits.index');
    Route::post('/audit/search', [AuditController::class, 'search'])->name('audit.search');
    Route::post('/audit/before/{id}', [AuditController::class, 'before'])->name('before');
    Route::post('/audit/after/{id}', [AuditController::class, 'after'])->name('after');

    // Dids.
    Route::get('/dids/index', [DidController::class, 'index'])->name('dids.index');
    Route::get('/dids/show/{id}', [DidController::class, 'show'])->name('dids.show');
    Route::post('/dids/search', [DidController::class, 'search'])->name('dids.search');
    Route::get('/dids/create', [DidController::class, 'create'])->name('dids.create');
    Route::post('/dids/store', [DidController::class, 'store'])->name('dids.store');
    Route::get('/dids/edit/{id}', [DidController::class, 'edit'])->name('dids.edit');
    Route::put('/dids/update{id}', [DidController::class, 'update'])->name('dids.update');
    Route::delete('/dids/destroy/{id}', [DidController::class, 'destroy'])->name('dids.destroy');

    // Extesions.
    Route::get('/extesions/index', [ExtesionController::class, 'index'])->name('extesions.index');
    Route::get('/extesions/show/{id}', [ExtesionController::class, 'show'])->name('extesions.show');
    Route::post('/extesions/search', [ExtesionController::class, 'search'])->name('extesions.search');
    Route::get('/extesions/create', [ExtesionController::class, 'create'])->name('extesions.create');
    Route::post('/extesions/store', [ExtesionController::class, 'store'])->name('extesions.store');
    Route::get('/extesions/edit/{id}', [ExtesionController::class, 'edit'])->name('extesions.edit');
    Route::put('/extesions/update{id}', [ExtesionController::class, 'update'])->name('extesions.update');
    Route::delete('/extesions/destroy/{id}', [ExtesionController::class, 'destroy'])->name('extesions.destroy');

    // Permissions.   
    Route::get('/permission/{id}', [PermissionController::class, 'permission'])->name('permission');
    Route::put('/permission/update/{id}', [PermissionController::class, 'update_permission'])->name('update_permission');

    // Impersonate
    Route::get('/impersionate/login/{id}', [ImpersonateController::class, 'login'])->name('impersonates.login');
    Route::get('/impersionate/logout', [ImpersonateController::class, 'logout'])->name('impersonates.logout');

    // Contato.
    Route::get('/contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

    // SNMP.
    Route::match(['get', 'post'], 'snmp.index', [SnmpController::class, 'index'])->name('snmp.index');

    // Logout.
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

});

Route::middleware([UserMiddleware::class])->group(function(){

    // Login.
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/verify_login', [AuthController::class, 'verify_login'])->name('auth.verify_login');

});