<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>プロフィール</h1>
        <div class="profile">
            <h3 class='name'>名前：{{ $profile->name }}<br></h3>
            <h3 class='id'>ID：{{ $profile->id }}</h3>
        </div>
        <div class="edit">
            <a href="/profile/edit">編集</a>
        </div>
        <div class="footer">
            <a href="/">ホームへ</a>
        </div>
    </body>
</html>