@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <a class="btn btn-info btn-lg" href="/browse/search" role="button">
                    <div class="card-header">検索</div>

                    <div class="card-body">
                        工事を閲覧・編集・削除します
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <a class="btn btn-info btn-lg" href="/browse/register" role="button">
                    <div class="card-header">登録</div>

                    <div class="card-body">
                        新しく工事を登録します
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
