<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[UserController::class, 'loadAllUsers']);
Route::get('/add/user',[UserController::class, 'addUsers'])->name('users');
Route::post('/add/user',[UserController::class, 'store'])->name('store');

Route::get('/edit/{id}',[UserController::class, 'editform'])->name('editform');
Route::get('/delete/{id}',[UserController::class, 'deleteform'])->name('deleteform');

Route::post('/edit/user',[UserController::class, 'edituser'])->name('edituser');


