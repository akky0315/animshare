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
        <h1 class='title'>あなたのおすすめアニメ<br></h1>
        <div class="culum">
            <h3>選択された回数</h3>
        </div><br>
        <div class="anims">
            @foreach($anims as $anim)
            <div class="anim5">
                <h2>アニメ名 : {{ $anim->title }}</h2>
            </div>
            <div class="num">
                <h2>{{ $anim->s_count }}</h2>
            </div>
            @endforeach
        </div>
        <div class="footer">
            <button onclick="location.href='/profiles/{{ $profile->id }}/anims/edit'">編集</button>
        </div>    
        <div class="footer_home">
            <button onclick="location.href='/home'">ホームへ</button>
        </div>
    </body>
</html>