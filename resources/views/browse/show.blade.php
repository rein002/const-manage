@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <table class="table">
                <tr>
                    <th>工事名称</th>
                    <th>工事場所</th>
                    <th>種別</th>
                    <th>担当者</th>
                    <th>進捗状況</th>
                    <th>発注日</th>
                </tr>
                @foreach ($records as $record)
                <tr>
                    <td>{{$record->const_name}}</td>
                    <td>{{$record->place}}</td>
                    <td>{{$record->genre}}</td>

                    <!-- 結合してきたuserテーブルのnameカラムを取得！ -->
                    <td>{{$record->user->name}}</td>
                    <td>{{$record->status}}</td>
                    <td>{{$record->order_date}}</td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection