<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}"> <!-- CSSファイルをリンク -->
    <title>レビュー登録</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 60px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <a href="/logout">ログアウト</a>
    <h1>レビューの新規登録</h1>
    <form action="/store" method="post">
        @csrf
        <td>{{$book->book_name}}</td><br>
        <div>
            <label for="post_content">レビュー本文</label>
            <textarea name="post_content" id="post_content" rows="3" required></textarea>
        </div>
            <p>点数</p>
                <input type="radio" name="reviewScore" value="1" checked>☆1
                <input type="radio" name="reviewScore" value="2">☆2
                <input type="radio" name="reviewScore" value="3">☆3
                <input type="radio" name="reviewScore" value="4">☆4
                <input type="radio" name="reviewScore" value="5">☆5
                <br>
                <input type="hidden" name="book_id" value="{{ $book->id }}"> <!-- 書籍IDを隠しフィールドで渡す -->
                <input type="submit" value="登録">
                
    </form>
    <br>
    <a href="/index">書籍一覧に戻る</a>
</body>
</html>