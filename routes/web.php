<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\TestCompaniesController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/test', function () {
    $test = "Testing testing";
    return "<h1>" . $test .  "</h1>";
});

// Route::middleware('auth:sanctum')->get('/myaccount', function (Request $request) {
//     $user = $request->user();
//     // $token = $user->currentAccessToken()->plainTextToken;
//     $token = session('api_token');

//     return view('myaccount', ['user' => $user, 'token' => $token]);
// })->name('myaccount');

//Register Routes
Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
Route::post('/register',[RegisterUserController::class, 'store'])->name('register.store');


Route::get('/companies',[TestCompaniesController::class, 'form'])->name('companies.form');
Route::get('/getcompanies',[TestCompaniesController::class, 'show']);
Route::post('/storecompanies',[TestCompaniesController::class, 'store'])->name('companies.store');

//Login Routes
Route::get('/login', [LoginUserController::class, 'login'])->name('login');
