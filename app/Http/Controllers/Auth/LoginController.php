<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __construct() 
    {
        $this->middleware('guest')
            ->except('logout');
    }
    
    /**
     * Shows login view to user
     *
     * @return void
     */
    public function showLogin() 
    {
        return view('auth.login');
    }

    /**
     * Attempts to login user
     *
     * @param LoginRequest $request
     *
     * @return void
     */
    public function login(LoginRequest $request)
    {
        // Can either login via username or email
        $login = $request->login;
        $password = $request->password;

        if (User::where('username', $login)->exists())  {
            Auth::attempt(['username' => $login, 'password' => $password]);
        } 
        else if (User::where('email', $login)->exists()) {
            Auth::attempt(['email' => $login, 'password' => $password]);
        }

        if (!Auth::check()) {

            return redirect()
                ->back()
                ->withErrors(['Your credentials are incorrect.']);
        }

        return redirect()->route('home');
    }

    /**
     * Logs out current user
     *
     * @param Request $request
     */
    public function logout(Request $request) {
        Auth::logout();

        return redirect()->route('login');

    }
}

  