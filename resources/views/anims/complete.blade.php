<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    </head>
    
    <body class="antialiased">
        <h1 class='title'>
            あなたの視聴するアニメは<br>
            {{ $anim->title }}に決まりました！
        </h1>
        <div class="footer">
            <button onclick="location.href='/profiles/{{ $profile->id }}/history'">選択履歴</a>
        </div>
        <div class="footer_home">
            <button onclick="location.href='/home'">ホームへ</a>
        </div>
    </body>
</html>