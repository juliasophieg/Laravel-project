<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function register(Request $request)
    {

        // Validera request innan den läggs i Databas
        $request->validate([
            'name' => 'required|string|max:30', // Måste innehålla ett värde, sträng, max 30 enheter
            'email' => 'required|string|email|max:255|unique:users', // Måste innehålla ett värde, sträng, mail format, max 255 enheter och ser till att värdet är unikt
            'password' => 'required|string|min:3|confirmed', //Confirmed ser till att båda lösenorden matchar vid registrering
        ]);



        // Skapar användare - tar värden från form och lägger de i databas värden
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashar lösen, "oläsbart".
        ]);

        return redirect()->intended('login'); // Skickar tillbaka användaren till login-sida
    }
}
