<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($id){
        $user = User::find($id);
        return view('pages.admin.profile.edit',compact('user'));
    }

    public function update(Request $request){
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
        ],[
            'password'=> 'Muat be min 8 character'
        ]);
        // dd($request->all());
        // Find the user by ID
        $user = User::findOrFail($request->user_id);

        if($request->password == null){
            $user->username = $request->input('username');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
        }else{

            // Update the user with the new data
            $user->username = $request->input('username');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            
            // $user->password = $request->input('password');
            $user->password = Hash::make($request->input('password'));
        }

        // Save the updated user
        $user->save();

        // Redirect back with a success message
        return redirect()->route('admin.edit', $request->id)
                         ->with('success', 'Data Has Been updated successfully!');
    }

}
