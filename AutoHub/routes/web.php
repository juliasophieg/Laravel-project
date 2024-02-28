<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Logout;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Postpage;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {  // Skapar väg till Loginsida
    return view('login');
});

Route::get('/register', function () {  // Skapar väg till Loginsida
    return view('register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.store');


Route::post('login', LoginController::class); // Aktiverar loginfunctionen/classen
Route::get('/logout', LogoutController::class)->name('logout'); // Aktiverar logout

Route::get('/postpage', function () { //Routing till postpage
    return view('postpage');
})->middleware('auth'); // Kräver inlogg för att besöka sida, utloggad användare får error
