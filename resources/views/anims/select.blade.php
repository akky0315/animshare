<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class="title">あなたが視聴するアニメを決めよう！</h1>
        <h3>フリーマッチ</h3>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/groups/create">フリー<br></a>
        </div>
        <h3>ランダムマッチ</h3>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/anims/select/random">ランダム<br></a>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
        </div>
    </body>
</html>