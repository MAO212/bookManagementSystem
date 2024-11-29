<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/topBottom.css') }}"> <!-- 自作CSSファイル -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>更新完了</title>
</head>
<body>
    <header class="py-3">
        <div class="container">
            <nav class="d-flex justify-content-between">
                <a href="/" class="btn btn-link">ログアウト</a>
                <a href="/index" class="btn btn-link">書籍一覧に戻る</a>
            </nav>
        </div>
    </header>

    <main class="container mt-5">
        <h1 class="text-center">更新完了</h1>
        <h2 class="text-center">以下の内容で更新しました</h2>

        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>投稿者</th>
                        <th>レビュー本文</th>
                        <th>点数</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $name }}</td>
                        <td>{{ $post_content }}</td>
                        <td>{{ $score }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form action="/detail" method="get" class="mt-4 text-center">
            <input type="hidden" name="id" value="{{ $book_id }}">
            <button type="submit" class="btn btn-primary">戻る</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
