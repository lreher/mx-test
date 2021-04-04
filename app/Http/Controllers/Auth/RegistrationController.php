<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RegistrationController extends Controller
{
    public function __construct() 
    {
        $this->middleware('guest')
            ->except('logout');
    }
    
    /**
     * Shows registration view to user
     *
     * @return void
     */
    public function showRegistration() 
    {
        return view('auth.register');
    }

     /**
     * Registers a new user and organisation - assigns correct roles to new user
     *
     * @param RegistrationRequest $request
     *
     * @return void
     */
    public function register(RegistrationRequest $request) 
    {

    }
}

  