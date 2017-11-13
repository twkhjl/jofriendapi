<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestAuthController extends Controller
{
    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->intended('dashboard');
        }
    }
}
