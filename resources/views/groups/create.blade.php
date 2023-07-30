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
        <h1 class="title">
            {{ $profile->name }}さんのグループ作成
        </h1>
        <div class="content">
            <form action="/profiles/{{ $profile->id }}/groups/create" method="POST">
                @csrf
                <div class="content_name">
                    <h2>グループ名</h2>
                    <input type="text" class="textarea2" name="group[name]" placeholder="グループ名">
                </div><br><br><br>
                <input type="submit" class="button" value="決定">
            </form>
        </div>
    </body>
</html>