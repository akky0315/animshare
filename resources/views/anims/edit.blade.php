<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animtitle</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <h1 class="title">アニメ編集</h1>
        <a type="hidden" value="{{ $count = 1 }}"></a>
        <div class="anims">
            @foreach($anims as $anim)
            <div class="anim">
                <h3>アニメ{{ $count }}：{{ $anim->title }}</h3>
            </div>
            <a type="hidden" value="{{ $count++ }}"></a>
            @endforeach
        </div>
        <a href="/profiles/{{ $profile->id }}/anims/edit/create/check/select">変更</a>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/anims/display">戻る</a>
        </div>
    </body>
</html>