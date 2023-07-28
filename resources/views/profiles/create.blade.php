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
        <h1 class="title">プロフィール作成</h1>
        <div class="content">
            <form action="/profiles/create" method="POST">
                @csrf
                <div class="content_name">
                    <h3>
                        最初にあなたのニックネームを教えてね！
                    </h3>
                    <h2>名前</h2>
                    <input type="text" class="textarea" name="profile[name]" placeholder="ニックネーム">
                    <p class="name_error" style="color:red">{{ $errors->first('profile.name') }}</p>
                </div><br>
                <input type="hidden" name="profile[group_id]" value="1">
                <input class="button" type="submit" value="決定">
            </form>
        </div>
    </body>
</html>