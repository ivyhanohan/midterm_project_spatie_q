<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Auth;




Route::get('/', function () {
    return view('home');
})->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('todolists', TodoListController::class);
});
