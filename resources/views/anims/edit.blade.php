<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animtitle</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <h1 class="title">アニメ作成</h1>
        <a type="hidden" value="{{ $count = 1 }}"></a>
        <div class="content">
            <form action="/profiles/{{ $profile->id }}/edit" method="POST">
            @csrf
            <div class="content_anims">
                @foreach($anims as $anim)
                <div class="content_anim">
                    <h3>アニメ{{ $count }}を変更</h3><br>
                    <a href="/profiles/{{ $profile->id }}/anims/{{ $anim->id }}/create/check">{{ $anim->title }}</a>
                </div>
                <a type="hidden" value="{{ $count++ }}"></a>
                @endforeach
            </div>
            </form>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
        </div>
    </body>
</html>