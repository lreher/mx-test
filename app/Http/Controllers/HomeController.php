<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserDetailsRequest;

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

    /**
     * Saves user details
     *
     * @return void
     */
    public function saveUserDetails(UserDetailsRequest $request) 
    {
        DB::beginTransaction();

        $user = $this->user;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;

        $user->save();

        try {

            DB::commit();

            return response()->json([
                "message" => "Successfully saved your details!",
                "user" => $user
            ], 200);

        } catch(Exception $e) {

            DB::rollback();

            return response("Successfully saved your details!", 400)
                  ->header('Content-Type', 'text/plain');
        }
    }
}


  