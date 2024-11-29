<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}"> <!-- CSSファイルをリンク -->
    <title>レビュー更新画面</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 60px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="fukidashi-01-08">
        <div>投稿済みレビューの更新</div>
    </div>
    <br>
    @if (isset($record))
    <form action="/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$record->id}}"><br>
        投稿済みレビュー番号{{$record->id}} <br>
        レビュー本文 <textarea name="post_content">{{$record->post_content}}</textarea><br>
        レビュー点数 <br>
                <input type="radio" name="score" value="1" checked>★☆☆☆☆<br>
                <input type="radio" name="score" value="2">★★☆☆☆<br>
                <input type="radio" name="score" value="3">★★★☆☆<br>
                <input type="radio" name="score" value="4">★★★★☆<br>
                <input type="radio" name="score" value="5">★★★★★<br>
                <br>
                <input type="submit" value="更新">
    </form>
    @endif
</body>
</html>