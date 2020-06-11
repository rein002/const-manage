<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Const_order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    

    public function search() {
        //pluck()メソッドでデータベースから配列を取得し、ビュー変数userListに格納
        // $data = ['userList' => User::orderBy('name','asc')->pluck('name')];
        // return view('browse.search', $data);

        //初回アクセス時はnullを渡し、何も表示しないように制御
        return view('browse.search', ['searchResult' => null]);
    }

    //検索フォームから入力された値をもとに検索
    public function searched(Request $req) {
        $const_name = $req->const_name;
        $place = $req->place;
        $genre = $req->genre;
        $user_name = $req->user_name;
        $status = $req->status;

        //モデルConst_orderに対し、クエリビルダを作成
        $query = Const_order::query();

        if (!empty($const_name)) {
            $query->where('const_name','LIKE','%'.$const_name.'%');
        }
        if (!empty($place)) {
            $query->where('place',$place);
        }
        if (!empty($genre)) {
            $query->where('genre',$genre);
        }
        if (!empty($user_name)) {
            $query->where('name','LIKE','%'.$user_name.'%');
        }
        if (!empty($status)) {
            $query->where('status',$status);
        }

        $searchResult = $query->paginate(10);
        return view('browse.search')
            ->with('searchResult',$searchResult)
            ->with('const_name',$const_name)
            ->with('genre',$genre)
            ->with('place',$place)
            ->with('user_name',$user_name)
            ->with('status',$status);
    }

}
