<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class HelloController extends Controller
{
    public function index() {
        return 'こんにちは、Homestead！';
    }

    public function list() {
        $data = ['records' => Book::all()];
        return view('hello.list', $data);
    }
}
