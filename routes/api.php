<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginUserController;

Route::get('/user', function (Request $request) {
    return 'Inside /user with ';
    // return $request->user();

})->middleware('auth:sanctum')->name('user');


Route::middleware('auth:sanctum')->get('/myaccount', function (Request $request) {
    $user = $request->user();
    // return response()->json([
    //     'message' => 'Welcome to your account!',
    //     'user' => $user,
    //     'token' => $request->bearerToken()
    // ]);
    return view('myaccount', ['user' => $user]);
})->name('myaccount');


Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginUserController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

