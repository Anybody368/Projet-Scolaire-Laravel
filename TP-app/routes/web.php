<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('signin');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/formpassword', function () {
    return view('formpassword');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/authenticate', [UserController::class, 'connect']);