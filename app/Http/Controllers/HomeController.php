<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;
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
        $user = User::where('id', $this->user->id)->with('userAddresses')->first();

        return view('index', [
            'user' => $user
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

            return response("Failed to save your details", 400)
                  ->header('Content-Type', 'text/plain');
        }
    }

    /**
     * Saves new user address
     *
     * @return void
     */
    public function saveAddress(AddressRequest $request) 
    {
        DB::beginTransaction();

        $user_address = new UserAddress();

        $user_address->user_id = $this->user->id;

        $user_address->address_1 = $request->address_1;
        $user_address->address_2 = $request->address_2;
        $user_address->suburb = $request->suburb;
        $user_address->state = $request->state;
        $user_address->postcode = $request->postcode;
        $user_address->country = $request->country;

        $user_address->save();

        try {

            DB::commit();

            $user = User::where('id', $this->user->id)->with('userAddresses')->first();

            return response()->json([
                "message" => "Successfully saved new address!",
                "user" => $user
            ], 200);

        } catch(Exception $e) {

            DB::rollback();

            return response("Fail to save address", 400)
                  ->header('Content-Type', 'text/plain');
        }
    }

    /**
     * Deletes user address
     *
     * @return void
     */
    public function deleteAddress(Request $request, $addressId) 
    {
        DB::beginTransaction();

        $user_address = UserAddress::find($addressId);

        $user_address->delete();

        try {
            
            DB::commit();

            $user = User::where('id', $this->user->id)->with('userAddresses')->first();

            return response()->json([
                "message" => "Successfully deleted address",
                "user" => $user
            ], 200);

        } catch(Exception $e) {

            DB::rollback();

            return response("Fail to delete address", 400)
                  ->header('Content-Type', 'text/plain');
        }
    }
}


  