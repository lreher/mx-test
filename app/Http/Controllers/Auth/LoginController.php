<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}

  