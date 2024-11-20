<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemoController;
use App\Http\Middleware\AuthenticateMyUser;

Route::get('/', function () {
    return redirect('signin');
});

Route::get('/signin', function () {
    return view('signin');
})->name('view_signin');


Route::get('/signup', function () {
    return view('signup');
})->name('view_signup');

Route::prefix('admin')->middleware(AuthenticateMyUser::class)->group(function () {
    Route::get('/account', function () {
        return view('account'/*, ['login' => session('user')->getLogin()]*/);
    })->name('view_account');

    Route::get('/formpassword', function () {
        return view('formpassword');
    })->name('view_password');

    Route::get('/formmemo', function () {
        return view('formmemo');
    })->name('view_formmemo');

    Route::get('/deleteuser', [UserController::class, 'delete'])->name('user_delete');
    Route::get('/signout', [UserController::class, 'disconnect'])->name('user_signout');
    Route::get('/showMemo', [MemoController::class, 'show'])->name('memo_show');
    Route::post('/changepassword', [UserController::class, 'updatePassword'])->name('user_update');
    Route::post('/addMemo', [MemoController::class, 'add'])->name('memo_add');
});

Route::post('/authenticate', [UserController::class, 'connect'])->name('user_connect');
Route::post('/adduser', [UserController::class, 'create'])->name('user_create');