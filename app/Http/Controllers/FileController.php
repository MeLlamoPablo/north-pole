<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\StoreFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('files.index', ['files' => File::all()]);
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(StoreFile $request)
    {
        $file = new File();
        $file->name = $request->name;
        $file->user_id = Auth::user()->id;
        $file->save();

        return redirect('/files');
    }

    public function show(File $file)
    {
        //
    }

    public function edit(File $file)
    {
        //
    }

    public function update(Request $request, File $file)
    {
        //
    }

    public function destroy(File $file)
    {
        //
    }
}
