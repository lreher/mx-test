<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct() 
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            return $next($request);

        });
    }
    
    /**
     * Shows home screen
     *
     * @return void
     */
    public function showHome() 
    {
        return view('index', [
            'user' => $this->user
        ]);
    }
}

  