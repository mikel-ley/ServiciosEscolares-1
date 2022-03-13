<?php

use Illuminate\Support\Facades\Route;



//Role and Permission
Route::get('/', [App\Http\Controllers\admin\dashboardController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', App\Http\Controllers\admin\UserController::class)->only('index','edit','update')->names('admin.users');
Route::resource('roles', App\Http\Controllers\admin\RoleController::class)->names('admin.roles');

Route::resource('alumnos', \App\Http\Controllers\admin\AlumnosController::class)->names('admin.alumnos');

Route::group(['prefix'=>'paso'], function(){


    Route::resource('tres', \App\Http\Controllers\admin\PasoTresController::class)->names('admin.pasos.tres');


    Route::resource('dos', \App\Http\Controllers\admin\PasoDosController::class)->names('admin.pasos.dos');
    Route::get('Downloads', [App\Http\Controllers\admin\PasoDosController::class, 'Externo'])->name('admin.pasos.externo');
    Route::get('dos/{dos}/download', [App\Http\Controllers\admin\PasoDosController::class, 'download'])->name('admin.externo.download');
});

Route::resource('uploads', \App\Http\Controllers\admin\FilesController::class)->names('admin.uploads');
Route::get('pasos', [App\Http\Controllers\admin\FilesController::class, 'Files'])->name('admin.pasos.index');
Route::get('uploads/{uploads}/download', [App\Http\Controllers\admin\FilesController::class, 'download'])->name('admin.download');


//Route::get('Downloads', [App\Http\Controllers\admin\FilesController::class, 'Externo'])->name('admin.pasos.externo');
