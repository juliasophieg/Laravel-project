<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{

    public function __invoke(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('postpage');
        } else {

            alert('login failed');
            echo 'login failed';
        }
    }
}
