<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Logout;
use App\Http\Controllers\Postpage;
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

Route::get('/postpage', function () { //Routing till postpage
    return view('postpage');
})->middleware('auth'); // Kräver inlogg för att besöka sida, utloggad användare får error

Route::post('login', Login::class); // Aktiverar loginfunctionen/classen
Route::get('/logout', Logout::class)->name('logout'); // Aktiverar logout
