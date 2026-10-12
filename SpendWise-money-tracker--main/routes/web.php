<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return view('auth', [
        'register' => $request->query('mode') === 'register',
    ]);
})->name('login');

// Form masih berupa demo, mengikuti halaman dashboard dan transaksi.
Route::post('/login', function (Request $request) {
    $validator = validator($request->all(), [
        'email' => 'required|email|max:255',
        'password' => 'required|string|max:255',
    ], [
        'email.required' => 'Isi alamat email.',
        'email.email' => 'Gunakan alamat email yang valid.',
        'password.required' => 'Isi kata sandi.',
    ]);

    if ($validator->fails()) {
        return redirect()->route('login')
            ->withErrors($validator)
            ->withInput($request->only('email', 'remember'));
    }

    return redirect()->route('dashboard');
})->name('login.submit');

Route::post('/register', function (Request $request) {
    $validator = validator($request->all(), [
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:8|max:255|confirmed',
        'password_confirmation' => 'required|string|max:255',
    ], [
        'name.required' => 'Isi nama lengkap.',
        'email.required' => 'Isi alamat email.',
        'email.email' => 'Gunakan alamat email yang valid.',
        'password.required' => 'Isi kata sandi.',
        'password.min' => 'Kata sandi minimal 8 karakter.',
        'password.confirmed' => 'Konfirmasi kata sandi harus sama.',
        'password_confirmation.required' => 'Ulangi kata sandi.',
    ]);

    if ($validator->fails()) {
        return redirect()->route('login', ['mode' => 'register'])
            ->withErrors($validator)
            ->withInput($request->only('name', 'email'));
    }

    return redirect()->route('login')
        ->withInput($request->only('email'))
        ->with('status', 'Form pendaftaran valid. Pada versi contoh ini, akun belum dibuat.');
})->name('register.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/transactions', function () {
    return view('transactions');
})->name('transactions');

Route::get('/budget', function () {
    return view('budget');
})->name('budget');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');
