<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>書籍一覧</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>書籍一覧</h1>
    <table class="table">
        <tr>
            <th scope="col">書籍名</th>
            <th scope="col">著者名</th>
            <th scope="col">出版社名</th>
            <th scope="col">レビュー件数</th>
            <th scope="col">平均点</th>
            <th scope="col">画像</th>
        </tr>
        @if ($books->isEmpty())
            <tr>
                <td colspan="6">書籍が見つかりませんでした。</td>
            </tr>
        @else
            @foreach ($books as $record)
                <tr>
                    <td>{{$record->book_name}}</td>
                    <td>{{$record->author}}</td>
                    <td>{{$record->publisher_name}}</td>
                    <td>{{$record->review_count}}</td>
                    <td>{{$record->avg_score}}</td>
                    <td>
                        @if ($record->image_url)
                            <img src="{{$record->image_url}}" alt="{{$record->book_name}}の画像" style="width:50px;height:auto;">
                        @else
                            画像なし
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</body>
</html>
