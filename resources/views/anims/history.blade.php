<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class='title'>選択履歴<br></h1>
        <div class="anims">
            <h3>選択したアニメ</h3>
                @foreach($anims as $anim)
                <div class="anim">
                    <h3>・{{ $anim->title }} {{ $anim->profile->name }}</h3>
                </div>
                @endforeach
        </div>
        <div class="footer">
            <a href="/home">ホームへ</a>
        </div>
    </body>
</html>