<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user) {
        return view("user", compact("user"));
    }

    public function ownUser() {
        return redirect("/users/" . Auth::user()->username);
    }
}
