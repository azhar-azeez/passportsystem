<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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


//Indexpage route
Route::get('/', [HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class,'redirect'])->name('dashboard');
    // Route::get('/dashboard', function () {
    //     return view('dashboard'); 
    // })->name('dashboard');
});

Route::get('/add_user_view', [AdminController::class,'addview']);

Route::post('/add_user', [AdminController::class,'adduser']);

Route::post('/appointment', [HomeController::class,'appointment']);

Route::get('/profile_view', [HomeController::class, 'profileview'])->name('profile.view');
Route::post('/profile_update', [HomeController::class, 'updateProfile'])->name('profile.update');

Route::get('/my_appointment', [HomeController::class, 'myappointment']);