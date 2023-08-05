<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animtitle</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    </head>
    <body class="antialiased">
        <h1 class="title">アニメ編集</h1>
        <div class="content">
            <h3>お勧めするアニメを変更する際には、3つ目のアニメが変更されます</h3>
        </div>
        <a type="hidden" value="{{ $count = 1 }}"></a>
        <div class="anims">
            @foreach($anims as $anim)
            <div class="anim5"><br>
                <h2>アニメ名：{{ $anim->title }}</h2>
            </div><br>
            <a type="hidden" value="{{ $count++ }}"></a>
            @if($count === 4)
                <h2><br>次変更になるアニメ：{{ $anim->title }}</h2>
            @endif
            @endforeach
        </div>
        <div class="footer">
            <button onclick="location.href='/profiles/{{ $profile->id }}/anims/edit/create/check/select'">変更</a>
        </div>
        <div class="footer_back">
            <button onclick="location.href='/profiles/{{ $profile->id }}/anims/display'">戻る</a>
        </div>
    </body>
</html>