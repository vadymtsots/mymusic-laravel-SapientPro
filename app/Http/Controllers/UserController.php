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

    public function storeData()
    {
       $user = new User;

        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();


    }
}
