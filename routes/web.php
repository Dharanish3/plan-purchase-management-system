<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\OrderController;

Route::view('/', 'welcome'); //Login  and Register  Page

Route::get('dashboard', [PlanController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');  //Home Page - Plans Get Page

Route::get('checkout/{id}', [PlanController::class, 'show']);  //Checkout Page
Route::get('transaction', [OrderController::class, 'show'])->name('transaction'); //Transaction List

Route::get('profile',[OrderController::class, 'profile'])->name('profile'); //User Profile


Route::post('/checkout', [OrderController::class, 'submit'])->name('checkout.submit'); //Checkout Submit

Route::view('/success', 'success')->name('success'); //Payment Success
Route::view('/cancel', 'cancel')->name('cancel'); //Payment Failed



require __DIR__ . '/auth.php';
