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

        <form action="/top" method="get">
            <input type="submit" value="Topページへ戻る" class="btn btn-secondary">
        </form>
    </div>
    <form action="/logout" method="get">
        <input type="submit" value="ログアウト">
    </form>
</body>
</html>
