<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $users = User::paginate(2);
    return view('welcome', ['users' => $users]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
