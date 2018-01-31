<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return Auth::guest()
            ? view('landing')
            : redirect('/files');
    }
}
