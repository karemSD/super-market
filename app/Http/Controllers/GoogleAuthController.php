<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    //

    public function redirect(){
        return  Socialite::driver('google')->redirect();
    }
    public function callbackGoogle(){


        try {
            $google_user=Socialite::driver('google')->user();
            $user=User::where('google_id', $google_user->getId())->first();
            if (!$user) {
                $new_user=User::create([
                    'first_name' => $google_user->getName(),
                    'last_name' =>"nickName",
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'image_url' => $google_user->getAvatar(),
                    'phone' => "0937529717",
                ]);
                Auth::login($new_user);
                return redirect()->intended('/');
            }
            else {
                Auth::login($user);
                return redirect()->intended('/');
            }

        } catch (\Throwable $th) {
            dd('Somthing Wrong happen!  '. $th->getMessage());
        }
    }
}
