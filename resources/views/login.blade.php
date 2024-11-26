<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>書籍管理システム</title>
    <link rel="stylesheet" href="styles.css"> <!-- CSSファイルをリンク -->
</head>
<body>
    <div class="login-container">
        <h1>書籍管理システム</h1>
        <h2>ログイン</h2>
        <form action="/login" method="post">
            @csrf
            <input type="text" name="userId" placeholder="ユーザーID" required>
            <input type="password" name="password" placeholder="パスワード" required>
            <a href="#" class="button">ログイン</a>
            <input type="reset" value="リセット" class="reset-button">
        </form>
    </div>
</body>
</html>
