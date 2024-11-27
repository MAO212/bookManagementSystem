<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/topBottom.css"> <!-- CSSファイルをリンク -->
    <title>書籍詳細ページ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
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
    </style>
</head>
<body>
    <h1>書籍詳細ページ</h1>

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
            <td>{{ $record->isbn }}</td>
            <td>{{ $record->book_name }}</td>
            <td>{{ $record->author }}</td>
            <td>{{ $record->publisher_name }}</td>
            <td>{{ $record->price }}</td>
            <td><img src="{{ $record->img_link }}" alt="書籍画像" style="max-width: 100px;"></td>
            <td>{{ $record->review_count }}</td>
            <td>{{ $record->avg_score }}</td>
        </tr>
    </table>

    <h2>レビュー一覧</h2>
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif
    <!-- レビュー投稿フォーム -->
    <form action="/review_register" method="post">
        @csrf
        <input type="hidden" name="book_id" value="{{ $record->id }}"> <!-- 書籍IDを隠しフィールドで渡す -->
        <button type="submit" class="btn">レビューを投稿する</button>
    </form>

    <table>
        <tr>
            <th>レビュー者の名前</th>
            <th>レビュー本文</th>
            <th>点数</th>
            <th>編集</th>
        </tr>
        @foreach ($record->reviews as $review)
            <tr>
                <td>{{ $review->employee->name ?? '不明' }}</td>
                <td>{{ $review->post_content }}</td>
                <td>{{ $review->score }}</td>
                <td>
                    @if ($review->employee_id == $user->id)
                    <form action="/edit" method="get">
                        <input type="hidden" name="id" value="{{ $review->id }}">
                        <button type="submit" class="btn">編集</button>
                    </form>
                    @endif
                </td>
            </tr>
            
        @endforeach
    </table>
</body>
</html>
