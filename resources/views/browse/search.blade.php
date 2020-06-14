@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form action="/browse/searched" method="GET" class="form-inline">
                @csrf
                <div class="form-group col-auto">
                    <label for="const_name">工事名称</label>
                    <input id="const_name" name="const_name" type="text" size="40" class="form-control" value="{{old('const_name')}}">
                </div>
                <div class="form-group col-auto">
                    <label for="place">工事場所</label>
                    <select id="place" name="place" class="form-control" value="{{old('place')}}">
                        <option value=""></option>
                        <option value="A処理場">A処理場</option>
                        <option value="B処理場">B処理場</option>
                        <option value="C処理場">C処理場</option>
                        <option value="D処理場">D処理場</option>
                    </select>
                </div>
                <div class="form-group col-auto">
                    <label for="genre">工事種別</label>
                    <select id="genre" name="genre" class="form-control" value="{{old('genre')}}">
                        <option value=""></option>
                        <option value="土木">土木</option>
                        <option value="建築">建築</option>
                        <option value="機械">機械</option>
                        <option value="電気">電気</option>
                    </select>
                </div>
                <div class="form-group col-auto">
                    <label for="user_name">担当者</label>
                    <input id="user_name" name="user_name" type="text" class="form-control" value="{{old('user_name')}}">
                </div>
                <div class="form-group col-auto">
                    <label for="status">進捗状況</label>
                    <select id="status" name="status" class="form-control" value="{{old('status')}}">
                        <option value=""></option>
                        <option value="設計中">設計中</option>
                        <option value="積算中">積算中</option>
                        <option value="決済中">決済中</option>
                        <option value="発注済">発注済</option>
                    </select>
                </div>
                <div class="form-group col-auto">
                    <input type="submit" class="form-control" value="検索">
                </div>
            </form>
        </div>

        <hr>

        <div class="col-md-12">
            
            @if ($searchResult === null)

            @elseif ($searchResult)

            <br>
            <table class="table">
                <tr>
                    <th>工事名称</th>
                    <th>工事場所</th>
                    <th>種別</th>
                    <th>担当者</th>
                    <th>進捗状況</th>
                    <th>発注日</th>
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

                    <td>
                        @if (Auth::id() === $record->user_id)
                        <a href="/browse/edit/{{$record->c_id}}">編集</a>
                        <a href="/browse/delete/{{$record->c_id}}">削除</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="pagination justify-content-center">
                {!!$searchResult->appends(['const_name'=>$const_name,'place'=>$place,'genre'=>$genre,'user_name'=>$user_name,'status'=>$status])->render()!!}
            </div>

            @endif

        </div>
    </div>
</div>
@endsection