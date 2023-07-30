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
        <h1 class="title">アニメタイトル入力</h1>
        <div class="content">
            <h3>あなたがおすすめしたいアニメのタイトルを入力してね！</h3>
        </div>
        <form action="/profiles/{{ $profile->id }}/anims/edit/insert" method="POST">
            @csrf
            <input type="text" class="textbox" name="animdata" placeholder="アニメタイトル"><br><br><br>
            <input type="hidden" name="profile[id]" value={{ $profile->id }}>
            <input type="submit" class="button" value="決定"><br>
        </form>
    </body>
    <div class="footer_back">
        <button onclick="location.href='/profiles/{{ $profile->id }}/anims/edit/create/check/select'">戻る</a>
    </div>
</html>