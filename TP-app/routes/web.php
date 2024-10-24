<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticateMyUser;

Route::get('/', function () {
    return redirect('signin');
});

Route::get('/signin', function () {
    return view('signin');
});


Route::get('/signup', function () {
    return view('signup');
});

Route::middleware(AuthenticateMyUser::class)->group(function () {
    Route::get('/account', function () {
        return view('account', ['login' => session('user')->getLogin()]);
    });

    Route::get('/formpassword', function () {
        return view('formpassword');
    });

    Route::get('/deleteuser', [UserController::class, 'delete'])->middleware(AuthenticateMyUser::class);
    Route::get('/signout', [UserController::class, 'disconnect'])->middleware(AuthenticateMyUser::class);
});

Route::post('/authenticate', [UserController::class, 'connect']);
Route::post('/adduser', [UserController::class, 'create']);
Route::post('/changepassword', [UserController::class, 'updatePassword']);