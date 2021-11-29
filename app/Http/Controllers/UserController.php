<?php

namespace App\Http\Controllers;

use App\Events\NewUser;
use App\Events\UserIsBanned;
use App\Events\UserIsUnblocked;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserProfileRequest;
use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

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

//        SendEmail::dispatch($user);

        event(new NewUser($user));

        return redirect()->route('main');
    }

    public function getAllUsers(User $user)
    {
        return view(
            'users-list',
            [
                'users' => $user->latest()->with('reviews')->where('is_admin', '=', 0)
                    ->searchUser(
                        request('user')
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
        $user->where('id', $user->id)
            ->where('is_admin', '<>', 1)
            ->update(['is_banned' => 1]);

        event(new UserIsBanned($user));
        return redirect()->route('success');
    }

    public function unBanUser(User $user)
    {
        User::where('id', $user->id)->update(['is_banned' => 0]);
        event(new UserIsUnblocked($user));
        return redirect()->route('success');
    }

    public function searchUser()
    {
        $user = User::searchUser()->firstOrFail();
        return response()->json(['name' => $user->name]);
    }

    public function showEditForm(User $user)
    {
        return view(
            'edit-user',
            [
                'user' => $user
            ]
        );
    }

    public function updateUser(UserProfileRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->validated());
        if (request()->hasFile('avatar')) {
            $imageName = time() . '-' . $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('avatars', $imageName, 'public');
            $user->avatar = $imageName;
        }
        $user->save();

        return redirect()->route('getUser', $user->name);
    }

    public function changePasswordForm(User $user)
    {
        return view(
            'change-password-form',
            [
                'user' => $user
            ]);
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if(Hash::check($request->current_password, Auth::user()->password)){
            $user->fill($request->validated());
            $user->save();
            return redirect()->route('success');
        }
    }


}
