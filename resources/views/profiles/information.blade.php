<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    </head>
    
    <body class="antialiased">
        <h1>プロフィール</h1><br>
        <div class="content">
            <h3>
                あなたのこのサイト内での名前とIDになります！<br>
                IDはフレンド登録をする際に必要になるよ！
            </h3>
            <div class="profile"><br>
                <h2>名前：{{ $profile->name }}</h2><br>
                <h2>ID：{{ $profile->password }}</h2>
            </div>
            <div class="footer">
                <button onclick="location.href='/profiles/{{ $profile->id }}/edit'">編集</button>
            </div>
            <div class="footer_home">
                <button onclick="location.href='/home'">ホームへ</button>
            </div>
        </div>
    </body>
</html>