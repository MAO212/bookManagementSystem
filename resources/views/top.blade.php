<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}"> <!-- CSSファイルをリンク -->
    <title>トップページ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7c1b9b8fec.js" crossorigin="anonymous"></script>
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
            border: 1px solid black; /* 枠線の色（黒） */

        }
        .btn-custom:hover {
            background-color: #E6B6B6;
        }
        h1{
            color: #333c5e;
        }
        .btn-logout {
            background-color: #B0C4DE;
            color: white;
            border: none;
            font-size: 14px; /* サイズを小さく */
            padding: 5px 10px; /* パディングを調整 */
            border: 1px solid black; /* 枠線の色（黒） */

        }
        .btn-logout:hover {
            background-color: #ADCDEC;
        }
        /* 画像を画面右下に配置するスタイル */
        .bottom-right-img {
    position: fixed;
    bottom: 22%; /* 下から5%の位置に配置 */
    right: 24%; /* 右から5%の位置に配置 */
    width: 480px; /* 画像の幅 */
    height: auto; /* アスペクト比を維持 */
    z-index: -1; /* ボタンの下のレイヤに配置 */
}

    </style>
</head>
<body class="page-center">
    @php
    $user = Session::get('user', 0)
    @endphp
    <div class="fukidashi-01-08">
        <div>ようこそ、{{$user['name']}}さん</div>
    </div>
        <br>
        <br>
        <a href="/book_register" class="btn btn-custom" style="font-size: 18px;"><i class="fa-solid fa-magnifying-glass"></i>　書籍登録</a>
        <br>
        <a href="/index" class="btn btn-custom" style="font-size: 17px;"><i class="fa-solid fa-book"></i>　書籍の一覧表示</a>
        <br>
        <br>
        <br>

        <a href="/logout" class="btn btn-logout"><i class="fa-solid fa-right-from-bracket"></i>　ログアウト</a>

        <!-- 画面右下に画像を表示 -->
        <img src="{{ asset('img/azarashi.png') }}" alt="あざらし画像" class="bottom-right-img">   
</body>
</html>