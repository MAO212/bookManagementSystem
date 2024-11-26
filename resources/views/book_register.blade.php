<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/topBottom.css"> <!-- CSSファイルをリンク -->
    <title>書籍登録</title>
    {{-- Bootstrap用各種ファイルをCDNから読み込み --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <form action="/logout" method="post">
        <input type="submit" value="ログアウト">
    </form>
    
    <h1>書籍登録ページ</h1>
    
    <form action="/book_register" method="post">
        @csrf        
        ISBN <input type="number" name="ISBM" required><br>
        書籍名 <input type="text" name="book_name" required><br>
        著者名 <input type="text" name="author" required><br>
        出版社名 <input type="text" name="publisher_name" required><br>
        価格 <input type="number" name="price" required><br>
        画像 <img src="{{ assset($img_link) }}" alt="書影">
        <input type="submit" value="登録">
    </form>

    <form action="/topPage" method="post">
        <input type="submit" value="Topページへ戻る">
    </form>
</body>
</html>