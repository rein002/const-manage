@extends('layouts.app')

@section('content')

<script>
    $(function(){  
        $('#place').val("{{$place}}");
        $('#genre').val("{{$genre}}");
        $('#status').val("{{$status}}");
        $('#displayed_num').val("{{$displayed_num}}");
        $('#displayed_order').val("{{$displayed_order}}");
    });
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form action="/browse/searched" method="GET" class="form-inline">
                @csrf
                <div class="form-group col-auto">
                    <label for="const_name">工事名称</label>
                    <input id="const_name" name="const_name" type="text" size="40" class="form-control" value="{{$const_name}}">
                </div>
                <div class="form-group col-auto">
                    <label for="place">工事場所</label>
                    <select id="place" name="place" class="form-control">
                        <option value=""></option>
                        <option value="A処理場">A処理場</option>
                        <option value="B処理場">B処理場</option>
                        <option value="C処理場">C処理場</option>
                        <option value="D処理場">D処理場</option>
                    </select>
                </div>
                <div class="form-group col-auto">
                    <label for="genre">工事種別</label>
                    <select id="genre" name="genre" class="form-control">
                        <option value=""></option>
                        <option value="土木">土木</option>
                        <option value="建築">建築</option>
                        <option value="機械">機械</option>
                        <option value="電気">電気</option>
                    </select>
                </div>
                <div class="form-group col-auto">
                    <label for="user_name">担当者</label>
                    <input id="user_name" name="user_name" type="text" class="form-control" value="{{$user_name}}">
                </div>
                <div class="form-group col-auto">
                    <label for="status">進捗状況</label>
                    <select id="status" name="status" class="form-control">
                        <option value=""></option>
                        <option value="設計中">設計中</option>
                        <option value="積算中">積算中</option>
                        <option value="決済中">決済中</option>
                        <option value="発注済">発注済</option>
                    </select>
                </div>
                <div class="form-group col-auto">
                    <label for="order_date_from">発注日で指定</label>
                    <input id="order_date_from" name="order_date_from" type="date" class="form-control" value="{{$order_date_from}}">
                    <label for="order_date_to">～</label>
                    <input id="order_date_to" name="order_date_to" type="date" class="form-control" value="{{$order_date_to}}">
                </div>
                <div class="form-group col-auto">
                    <label for="displayed_num">表示件数</label>
                    <select id="displayed_num" name="displayed_num" class="form-control">
                        <option value="10">10件</option>
                        <option value="20">20件</option>
                        <option value="50">50件</option>
                    </select>
                </div>
                <div class="form-group col-auto">
                    <label for="displayed_order">表示順序</label>
                    <select id="displayed_order" name="displayed_order" class="form-control">
                        <option value="登録日DESC">登録日の新しい順</option>
                        <option value="登録日ASC">登録日の古い順</option>
                        <option value="発注日DESC">発注日の新しい順</option>
                        <option value="発注日ASC">発注日の古い順</option>
                    </select>
                </div>
                <div class="form-group col-auto">
                    <input type="submit" class="form-control btn btn-secondary" value="検索">
                </div>
            </form>
        </div>
    </div>

        <hr>

    <div class="row justify-content-center">   
            
        @if ($searchResult === null)

        @elseif ($searchResult)

        <br>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="table-info">
                    <th>工事名称</th>
                    <th>工事場所</th>
                    <th>種別</th>
                    <th>担当者</th>
                    <th>進捗状況</th>
                    <th>発注日</th>
                    <th>登録日</th>
                    <th></th>
                </tr>
                @foreach ($searchResult as $record)
                <tr>
                    <td>{{$record->const_name}}</td>
                    <td>{{$record->place}}</td>
                    <td>{{$record->genre}}</td>

                    <!-- 結合してきたuserテーブルのnameカラムを取得！ -->
                    <td>{{$record->name}}</td>
                    <td>{{$record->status}}</td>
                    <td>{{$record->order_date}}</td>

                    <!-- DBクラスでタイムスタンプを取得すると文字列での受け取りになるため、単純な文字列の抽出で年月日を表示 -->
                    <td>{{mb_substr($record->created_at, 0, 10)}}</td>

                    <td>
                        @if (Auth::id() === $record->user_id)
                        <a href="/browse/edit/{{$record->c_id}}">編集</a>
                        <a href="/browse/delete/{{$record->c_id}}">削除</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="pagination justify-content-center">
            {!!$searchResult->appends([
                'const_name'=>$const_name,
                'place'=>$place,
                'genre'=>$genre,
                'user_name'=>$user_name,
                'status'=>$status,
                'order_date_from'=>$order_date_from,
                'order_date_to'=>$order_date_to,
                'displayed_num'=>$displayed_num,
                'displayed_order'=>$displayed_order,
            ])->render()!!}
        </div>

        @endif
        
    </div>
</div>
@endsection