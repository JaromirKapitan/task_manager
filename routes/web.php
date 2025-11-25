<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::resource('tasks', \App\Http\Controllers\TaskController::class)->except(['show']);
