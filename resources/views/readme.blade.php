<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>readme</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        h2 {
            margin-top: 40px;
        }
        h1 {
            margin-top: 20px;
        }
        p {
            text-indent: 1em;
        }
        dd {
            text-indent: 1em;
        }
        .prev {
            margin-top: 40px;
            font-size: 18px;
            text-align: center;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
    
                <h1>工事発注状況管理システム readme</h1>
    
                <h2>要件定義</h2>
                    <p>とある市役所では、公共工事の発注業務をそれぞれの担当者が行っている。1人が担当する工事は複数件あり、それらを各担当者が個別でExcelで管理している。しかし、これでは他の担当者が発注する関連工事の状況を、その都度担当者に確認しなければならず非常に業務効率が悪い。
                    <p>そこで、発注する全ての工事を一括で管理できる本システムを提案する。本システムを用いることで、他の担当者の工事名称や発注状況を一目で確認することができる。また、過去にどんな工事が発注されていたのかも素早く知ることができる。
                
                <h2>機能説明</h2>
                <dl>
                    <dt>ログイン・新規登録</dt>
                    <dd>アカウントを作成しログインすることで、システムを利用することができます。</dd>

                    <dt>検索</dt>
                    <dd>検索フォームから条件に合う工事を検索し、閲覧することができます。</dd>

                    <dt>編集</dt>
                    <dd>検索結果一覧から編集フォームへ移動し、工事内容を編集することができます。ただし、編集できる工事は自分が担当するものに限られます。</dd>

                    <dt>削除</dt>
                    <dd>検索結果一覧から削除画面へ移動し、工事を削除することができます。ただし、削除できる工事は自分が担当するものに限られます。</dd>

                    <dt>登録</dt>
                    <dd>自分を担当者として、新規に工事を登録することができます。</dd>
                </dl>

                <div class="prev">
                    <a href="/">戻る</a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
