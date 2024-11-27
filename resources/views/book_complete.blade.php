<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/topBottom.css"> <!-- CSSファイルをリンク -->
    <title>書籍登録完了画面</title>
    {{-- Bootstrap用各種ファイルをCDNから読み込み --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <form action="/logout" method="post">
        <input type="submit" value="ログアウト">
    </form>

    <h1>以下のデータを登録しました</h1>

    <table class="table">
        <tr><th>ISBN</th><th>書籍名</th><th>著者名</th><th>出版社名</th><th>価格</th></tr>
        <tr>
            <td>{{$ISBM}}</td>
            <td>{{$book_name}}</td>
            <td>{{$author}}</td>
            <td>{{$publisher_name}}</td>
            <td>{{$price}}</td>
            <img src="{{ asset($img_link) }}" alt="書影">
        </tr>
    </table>
    <br>
    <form action="/top" method="get">
        <input type="submit" value="Topページへ戻る">
    </form>
</body>
</html>