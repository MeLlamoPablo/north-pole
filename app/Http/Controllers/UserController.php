<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user) {
        $isOwnUser = $user->id === Auth::user()->id;
        return view("user", compact("user", "isOwnUser"));
    }

    public function ownUser() {
        return redirect("/users/" . Auth::user()->username);
    }

    public function update(UpdateUser $request, User $user) {
        $user->email = $request->email;
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->website = $request->website;
        $user->about = $request->about;

        $user->save();
    }
}
