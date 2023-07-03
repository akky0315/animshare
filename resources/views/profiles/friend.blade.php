<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>フレンド一覧</h1>
        <div class="profile">
            @csrf
            @foreach ($friends as $friend)
            <a class='name'>名前：{{ $friend->name }}</a>
            <a class='id'>ID：{{ $friend->id }}</a><br>
            @endforeach
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/friend/add">新規追加</a>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
        </div>
    </body>
</html>