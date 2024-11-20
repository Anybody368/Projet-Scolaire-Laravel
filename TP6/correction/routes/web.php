<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticateMyUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'signin');
Route::view('/signin','signin');
Route::view('/signup', 'signup');

Route::post('/authenticate', [UserController::class, 'connect']);
Route::post('/adduser', [UserController::class, 'create']);

Route::middleware(AuthenticateMyUser::class)->group(function () {
	Route::view('/account', 'account');
	Route::view('/formpassword','formpassword');

	Route::post('/changepassword', [UserController::class, 'updatePassword']);
	Route::get('/deleteuser', [UserController::class, 'delete']);
	Route::get('/signout', [UserController::class, 'disconnect']);
});
