<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;


class AdminController extends Controller
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
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }
    public function showSellers(){

       $sellers= User::all();
       return view('template.vivo.design.admin.showSellers',compact('sellers') );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {





if ($request->hasFile('image_url')) {
    // Delete the old image file
    Storage::delete(Auth::guard('admin')->user()->image_url);

    // Store the new image file
    $image = $request->file('image_url')->getClientOriginalName();
    $path = $request->file('image_url')->storeAs('admins', $image, 'Images');
} else {
    // No new image provided, keep the old image URL
    $path = Auth::guard('admin')->user()->image_url;
}

if ($request->password==null) {


    Admin::find($id)->update(['name'=> $request->name,
    'email' => $request->email,
    'image_url'=> $path,
]);
}
else {

    $request->validate(
        [
        'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
]);
Admin::find($id)->update(['name'=> $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),
'image_url'=> $path,
]);
}



return  redirect()->route('admins.profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
