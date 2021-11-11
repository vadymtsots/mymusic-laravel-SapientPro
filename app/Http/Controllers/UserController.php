<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        Auth::login($user, $remember = true);

        return redirect()->route('main');
    }

    public function getUser(User $user)
    {
        return view('user',
        [
            'user' => $user,
            'numberOfReviews' => $user->reviews->count()
        ]);
    }
}
