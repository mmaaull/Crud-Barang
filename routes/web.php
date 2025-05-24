<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', [BarangController::class, 'index']);
Route::resource('barangs', BarangController::class);

