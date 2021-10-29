<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showForm()
    {
        return view('registration');
    }

    public function storeData(Request $request)
    {

       $validatedData = $request->validate([
           'name' => 'required|unique:users,name',
           'email' => 'required|email:rfc,dns|unique:users,email',
           'password' => 'required_with:password_confirmation|min:6',
           'password_confirmation' => 'required|same:password'
       ]);

       User::create($request->all()); //pass above values to the database

        return redirect()->route('registration.success');

    }
}
