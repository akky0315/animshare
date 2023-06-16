<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>あなたのおすすめアニメ</h1>
        <div class="profile">
            @foreach($anims as $anim)
            <h3 class='anim'>アニメ：{{ $anim->title }}<br></h3>
            @endforeach
        </div>
        <div class="edit">
            <a href="/anim/edit">編集</a>
        </div>
        <div class="footer">
            <a href="/">ホームへ</a>
        </div>
    </body>
</html>