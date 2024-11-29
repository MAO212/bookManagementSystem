<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}">
    <title>書籍一覧</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Varela+Round');
        html, body {
            overflow-x: hidden;
            height: 100%;
        }
        body {
            background: #fff;
            padding: 0;
            margin: 0;
            font-family: 'Varela Round', sans-serif;
        }
        .header {
            display: block;
            margin: 0 auto;
            width: 100%;
            max-width: 100%;
            box-shadow: none;
            background-color: #FC466B;
            position: fixed;
            height: 60px!important;
            overflow: hidden;
            z-index: 10;
        }
        .main {
            margin: 0 auto;
            display: block;
            height: 100%;
            margin-top: 60px;
        }
        .mainInner{
            display: table;
            height: 100%;
            width: 100%;
            text-align: center;
        }
        .mainInner div{
            display:table-cell;
            vertical-align: middle;
            font-size: 3em;
            font-weight: bold;
            letter-spacing: 1.25px;
        }
        #sidebarMenu {
            height: 100%;
            position: fixed;
            left: 0;
            width: 250px;
            margin-top: 60px;
            transform: translateX(-250px);
            transition: transform 250ms ease-in-out;
            background-color: #EBE3DE;
            z-index: 100; /* 追加: サイドバーを前面に表示 */

        }
        .sidebarMenuInner{
            margin:0;
            padding:0;
            border-top: 1px solid rgba(255, 255, 255, 0.10);
        }
        .sidebarMenuInner li{
            list-style: none;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            padding: 20px;
            cursor: pointer;
            border-bottom: 1px solid rgba(255, 255, 255, 0.10);
        }
        .sidebarMenuInner li span{
            display: block;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.50);
        }
        .sidebarMenuInner li a{
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }
        input[type="checkbox"]:checked ~ #sidebarMenu {
            transform: translateX(0);
        }

        input[type=checkbox] {
            transition: all 0.3s;
            box-sizing: border-box;
            display: none;
        }
        .sidebarIconToggle {
            transition: all 0.3s;
            box-sizing: border-box;
            cursor: pointer;
            position: absolute;
            z-index: 99;
            height: 100%;
            width: 100%;
            top: 22px;
            left: 15px;
            height: 22px;
            width: 22px;
        }
        .spinner {
            transition: all 0.3s;
            box-sizing: border-box;
            position: absolute;
            height: 3px;
            width: 100%;
            background-color: #fff;
        }
        .horizontal {
            transition: all 0.3s;
            box-sizing: border-box;
            position: relative;
            float: left;
            margin-top: 3px;
        }
        .diagonal.part-1 {
            position: relative;
            transition: all 0.3s;
            box-sizing: border-box;
            float: left;
        }
        .diagonal.part-2 {
            transition: all 0.3s;
            box-sizing: border-box;
            position: relative;
            float: left;
            margin-top: 3px;
        }
        input[type=checkbox]:checked ~ .sidebarIconToggle > .horizontal {
            transition: all 0.3s;
            box-sizing: border-box;
            opacity: 0;
        }
        input[type=checkbox]:checked ~ .sidebarIconToggle > .diagonal.part-1 {
            transition: all 0.3s;
            box-sizing: border-box;
            transform: rotate(135deg);
            margin-top: 8px;
        }
        input[type=checkbox]:checked ~ .sidebarIconToggle > .diagonal.part-2 {
            transition: all 0.3s;
            box-sizing: border-box;
            transform: rotate(-135deg);
            margin-top: -9px;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        table {
            text-align: center;
            width: 90%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: rgba(255, 255, 255, 0.75);
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }

        .btn-delete { /* 削除ボタン用のクラス */
            background-color: #dc3545; /* 赤色 */
        }

        .success-message {
            color: red;
            font-size: 2rem;
            text-align: center;
        }

        .bookInfo {
            font-size: 1.3rem;
        }

        .title {
            font-size: 1.8rem;
            font-family: "メイリオ"		;
        }

        .topTitle {
            text-align: center;
            margin: 0 auto;
        }
        .id, .Name {
            list-style: none;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
            padding: 20px;
            cursor: pointer;
            border-bottom: 1px solid rgba(255, 255, 255, 0.10);
        }
    </style>
</head>
<body>
    <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
    <label for="openSidebarMenu" class="sidebarIconToggle">
        <div class="spinner diagonal part-1"></div>
        <div class="spinner horizontal"></div>
        <div class="spinner diagonal part-2"></div>
    </label>
    <div id="sidebarMenu">
        @if ($user = Session::get('user', 0))
            <p class="id">ID: {{ $user['id'] }}</p>
            <p class="Name">Name: {{ $user['name'] }}</p>
        @else
            <p>No user found.</p>
        @endif
        <ul class="sidebarMenuInner">
        <li><a href="/logout" >ログアウトする</a></li>
        <li>
            <a href="/top" >Topページに戻る</a>
        </li>
        </ul>
    </div>
    <div id='center' class="main center">
        <div class="topTitle fukidashi-01-08">
            <div>書籍一覧</div>
        </div>
        <br>
        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif
        
        
    
        <table class="table">
            <tr>
                <th scope="col">書籍名</th>
                <th scope="col">著者名</th>
                <th scope="col">出版社名</th>
                <th scope="col">レビュー件数</th>
                <th scope="col">平均点</th>
                <th scope="col">画像</th>
                <th scope="col">詳細</th>
                <th scope="col">削除</th> <!-- 削除列のヘッダー -->
            </tr>
            @if ($books->isEmpty())
                <tr>
                    <td colspan="8">書籍が見つかりませんでした。</td>
                </tr>
            @else
                @foreach ($books as $record)
                    <tr>
                        <td class="bookInfo title">{{ $record->book_name }}</td>
                        <td class="bookInfo">{{ $record->author }}</td>
                        <td class="bookInfo">{{ $record->publisher_name }}</td>
                        <td class="bookInfo">{{ $record->reviews_count }}　件</td>
                        <td class="bookInfo">☆{{ number_format($record->reviews_avg_score, 1) }}</td>
                        <td>
                            @if ($record->img_link)
                                <img src="{{ $record->img_link }}" alt="{{ $record->book_name }}の画像" style="width:200px;height:auto;">
                            @else
                                <img src="img/default_image.jpg" style="width:50px;height:auto">
                            @endif
                        </td>
                        <td>
                            <form action="detail">
                                <input type="hidden" name="id" value="{{ $record->id }}">
                                <button type="submit" class="btn">詳細</button>
                            </form>
                        </td>
                        <td>
                            <form action="/book_delete" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $record->id }}">
                                <button type="submit" class="btn btn-delete" onclick="return confirm('本当に削除しますか？');">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
    
    {{-- <form action="/logout" method="get">
        <input type="submit" value="ログアウトする">
    </form> --}}

    <br>
    
</body>
</html>
