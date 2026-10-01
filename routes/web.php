<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', fn () => view('login'))->name('login.form');

// Dummy dulu, nanti diganti controller sungguhan
Route::post('/login', fn () => back())->name('login');
Route::get('/auth/google', fn () => 'Login Google segera hadir')->name('login.google');
Route::get('/lupa-password', fn () => 'Lupa password segera hadir')->name('password.request');
Route::get('/kartu-qr', fn () => 'Scan kartu QR segera hadir')->name('qr.card');