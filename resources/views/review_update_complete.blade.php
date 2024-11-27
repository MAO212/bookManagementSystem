<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/topBottom.css"> <!-- CSSファイルをリンク -->
    <title>更新完了</title>
</head>
<body>
    <a href="/">ログアウト</a>
    <h1>更新完了</h1>
    <h2>以下の内容で更新しました</h2>
    <tr><th>投稿者</th><th>レビュー本文</th><th>点数</th></tr>
    <tr>
        <td>{{$name}}</td>
        <td>{{$post_content}}</td>
        <td>{{$score}}</td>
    </tr>
    <form action="/detail" method="get">
        <input type="hidden" name="id" value="{{$book_id}}">
        <button type="submit" class="btn">戻る</button>
    </form>
    <a href="/index">一覧表示に戻る</a>
</body>
</html>