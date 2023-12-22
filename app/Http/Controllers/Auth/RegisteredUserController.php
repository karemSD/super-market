<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register2');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'last_name' => ['required' , 'string' , 'max:15' , 'min:3'],
            'first_name' => ['required' , 'string' , 'max:15' , 'min:3'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), Password::min(8)->mixedCase()->numbers()],
        ]);


          // Store the new image file
          $image = $request->file('image_url')->getClientOriginalName();
          $path = $request->file('image_url')->storeAs('sellers', $image, 'Images');
        $user = User::create([
            'email' => $request->email,
            'last_name' => $request->last_name,
            'first_name' =>$request->first_name,
            'phone' => $request->phone,
            'image_url' =>$path,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);


         return redirect(RouteServiceProvider::Sellers);
    }
}
