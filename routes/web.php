<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;

Route::get('/', [RolesController::class, 'index'])->name('index');
Route::post('roles', [RolesController::class, 'create']);
Route::get('roles/{role}', [RolesController::class, 'show']);
Route::get('test/{test}', function ($test){
    dump($test);
})->name('test');
