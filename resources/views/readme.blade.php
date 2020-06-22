<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>readme</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <style>
        h1 {
            margin-top: 20px;
        }
        h2 {
            margin-top: 40px;
        }
        h5 {
            margin-left: 10px;
        }
        p {
            text-indent: 1em;
        }
        dd {
            text-indent: 1em;
        }
        .prev {
            margin-top: 40px;
            margin-bottom: 30px;
            font-size: 18px;
            text-align: center;
        }
        table {
            margin-left: 10px;
        }
        td {
            padding: 0 0 0 10px;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
    
                <h1>工事発注状況管理システム readme</h1>
    
                <h2>要件定義</h2>
                    <p>とある市役所では、公共工事の発注業務をそれぞれの担当者が行っている。1人が担当する工事は複数件あり、それらを各担当者が個別でExcelで管理している。しかし、これでは他の担当者が発注する関連工事の状況を、その都度各担当者に確認しなければならず非常に業務効率が悪い。
                    <p>そこで、発注する全ての工事を一括で管理できる本システムを提案する。本システムを用いることで、他の担当者の工事名称や発注状況を一目で確認することができる。また、過去にどんな工事が発注されていたのかも素早く知ることができる。
                
                <h2>機能説明</h2>
                <dl>
                    <dt>ログイン・新規登録</dt>
                    <dd>アカウントを作成しログインすることで、システムを利用することができます。アカウント作成時にはメールアドレスを認証する必要があります。</dd>

                    <dt>検索</dt>
                    <dd>検索フォームから条件に合う工事を検索し、閲覧することができます。その際、1ページに表示する件数と、表示順序を選択することができます。なお、検索に用いる条件は全てAND条件です。</dd>

                    <dt>編集</dt>
                    <dd>検索結果一覧から編集フォームへ移動し、工事内容を編集することができます。ただし、編集できる工事は自分が担当するものに限られます。</dd>

                    <dt>削除</dt>
                    <dd>検索結果一覧から削除画面へ移動し、工事を削除することができます。ただし、削除できる工事は自分が担当するものに限られます。</dd>

                    <dt>登録</dt>
                    <dd>新規に工事を登録することができます。担当者はログインしているユーザーとなります。</dd>
                </dl>

                <h2>使用技術</h2>
                <h5>使用言語</h5>
                <ul>
                    <li>HTML 5 / CSS 3</li>
                    <li>jQuery 3.5</li>
                    <li>PHP 7.2</li>
                    <li>MySQL 5.5</li>
                </ul>
                <h5>使用フレームワーク</h5>
                <ul>
                    <li>Laravel 7</li>
                    <li>Bootstrap 4</li>
                </ul>

                <h2>更新履歴</h2>
                <table>
                    <tr><td>2020-06-19</td><td>新規アカウント登録時において、メールアドレスの認証機能を追加</td></tr>
                    <tr><td>2020-06-18</td><td>検索フォームに、発注日による絞込み機能，表示件数の選択機能，表示順序の選択機能を追加</td></tr>
                    <tr><td valign="top">2020-06-17</td><td>ナビゲーションバーを追加<br>
                                    検索結果の表をレスポンシブ対応に修正し、デザインをストライプに変更</td></tr>
                    <tr><td valign="top">2020-06-16</td><td>readmeを作成<br>
                                    検索ボタンを押したのち、フォームに入力した値が保持されるように変更</td></tr>
                    <tr><td>2020-06-14</td><td>工事発注状況管理システム 初版完成</td></tr>
                </table>


                <div class="prev">
                    <a href="/">戻る</a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
