<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(isset($bookData))
            <h2>書籍情報</h2>
            <p>書籍名: {{ $bookData['title'] }}</p>
            <p>著者名:
                @if(isset($bookData['authors']))
                    {{ implode(', ', $bookData['authors']) }}
                @else
                    不明
                @endif
            </p>
            <p>出版社名: {{ $bookData['publisher'] ?? '不明' }}</p>
            <p>価格: {{ isset($bookData['price']) ? $bookData['price'] : '不明' }}</p>
            <p>
                @if(isset($bookData['imageLinks']['thumbnail']))
                    <img src="{{ $bookData['imageLinks']['thumbnail'] }}" alt="書籍画像" style="max-width: 100px;">
                @else
                    <p>画像はありません</p>
                @endif
            </p>



            
            <form action="/register" method="post">
                @csrf
                <input type="hidden" name="ISBN" value="{{ $bookData['industryIdentifiers'][0]['identifier'] ?? '' }}">
                <input type="hidden" name="book_name" value="{{ $bookData['title'] }}">
                <input type="hidden" name="author" value="{{ isset($bookData['authors']) ? implode(', ', (array)$bookData['authors']) : '' }}">
                <input type="hidden" name="publisher_name" value="{{ $bookData['publisher'] ?? '' }}">
                <input type="hidden" name="price" value="{{ isset($bookData['price']) ? $bookData['price'] : '' }}">
                <input type="submit" value="登録する" class="btn btn-primary">
            </form>
            
        @else
            <p>書籍が見つかりませんでした。</p>
        @endif
</body>
</html>