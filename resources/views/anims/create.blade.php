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
        @for($i = 0; $i < 3; $i++)
            <a>アニメ：</a>
            <input type="text" name="anim[title]" placeholder="アニメ名" value="{{ old('anim.title') }}">
            <a href="/profiles/{{ $profile->id }}/anims/check">検索<br></a>
        @endfor
        <input type="submit" value='決定'><br>
        <a href="/profile/{{ $profile->id }}/home">ホームへ</a>
    </body>
</html>