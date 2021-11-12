<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

    public function getAllUsers(User $user)
    {
        return view('users-list', [
            'users' => $user->latest()->with('reviews')->simplePaginate(6),
            'numberOfReviews' => $user->reviews->count()
        ]);
    }

    public function getUser(User $user)
    {
        return view('user',
        [
            'user' => $user,
            'numberOfReviews' => $user->reviews->count()
        ]);
    }

    public function banConfirmation(User $user)
    {
        return view('ban', [
            'user' => $user
        ]);
    }

    public function banUser(User $user)
    {
        if (Gate::allows('ban-user', $user)){
            User::where('id', $user->id)->update(['is_banned' => 1]);
            return redirect()->route('success');
        }else{
            abort(403);
        }

    }
}
