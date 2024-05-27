<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('create');
});

Route::get('/customers/create',[CustomerController::class,'create'])->name('customers.create');
Route::get('/customers',[CustomerController::class,'index'])->name('customers.index');
Route::post('/customers',[CustomerController::class,'store'])->name('customers.store');
Route::get('/customers/{id}',[CustomerController::class,'destroy'])->name('customers.destroy');
Route::get('/customers/{customer}/edit',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customers/{customer}/update',[CustomerController::class,'update'])->name('customer.update');
Route::get('/customers/view/{customer}',[CustomerController::class,'show'])->name('customer.show');