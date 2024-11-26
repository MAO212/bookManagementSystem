<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>書籍管理システム</title>
</head>
<body>
    <h1>書籍管理システム</h1>
    <h2>ログイン</h2>
    <form action="/login" method="post">
        @csrf
        ユーザーID : <input type="text" name="userId" required>
        パスワード : <input type="password" name="password" required>
        <input type="submit" value="ログイン">
        <input type="reset" value="リセット">
    </form>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

</body>
</html>