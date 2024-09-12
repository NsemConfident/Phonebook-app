<?php

use App\Http\Controllers\contact_controller;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::resource('contacts', ContactController::class);

Route::get('/', [ContactController::class, 'index']);