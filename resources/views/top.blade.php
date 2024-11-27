<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}"> <!-- CSSファイルをリンク -->
    <title>トップページ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 60px;
            line-height: 1.6;
        }
        .btn-custom {
            background-color: #EAC7CC;
            color: #333c5e;
            border: none;
        }
        .btn-custom:hover {
            background-color: #E6B6B6;
        }
        h1{
            color: #333c5e;
            background-color:white;
            border-left: 20px solid #C58D98;
            border-right: 20px solid #C58D98;
            border-bottom: 2px solid #C58D98;
        }
        .btn-logout {
            background-color: #B0C4DE;
            color: white;
            border: none;
            font-size: 14px; /* サイズを小さく */
            padding: 5px 10px; /* パディングを調整 */
        }
        .btn-logout:hover {
            background-color: #E6B6B6;
        }
        /* 画像を画面右下に配置するスタイル */
        .bottom-right-img {
        position: fixed;
        bottom: 190px;
        right: 475px;
        width: 500px; /* 画像の幅 */
        height: auto; /* アスペクト比を維持 */
        z-index: 1000; /* 他の要素より前面に表示 */
        }
    </style>
</head>
<body>
    @php
    $user = Session::get('user', 0)
    @endphp
    <h1>ようこそ、{{$user['name']}}さん</h1>
        <br>
        <a href="/book_register" class="btn btn-custom" style="font-size: 18px;">書籍登録</a>
        <br>
        <br>
        <a href="/index" class="btn btn-custom" style="font-size: 17px;">書籍の一覧表示</a>
        <br>
        <br>
        <br>
        <a href="/logout" class="btn btn-logout">ログアウト</a>

        <!-- 画面右下に画像を表示 -->
        <img src="{{ asset('img/azarashi.png') }}" alt="サンプル画像" class="bottom-right-img">     
</body>
</html>