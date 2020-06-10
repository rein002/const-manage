<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Const_order;
use DB;

class BrowseController extends Controller
{
    public function show() {

        //with()メソッドでConst_orderモデルとUserモデルを結合する
        $data = ['records' => Const_order::with('user')->get()];
        //↓これと同じ意味
        //$data = ['records' => DB::select('SELECT * FROM const_orders LEFT JOIN users on const_orders.user_id = users.id')];
        return view('browse.show', $data);
    }
    
}
