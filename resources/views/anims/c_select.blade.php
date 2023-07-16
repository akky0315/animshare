<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class="title">アニメ選ぶための方法を決めよう！</h1>
        <h3>検索</h3>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/anims/create/check">検索<br></a>
        </div>
        <h3>入力</h3>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/anims/create/input">入力<br></a>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
        </div>
    </body>
</html>