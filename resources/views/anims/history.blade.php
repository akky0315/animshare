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
        <h1 class='title'>選択履歴<br></h1>
        <div class="culum2">
            <h3>アニメ名</h3>
        </div>
        <div class="culum3">
            <h3>紹介者</h3>
        </div>
        <div class="content2">
            <div class="anims">
                @foreach($anims as $anim)
                    <div class="anim4">
                        <h2>{{ $anim->title }}</h2>
                    </div>
                    <div class="name10">
                        <h2>{{ $anim->profile->name }}</h2>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="footer_home">
            <button onclick="location.href='/home'">ホームへ</a>
        </div>
    </body>
</html>