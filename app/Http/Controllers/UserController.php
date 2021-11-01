<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function showForm()
    {
        return view('registration');
    }

    public function storeData(UserRequest $request)
    {

      $user = new User;
      $user->fill($request->validated());
      $user->save();

        return redirect()->route('registration.success');

    }
}
