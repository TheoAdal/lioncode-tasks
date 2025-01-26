<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\TestCompaniesController; 

Route::middleware('auth:sanctum')->get('/myaccount', function (Request $request) {
    $user = $request->user();
    return response()->json([
        'message' => 'Welcome to your account!',
        'user' => $user,
        'token' => $request->bearerToken()
    ]);
    // return view('myaccount', ['user' => $user]);
})->name('myaccount');


Route::middleware('auth:sanctum')->post('/storecompanies', [TestCompaniesController::class, 'store'])->name('companies.store');

Route::middleware('auth:sanctum')->get('/getcompanies', [TestCompaniesController::class, 'show'])->name('companies.show');


Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginUserController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

