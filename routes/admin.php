<?php

use Illuminate\Support\Facades\Route;



//Role and Permission
Route::get('/', [App\Http\Controllers\admin\dashboardController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', App\Http\Controllers\admin\UserController::class)->only('index','edit','update')->names('admin.users');
Route::resource('roles', App\Http\Controllers\admin\RoleController::class)->names('admin.roles');

Route::resource('alumnos', \App\Http\Controllers\admin\AlumnosController::class)->names('admin.alumnos');

Route::group(['prefix'=>'paso'], function(){

    Route::resource('uno', \App\Http\Controllers\admin\PasoUnoController::class)->names('admin.pasos');
    Route::resource('dos', \App\Http\Controllers\admin\PasoDosController::class)->names('admin.pasos.dos');
    Route::resource('tres', \App\Http\Controllers\admin\PasoTresController::class)->names('admin.pasos.tres');
});

Route::resource('uploads', \App\Http\Controllers\admin\FilesController::class)->names('admin.uploads');
Route::get('pasos', [App\Http\Controllers\admin\FilesController::class, 'Files'])->name('admin.pasos.index');
Route::get('uploads/{uploads}/download', [App\Http\Controllers\Admin\FilesController::class, 'download'])->name('admin.download');
