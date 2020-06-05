<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>速習Laravel</title>
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <table class="table">
    <tr>
        <th>No.</th>
        <th>書名</th>
        <th>価格</th>
        <th>出版社</th>
        <th>刊行日</th>
        <th></th>
    </tr>
    <!-- ビュー変数$recordsに格納しているモデルインスタンスを、順に$recordに入れて処理 -->
    @foreach ($records as $id => $record)
    <tr>
        <td>{{$id+1}}</td>
        <td>{{$record->title}}</td>
        <td>{{$record->price}}円</td>
        <td>{{$record->publisher}}</td>
        <td>{{$record->published}}</td>
        <td>
            <a href="/save/{{$record->id}}/edit">編集</a>
            <a href="/save/{{$record->id}}">削除</a>
        </td>
    </tr>
    @endforeach
    </table>
</body>
</html>