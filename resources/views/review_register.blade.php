<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>レビュー登録</title>
</head>
<body>
    <a href="/">ログアウト</a>
    <h1>レビューの新規登録</h1>
    <form action="/store" method="post">
        @csrf
        <td>{{$name}}</td><br>
        <div>
            <label for="post_content">レビュー本文</label>
            <textarea name="post_content" id="post_content" rows="3" required></textarea>
        </div>
            <p>点数</p>
                <input type="radio" name="reviewScore" value="1点">☆1
                <input type="radio" name="reviewScore" value="2点">☆2
                <input type="radio" name="reviewScore" value="3点">☆3
                <input type="radio" name="reviewScore" value="4点">☆4
                <input type="radio" name="reviewScore" value="5点">☆5
                <br>
                <input type="submit" value="登録">
    </form>
    <a href="/index">一覧表示に戻る</a>
</body>
</html>