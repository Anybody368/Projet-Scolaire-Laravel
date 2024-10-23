<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::post('/adduser', [UserController::class, 'create']);
Route::post('/changepassword', [UserController::class, 'updatePassword']);

Route::get('/deleteuser', [UserController::class, 'delete']);
Route::get('/signout', [UserController::class, 'disconnect']);