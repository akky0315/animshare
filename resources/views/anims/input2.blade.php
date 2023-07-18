<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class="title">アニメタイトル入力</h1>
        <form action="/profiles/{{ $profile->id }}/anims/edit/insert" method="POST">
            @csrf
            <input type="text" name="animdata" placeholder="アニメ名">
            <input type="hidden" name="profile[id]" value={{ $profile->id }}>
            <input type="submit" value="決定"><br>
        </form>
        <div class="footer">
            <a href='/profiles/{{ $profile->id }}/anims/edit/create/check/select'>戻る</a>
        </div>
    </body>
</html>