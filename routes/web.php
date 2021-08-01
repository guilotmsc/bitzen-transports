<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Drivers;
use App\Http\Livewire\Cars;
use App\Http\Livewire\FuelSupplies;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/drivers', Drivers::class)->name('drivers');
    Route::get('/cars', Cars::class)->name('cars');
    Route::get('/fuel-supplies', FuelSupplies::class)->name('fuel-supplies');
    Route::get('/fuel-supplies/pdf', [FuelSupplies::class, 'createPDF'])->name('pdf');
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});