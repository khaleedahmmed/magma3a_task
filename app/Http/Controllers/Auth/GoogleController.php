<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

             $user =   Socialite::driver('google')->stateless()->user();
             $finduser = User::where('google_id', $user->id)->first();
            if($finduser){

                Auth::login($finduser);

                 return redirect()->route('website.index');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                ]);

                Auth::login($newUser);

                return redirect()->route('website.index');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
