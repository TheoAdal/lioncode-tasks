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
})->name('test');

// Route::middleware('auth:sanctum')->get('/welcome', function (Request $request) {
//     return view('welcomeee');
// })->name('welcome');


//Register Routes
Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
Route::post('/register',[RegisterUserController::class, 'store'])->name('register.store');

//Company Form Route
Route::get('/companies',[TestCompaniesController::class, 'form'])->name('companies.form');

//Login Route
Route::get('/login', [LoginUserController::class, 'login'])->name('login');


// Route::middleware('auth:sanctum')->get('/myaccount', function (Request $request) {
//     return view('myaccount');
// })->name('myaccount');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/myaccount', function (Request $request) {
        return view('myaccount', [
            'token' => session('api_token')
        ]);
    })->name('myaccount');
});



