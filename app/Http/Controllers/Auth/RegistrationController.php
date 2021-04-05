<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;


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
     * Registers a new user
     *
     * @param RegistrationRequest $request
     *
     * @return void
     */
    public function register(RegistrationRequest $request) 
    {
        DB::beginTransaction();

        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        try {

            DB::commit();

            session()->flash('message', 'Your account account was registered successfully! You may now login.'); 

            return redirect()->route('login');

        } catch(Exception $e) {

            DB::rollback();

            return redirect()
                ->back()
                ->withErrors(['Something went wrong creating your account.']);

        }
    }
}

  