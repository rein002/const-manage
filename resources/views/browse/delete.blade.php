@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <p>下記の工事を削除します。よろしいですか？<br></p>
                （※削除すると元に戻せません）</p>

            <form action="/browse/deleted/{{$selectedConst->id}}" method="POST">
                @csrf
                @method('DELETE')
                <table class="table">
                    <tr>
                        <th>工事名称：</th>
                        <td>{{$selectedConst->const_name}}</td>
                    </tr>
                    <tr>
                        <th>工事場所：</th>
                        <td>{{$selectedConst->place}}</td>
                    </tr>
                    <tr>
                        <th>工事種別：</th>
                        <td>{{$selectedConst->genre}}</td>
                    </tr>
                    <tr>
                        <th>担当者：</th>
                        <td>{{$selectedUser->name}}</td>
                    </tr>
                    <tr>
                        <th>進捗状況：</th>
                        <td>{{$selectedConst->status}}</td>
                    </tr>
                    <tr>
                        <th>発注日：</th>
                        <td>{{$selectedConst->order_date}}</td>
                    </tr>
                </table>
                
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-6 col-md-6">
                            <input type="submit" class="form-control btn btn-danger btn-lg" value="削除">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection