<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::resource('home', HomeController::class);

Route::resource('/mahasiswa', MahasiswaController::class);