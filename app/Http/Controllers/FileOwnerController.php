<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\StoreFileOwner;
use App\User;
use Illuminate\Support\MessageBag;

class FileOwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(File $file)
    {
        $owners = $file->owners()->get();
        return view('files.owners.index', compact('file', 'owners'));
    }

    public function store(StoreFileOwner $request, File $file)
    {
        $user = User::where("username", $request->username)->first();
        $owners = $file->owners()->get();

        if ($user) {
            $file->owners()->attach($user);
            $owners->add($user);

            return view('files.owners.index', compact('file', 'owners'));
        } else {
            $errors = new MessageBag();
            $errors->add('username', 'No existe ningún tal ' . $request->username);
            return view('files.owners.index', compact('file', 'owners'))
                ->withErrors($errors);
        }
    }
}
