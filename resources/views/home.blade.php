<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class="title">{{ $profile->name }}さんようこそ！<br></h1>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}">プロフィール表示<br></a>
        </div>
        <h3>おすすめアニメ表示<br></h3>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/anims/display">表示<br></a>
        </div>
        <h3>おすすめアニメ選択<br></h3>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/anims/select">選択<br></a>
        </div>
        <div class="footer">
            <a href="/friend">フレンド<br></a>
        </div>
        <div class="footer">
            <a href="/select_history">選択履歴</a>
        </div>
    </body>
</html>