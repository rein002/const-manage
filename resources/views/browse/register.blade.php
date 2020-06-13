@extends('layouts.app')

@section('content')

<script>
$(function(){
    $('#status').change(function(){
        if ($(this).val() === '発注済') {
            $('#order_date').prop('readonly', false);
        } else {
            $('#order_date').val("")
                            .prop('readonly', true);
        }
    });

    $('#place').val("{{old('place')}}");
    $('#genre').val("{{old('genre')}}");
    $('#status').val("{{old('status')}}");
});
</script>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $err)
                <li class="text-danger">{{$err}}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <form action="/browse/registered" method="POST">
                @csrf
                <div class="form-group">
                    <label for="const_name">工事名称</label>
                    <input id="const_name" name="const_name" type="text" class="form-control" value="{{old('const_name')}}">
                </div>
                <div class="form-group">
                    <label for="place">工事場所</label>
                    <select id="place" name="place" class="form-control">
                        <option value=""></option>
                        <option value="A処理場">A処理場</option>
                        <option value="B処理場">B処理場</option>
                        <option value="C処理場">C処理場</option>
                        <option value="D処理場">D処理場</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="genre">工事種別</label>
                    <select id="genre" name="genre" class="form-control">
                        <option value=""></option>
                        <option value="土木">土木</option>
                        <option value="建築">建築</option>
                        <option value="機械">機械</option>
                        <option value="電気">電気</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_name">担当者</label>
                    <input id="user_name" name="user_name" type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="status">進捗状況</label>
                    <select id="status" name="status" class="form-control">
                        <option value=""></option>
                        <option value="設計中">設計中</option>
                        <option value="積算中">積算中</option>
                        <option value="決済中">決済中</option>
                        <option value="発注済">発注済</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order_date">発注日</label>
                    <input id="order_date" name="order_date" type="date" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <input type="submit" class="form-control btn btn-info btn-lg" value="登録">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection