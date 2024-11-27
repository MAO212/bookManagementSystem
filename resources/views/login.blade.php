<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>書籍管理システム</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css"> <!-- CSSファイルをリンク -->

</head>
<body>
<div class="container">
    <div class="welcome">
      <div class="pinkbox">
        <div class="signin">
          <h1>sign in</h1>
          <!-- 追加した画像 -->
          <img class="signin-image" src="/img/bookCat.png" />
          <form class="more-padding" autocomplete="off">
            <input type="text" placeholder="username">
            <input type="password" placeholder="password">
            <button class="button submit">ログイン</button>
          </form>
        </div>
      </div>
    </div>
  </div>



    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

</body>
</html>
