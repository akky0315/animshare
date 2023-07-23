<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class='title'>あなたのおすすめアニメ<br></h1>
        <div class="anims">
            @foreach($anims as $anim)
            <div class="anim">
                <h3>アニメ名 : {{ $anim->title }}</h3>
                <h3>選択された回数：{{ $anim->s_count }}</h3>
            </div>
            @endforeach
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/anims/edit">編集</a>
        </div>    
        <div class="footer">
            <a href="/home">ホームへ</a>
        </div>
    </body>
</html>