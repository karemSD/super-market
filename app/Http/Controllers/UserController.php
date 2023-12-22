<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate(['email' => ['required', 'email'],
        'first_name' => ['required','max:15' , 'min:3' ,'string' ],
        'last_name' => ['required','max:15' ,  'string','min:3'],
        'phone' => ['required','min:3']
        ]);


        if ($request->hasFile('image_url')) {
            // Delete the old image file
            Storage::delete(auth()->user()->image_url);

            // Store the new image file
            $image = $request->file('image_url')->getClientOriginalName();
            $path = $request->file('image_url')->storeAs('users', $image, 'Images');
        } else {
            // No new image provided, keep the old image URL
            $path = auth()->user()->image_url;
        }


                User::find($id)->update([
                    'first_name'=> $request->first_name,
                    'last_name'=> $request->last_name,
                    'email' => $request->email,
                    'phone'=> $request->phone,
                    'image_url' =>$path,

            ]);


            return  redirect()->route('account-settings');


            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
         $user->delete();
         return redirect()->route('showSellers')->with('success', 'Seller deleted successfully');

    }
}
