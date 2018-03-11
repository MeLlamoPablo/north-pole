<?php

namespace App\Http\Controllers;

use App\File;
use App\FileDownload;
use App\Http\Requests\UpdateFile;
use App\Http\Requests\StoreFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $file = new File();
        $file->name = $upload->getClientOriginalName();
        $file->mimeType = $upload->getMimeType();
        $file->size = $upload->getSize();

        $file->save();

        $file->owners()->attach(Auth::user());

        $upload->storeAs("userUploads", $file->id);

        return redirect("/files/$file->id");
    }

    public function show(File $file)
    {
        return view('files.detail', compact('file'));
    }

    public function download(File $file)
    {
        $download = new FileDownload();

        $download->user_id = Auth::user()->id;
        $download->file_id = $file->id;

        $download->save();

        return Storage::download(
            "userUploads/$file->id",
            $file->name,
            [
                "Content-Type" => $file->mimeType
            ]
        );
    }


    public function update(UpdateFile $request, File $file)
    {
        $file->name = $request->name;
        $file->save();

        return(json_encode($request->name));
    }

    public function destroy(File $file)
    {
        $file->delete();
    }
}
