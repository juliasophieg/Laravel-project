<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Postpage;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {  // Skapar väg till Loginsida
    return view('login');
})->name('login');

Route::get('/register', function () {  // Skapar väg till Loginsida
    return view('register');
})->name('register');

Route::get('/LoginError', function () {  // Skapar väg till Loginsida
    return view('LoginError');
});



Route::post('/register', [RegisterController::class, 'register'])->name('register.store'); // Aktiverar register class
Route::post('/post', [PostController::class, 'store'])->name('post.store');


Route::post('login', LoginController::class); // Aktiverar loginfunctionen/classen
Route::get('/logout', LogoutController::class)->name('logout'); // Aktiverar logout

Route::get('/postpage', function () { //Routing till postpage
    return view('postpage');
})->middleware('auth'); // Kräver inlogg för att besöka sida, utloggad användare får error
