<?php

use Illuminate\Support\Facades\Route;



//Role and Permission
Route::get('/', [App\Http\Controllers\admin\dashboardController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', App\Http\Controllers\admin\UserController::class)->only('index','edit','update')->names('admin.users');
Route::resource('roles', App\Http\Controllers\admin\RoleController::class)->names('admin.roles');

