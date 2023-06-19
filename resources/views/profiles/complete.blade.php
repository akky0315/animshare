<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class="title">あなたのおすすめアニメが決まったよ！<br></h1>
        <a type="hidden" value="{{ $count = 1 }}"></a>
        <div class="anims">
            @csrf
            @foreach($anims as $anim)
            <div class="anim">
                <h3>アニメ{{ $count }} : {{ $anim->title }}</h3>
            </div>
            <a type="hidden" value="{{ $count++ }}"></a>
            @endforeach
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
        </div>
    </body>
</html>