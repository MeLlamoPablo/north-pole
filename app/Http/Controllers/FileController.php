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
        return view('files.index', ['files' => Auth::user()->files()->get()]);
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(StoreFile $request)
    {
        $upload = $request->file("file");

        dd($request);

        $file = new File();
        $file->name = $upload->getClientOriginalName();
        $file->save();

        $file->owners()->attach(Auth::user());

        return redirect('/files');
    }

    public function show(File $file)
    {
        return view('files.detail', compact('file'));
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
