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
            <h3 class='name'>名前：{{ $profile->name }}<br></h3>
            <h3 class='id'>ID：{{ $profile->id }}</h3>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/friend/add">新規追加</a>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
        </div>
    </body>
</html>