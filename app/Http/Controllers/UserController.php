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

        if (request()->hasFile('avatar')) {
            $imageName = time() . '-' . $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('avatars', $imageName, 'public');
            $user->avatar = $imageName;
        }


        $user->save();


        Auth::login($user, $remember = true);

        return redirect()->route('main');
    }

    public function getAllUsers(User $user)
    {
        return view(
            'users-list',
            [
                'users' => $user->latest()->with('reviews')->where('is_admin', '=', 0)
                    ->searchUser(request('user')
                )->simplePaginate(6),
                'numberOfReviews' => $user->reviews->count(),

            ]
        );
    }

    public function getBannedUsers(User $user)
    {
        return view(
            'users-list',
            [
                'users' => $user->where('is_banned', "=", 1)->searchUser(request('user'))->simplePaginate(6),
                'banned' => true
            ]
        );
    }

    public function getUser(User $user)
    {
        return view(
            'user',
            [
                'user' => $user,
                'numberOfReviews' => $user->reviews->count()
            ]
        );
    }

    public function banConfirmation(User $user)
    {
        return view(
            'ban',
            [
                'user' => $user
            ]
        );
    }

    public function banUser(User $user)
    {
        if (Gate::allows('ban-user', $user)) {
            User::where('id', $user->id)
                ->where('is_admin', '<>', 1)
                ->update(['is_banned' => 1]);
            return redirect()->route('success');
        } else {
            return abort(403);
        }
    }

    public function unBanUser(User $user)
    {
        User::where('id', $user->id)->update(['is_banned' => 0]);
        return redirect()->route('success');
    }

    public function searchUser()
    {
        $user = User::searchUser()->firstOrFail();
        return response()->json(['name' => $user->name]);
    }


}
