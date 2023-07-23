<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animtitle</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class="title">あなたのおすすめアニメ</h1>
        <div class="anims">
            @foreach($anims as $anim)
            <div class="anim">
                <h3 class='anim'>アニメ：{{ $anim->title }}</h3>
            </div>
            @endforeach
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/edit">編集</a>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
        </div>
    </body>
</html>