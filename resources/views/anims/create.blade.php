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
            <a>アニメ：</a>
            <a>{{ $anim->title }}</a>
            <a href="/profiles/{{ $profile->id }}/anims/{{ $anim->id }}/create/check">検索<br></a>
        <input type="submit" value='決定'><br>
        <a href="/profile/{{ $profile->id }}/home">ホームへ</a>
    </body>
</html>