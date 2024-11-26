<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビュー更新画面</title>
</head>
<body>
    <h1>投稿済みレビューの更新</h1>
    @if (isset($record))
    <form action="/update" method="post">
        @csrf
        <input type="hidden" name="id" value={{$record->id}}><br>
        投稿済みレビュー番号{{$record->id}} <br>
        投稿者名 <input type="text" name="name" value="{{$record->name}}">
        レビュー本文 <textarea name="posted_item">{{$record->posted_item}}</textarea>
        レビュー点数 
                <input type="radio" name="reviewScore" value="★☆☆☆☆">★☆☆☆☆
                <input type="radio" name="reviewScore" value="★★☆☆☆">★★☆☆☆
                <input type="radio" name="reviewScore" value="★★★☆☆">★★★☆☆
                <input type="radio" name="reviewScore" value="★★★★☆">★★★★☆
                <input type="radio" name="reviewScore" value="★★★★★">★★★★★
                <br>
                <input type="submit" value="更新">
    </form>
</body>
</html>