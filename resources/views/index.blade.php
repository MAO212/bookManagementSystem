<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>書籍一覧</h1>
    <table class="table">
        <tr>
            <th>書籍名</th>
            <th>著者名</th>
            <th>出版社名</th>
            <th>レビュー件数</th>
            <th>平均点</th>
            <th>画像</th>
        </tr>
        @foreach ($books as $record)
            <tr>
                <td>{{$record->book_name}}</td>
                <td>{{$record->author}}</td>
                <td>{{$record->publisher_name}}</td>
                <td>{{$record->review_count}}</td>
                <td>{{$record->avg_score}}</td>
                <td></td>
            </tr>
        @endforeach
    </table>
</body>
</html>