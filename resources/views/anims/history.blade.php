<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class='title'>選択履歴<br></h1>
        <div class="anims">
            <h3>選択したアニメ</h3>
                <h3>{{ $profile->name }}</h3>
                @foreach($anims as $anim)
                <div class="anim">
                    <h3>・{{ $anim->title }}</h3>
                </div>
                @endforeach
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
        </div>
    </body>
</html>