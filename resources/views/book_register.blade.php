<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}"> <!-- CSSファイルをリンク -->
    <title>書籍登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="/logout" method="post">
            <input type="submit" value="ログアウト">
        </form>
        <br>
        <h1>書籍登録</h1>

        <!-- ISBN入力フォーム -->
        <form action="/search_book" method="post" class="mb-4">
            @csrf
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBNを入力してください:</label>
                <input type="text" name="isbn" id="isbn" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">検索</button>
        </form>


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

            <form action="book_register" method="post">
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
            <hr>
    {{-- <h1>書籍登録ページ</h1>
    
    <form action="/book_store" method="post">
        @csrf        
        ISBN <input type="text" name="ISBM"><br>
        書籍名 <input type="text" name="book_name" required><br>
        著者名 <input type="text" name="author" required><br>
        出版社名 <input type="text" name="publisher_name" required><br>
        価格 <input type="number" name="price" required><br>
        <input type="submit" value="登録">
    </form> <br>
    <form action="/top" method="get">
        <input type="submit" value="Topページへ戻る" class="btn btn-secondary">
    </form> --}}
    <form action="/top" method="get">
        <input type="submit" value="Topページへ戻る">
    </form>
</div>
    

        {{-- <form action="/top" method="get">
            <input type="submit" value="Topページへ戻る" class="btn btn-secondary">
        </form>
    </div>
    <form action="/logout" method="get">
        <input type="submit" value="ログアウト">
    </form> --}}

</body>
</html>
