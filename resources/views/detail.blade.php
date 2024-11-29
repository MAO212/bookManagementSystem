<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}"> <!-- CSSファイルをリンク -->
    <title>書籍詳細ページ</title>
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
        h1, h2 {
            color: #333;
            text-align: center;
        }
        table {
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
            display: inline-block;
            padding: 10px 15px;
            margin-top: 10px;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .success-message {
            color: green;
            margin-bottom: 20px;
        }
        .delete-btn { /* 削除ボタン用のクラス */
            background-color: #dc3545; /* 赤色 */
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
        .review-btn {
            text-align: center;
            margin: 0 auto;
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
        <li><a href="/index">書籍一覧に戻る</a></li>
        </ul>
    </div>
        {{-- {{dd($record);}} --}}
        <br>
        <div id='center' class="main center">

        <div class="topTitle fukidashi-01-08">
            <div>書籍詳細ページ</div>
        </div>
        <br>
        <h2>書籍情報</h2>
        <table>
            <tr>
                <th>ISBN</th>
                <th>書籍名</th>
                <th>著者名</th>
                <th>出版社名</th>
                <th>価格</th>
                <th>画像</th>
                <th>レビュー件数</th>
                <th>平均点</th>
            </tr>
            <tr>
                {{-- {{dd($record);}} --}}
                <td>{{ $record->ISBN }}</td>
                <td>{{ $record->book_name }}</td>
                <td>{{ $record->author }}</td>
                <td>{{ $record->publisher_name }}</td>
                <td>￥{{ $record->price }}</td>
                {{-- {{dd($record->img_link)}} --}}

                <td>
                    @if ($record->img_link)
                        <img src="{{ $record->img_link }}"  style="width:200px;height:auto;">
                    @else
                        <img src="img/default_image.jpg" style="width:50px;height:auto">
                    @endif
                </td>
                <td>{{ $record->reviews_count }}　件</td>
                <td>☆{{ number_format($record->reviews_avg_score, 1) }}</td>
            </tr>
        </table>

        <h2>レビュー一覧</h2>
        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif
        <!-- レビュー投稿フォーム -->
        <div style="text-align: center; margin: 20px 0;">
            <form action="/review_register" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{ $record->id }}"> <!-- 書籍IDを隠しフィールドで渡す -->
                <button type="submit" class="btn">レビューを投稿する</button>
            </form>
        </div>

        <table>
            <tr>
                <th>レビュー者の名前</th>
                <th>レビュー本文</th>
                <th>点数</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
            @foreach ($record->reviews as $review)
                <tr>
                    <td>{{ $review->employee->name ?? '不明' }}</td>
                    <td>{{ $review->post_content }}</td>
                    <td>☆{{ $review->score }}</td>
                    <td>
                        @if ($review->employee_id == $user->id)
                        <form action="/edit" method="get" style="display:inline;">
                            <input type="hidden" name="id" value="{{ $review->id }}">
                            <button type="submit" class="btn">編集</button>
                        </form>
                        @endif
                    </td>
                    <td>
                        @if ($review->employee_id == $user->id)
                            <form action="/delete" method="post" style="display:inline;" onsubmit="return confirm('本当にこのレビューを削除してもよろしいですか？');">
                                @csrf
                                <input type="hidden" name="id" value="{{ $review->id }}">
                                <button type="submit" class="btn delete-btn">削除</button>
                            </form>
                        @endif
                    </td>
                </tr>
                
            @endforeach
        </table>
    </div>

</body>
</html>
