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
        <h1>検索</h1>
        <div class="content">
            <form action"profiles/{{ $profile->id }}/friend/add" method="POST">
                @csrf
                <div class="content_id">
                    <h2>
                        ID
                        <input type="number" class="textarea" name="id" placeholder="1" value="{{ old('profile.id') }}">
                    </h2>
                </div><br><br><br>
            <input type="submit" class="button" value="検索">
            </form>
        </div>
        <div class="footer_back">
            <button onclick="location.href='/profiles/{{ $profile->id }}/friend'">戻る</button>
        </div>
    </body>
</html>