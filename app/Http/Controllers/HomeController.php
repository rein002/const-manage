<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Const_order;
use Illuminate\Support\Facades\Auth;
use DB;

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

        /* 初回アクセス時はnullを渡し、何も表示しないように制御
           表示件数、表示順序だけはデフォルト値を設定 */
        return view('browse.search',
                    ['searchResult' => null,
                    'const_name' => null,
                    'place' => null,
                    'genre' => null,
                    'user_name' => null,
                    'status' => null,
                    'order_date_from' => null,
                    'order_date_to' => null,
                    'displayed_num' => '10',
                    'displayed_order' => '登録日DESC']);
    }

    //検索フォームから入力された値をもとに検索
    public function searched(Request $req) {
        $const_name = $req->const_name;
        $place = $req->place;
        $genre = $req->genre;
        $user_name = $req->user_name;
        $status = $req->status;
        $order_date_from = $req->order_date_from;
        $order_date_to = $req->order_date_to;
        $displayed_num = $req->displayed_num;
        $displayed_order = $req->displayed_order;

        /* テーブルconst_ordersに対し、usersテーブルを結合しクエリビルダを作成
            編集・削除リンクを生成するため、usersテーブルのidをu_id、const_ordersテーブルのidをc_idに置き換え。
                （idが被ってビューで上書きされてしまうため）
            それに伴い、全カラム自動取得ではなく、select()により手動で取得する方針に変更した。 */
        $query = DB::table('const_orders')
                ->select('name', 'users.id as u_id',
                    'const_orders.id as c_id', 'const_name', 'place', 'genre', 'user_id', 'status', 'order_date', 'const_orders.created_at')
                ->join('users', 'const_orders.user_id', '=', 'users.id');

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
        if (!empty($order_date_from)) {
            $query->whereDate('order_date','>=',$order_date_from);
        }
        if (!empty($order_date_to)) {
            $query->whereDate('order_date','<=',$order_date_to);
        }

        //選択によって並び順を指定（デフォルトを登録日の新しい順）
        switch ($displayed_order) {
            case '登録日ASC':
                $query->orderByRaw('const_orders.created_at IS NULL ASC');
                $query->orderBy('created_at', 'asc');
                break;
            case '発注日DESC':
                $query->orderBy('order_date', 'desc');
                break;
            case '発注日ASC':
                $query->orderByRaw('order_date IS NULL ASC');
                $query->orderBy('order_date', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $searchResult = $query->paginate($displayed_num);
        return view('browse.search')
            ->with('searchResult',$searchResult)
            ->with('const_name',$const_name)
            ->with('genre',$genre)
            ->with('place',$place)
            ->with('user_name',$user_name)
            ->with('status',$status)
            ->with('order_date_from',$order_date_from)
            ->with('order_date_to',$order_date_to)
            ->with('displayed_num',$displayed_num)
            ->with('displayed_order',$displayed_order);
    }


    public function register() {
        return view('browse.register');
    }

    //登録フォームからの入力で新規登録
    public function registered(Request $req) {
        $this->checkInput($req); //入力値をチェック

        $req_params = $req->all(); //全てのリクエストパラメータを配列で取得
        unset($req_params['user_name']); //user_name自体は使わないので除外
        unset($req_params['_token']); //ワンタイムトークンも不要なので削除
        $req_params['user_id'] = Auth::id(); //現在ログインしているユーザーのユーザーIDを配列に追加

        //Const_orderモデル型インスタンスへ入力された値を埋め込む
        $constOrder = new Const_order();
        $constOrder->fill($req_params)
                    ->save();
        return view('browse.registered');
    }


    //編集フォームからの入力で内容更新
    public function edit(int $id) {
        $selectedRecord = Const_order::findOrFail($id); //選択されたidの工事レコードを取得

        //もしログイン中のユーザーでなければ追い返す
        if (Auth::id() !== $selectedRecord->user_id) {
            return redirect('/browse/search');
        } else {
            //選択された工事の編集画面を返す（ビューで使用するデータを、工事情報と担当者で分けて送る）
            return view('browse.edit', [
                'selectedConst' => $selectedRecord, //工事情報はそのまま送る
                'selectedUser' => User::findOrFail($selectedRecord->user_id) //工事情報に含まれるuser_idで、Userモデルのidを探して取得
            ]);
        }
    }

    public function edited(Request $req, int $id) {
        $this->checkInput($req); //入力値をチェック

        $editedConst = Const_order::find($id);
        $editedConst->fill($req->except('_token', 'method'))
                    ->save();
        return view('browse.edited');
    }


    //削除リンクからの遷移で削除画面を表示
    public function delete(int $id) {
        $selectedRecord = Const_order::findOrFail($id); //選択されたidの工事レコードを取得

        //もしログイン中のユーザーでなければ追い返す
        if (Auth::id() !== $selectedRecord->user_id) {
            return redirect('/browse/search');
        } else {
            //選択された工事の削除画面を返す（ビューで使用するデータを、工事情報と担当者で分けて送る）
            return view('browse.delete', [
                'selectedConst' => $selectedRecord, //工事情報はそのまま送る
                'selectedUser' => User::findOrFail($selectedRecord->user_id) //工事情報に含まれるuser_idで、Userモデルのidを探して取得
            ]);
        }
    }

    public function deleted(int $id) {
        $selectedRecord = Const_order::findOrFail($id);
        $selectedRecord->delete();
        return view('browse.deleted');
    }





    //入力値チェックメソッド
    private function checkInput(Request $req) {
        //進捗状況が発注済の時は、日付の入力が必要なため、日付の条件を入れて入力値チェック
        if ($req->status === '発注済') {
            $this->validate($req, Const_order::$rules_date);
        } else { //進捗状況が発注済でないとき、日付を入力できないようにしているため、日付の条件はスルーして入力値チェック
            $this->validate($req, Const_order::$rules);
        }
    }
    

}
