<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}"> <!-- CSSファイルをリンク -->
    <title>書籍一覧</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 60px;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;

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
    </style>
</head>
<body>
    <form action="/top" method="get">
        <input type="submit" value="Topページへ戻る">
    </form>
    <form action="/logout" method="get">
        <input type="submit" value="ログアウトする">
    </form>
    <br>
    <div class="fukidashi-01-08">
        <div>書籍一覧</div>
    </div>
    <br>
    @if ($user = Session::get('user', 0))
        <p>ID: {{ $user['id'] }}</p>
        <p>Name: {{ $user['name'] }}</p>
    @else
        <p>No user found.</p>
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
        </tr>
        @if ($books->isEmpty())
            <tr>
                <td colspan="7">書籍が見つかりませんでした。</td>
            </tr>
        @else
            @foreach ($books as $record)
                <tr>
                    <td>{{ $record->book_name }}</td>
                    <td>{{ $record->author }}</td>
                    <td>{{ $record->publisher_name }}</td>
                    <td>{{ $record->reviews_count }}　件</td>
                    <td>☆{{ number_format($record->reviews_avg_score, 1) }}</td>
                    <td>
                        @if ($record->image_url)
                            <img src="{{ $record->image_url }}" alt="{{ $record->book_name }}の画像" style="width:50px;height:auto;">
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
                </tr>
            @endforeach
        @endif
    </table>
</body>
</html>