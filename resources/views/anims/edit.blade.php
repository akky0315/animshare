<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アニメ作成</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <h1>アニメ作成</h1>
            <form action="/profiles/{{ $profile->id }}/edit" method="POST">
            @csrf
            <a type="hidden" value="{{ $count = 1 }}"></a>
            
            @foreach($anims as $anim)
                <h3>アニメ{{ $count }}を変更</h3><br>
                <a href="/profiles/{{ $profile->id }}/anims/{{ $anim->id }}/create/check">{{ $anim->title }}</a>
                <a type="hidden" value="{{ $count++ }}"></a>
            @endforeach
            <div class="footer">
                <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
            </div>
            </form>
    </body>
</html>