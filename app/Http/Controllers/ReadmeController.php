<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadmeController extends Controller
{
    public function readme() {
        return view('readme');
    }
}
