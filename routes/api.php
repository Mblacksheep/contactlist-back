<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('person/',  [PersonController::class, 'all']);
Route::get('person/{id}',  [PersonController::class, 'byId']);
Route::post('person/create',  [PersonController::class, 'create']);
Route::post('person/delete',  [PersonController::class, 'delete']);

Route::get('contact/',  [ContactController::class, 'all']);
Route::get('contact/{id}',  [ContactController::class, 'byId']);
Route::post('contact/create',  [ContactController::class, 'create']);
Route::post('contact/delete',  [ContactController::class, 'delete']);
