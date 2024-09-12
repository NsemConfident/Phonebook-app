<?php

use App\Http\Controllers\contact_controller;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/view', [contact_controller::class, 'showContactDetail'])->name('detail');

Route::resource('contacts', ContactController::class);