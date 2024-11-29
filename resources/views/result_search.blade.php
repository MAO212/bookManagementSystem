<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}"> <!-- CSSファイルをリンク -->
    <title>書籍検索結果</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 60px;
            line-height: 1.6;
        }
        h1{
            color: #333c5e;
            background-color:white;
            border-left: 20px solid #C58D98;
            border-right: 20px solid #C58D98;
            border-bottom: 2px solid #C58D98;
        }
        .btn-primary {
            background-color: #B0C4DE;
            color: white;
            border: none;
            font-size: 14px; /* サイズを小さく */
            padding: 5px 10px; /* パディングを調整 */
        }
        .btn-primary:hover {
            background-color: #ADCDEC;
        }
    </style>

</head>
<body>
    {{-- {{dd($bookData);}} --}}
    @if(isset($bookData))
        <div class="fukidashi-01-08">
            <div>書籍情報</div>
        </div>
        <br>
        <br>
            <p>ISBN: {{ $bookData['isbn'] }}</p>
            <p>書籍名: {{ $bookData['title'] }}</p>
            <p>著者名:
                @if(isset($bookData['author']))
                     {{$bookData['author']}}
                @else
                    不明
                @endif
            </p>
            <p>出版社名: {{ $bookData['publisher'] ?? '不明' }}</p>
            <p>価格: ￥{{ isset($bookData['price']) ? $bookData['price'] : '不明' }}</p>
            <p>
                @if(isset($bookData['img_link']))
                    <img src="{{ $bookData['img_link'] }}" alt="書籍画像" style="max-width: 250px;">
                @else
                    <p>画像はありません</p>
                @endif
            </p>



            {{-- {{ dd($bookData['author']);}} --}}
            <form action="/register" method="post">
                @csrf
                <input type="hidden" name="isbn" value="{{ $bookData['isbn'] ?? '' }}">
                <input type="hidden" name="book_name" value="{{ $bookData['title'] }}">
                <input type="hidden" name="author" value="{{ $bookData['author'] ?? '' }}">
                <input type="hidden" name="publisher_name" value="{{ $bookData['publisher'] ?? '' }}">
                <input type="hidden" name="price" value="{{ isset($bookData['price']) ? $bookData['price'] : '' }}">
                <input type="submit" value="登録する" class="btn btn-primary">
            </form>
            
        @else
            <p>書籍が見つかりませんでした。</p>
        @endif
</body>
</html>