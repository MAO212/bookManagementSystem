<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
</head>
<body>
    <h1>ようこそ{{$employee->name}}さん</h1>
        <a href="/book_register">書籍登録</a>
        <br>
        <a href="/index">図書の一覧表示</a>
        <br>
        <br>
        <br>
        <a href="/login">ログアウト</a>
</body>
</html>