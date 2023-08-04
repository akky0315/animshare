<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    </head>
    <body class="antialiased">
            <h1 class="title">{{ $profile->name }}さんようこそ！</h1><br>
        <div class="content">
            <div class="footer">
                <a href="/profiles/{{ $profile->id }}">プロフィール表示</a>
            </div><br>
            <div class="footer">
                <a href="/profiles/{{ $profile->id }}/anims/display">おすすめアニメ表示</a>
            </div><br>
            <div class="footer">
                <a href="/profiles/{{ $profile->id }}/anims/select">おすすめアニメ選択</a>
            </div><br>
            <div class="footer">
                <a href="/profiles/{{ $profile->id }}/friend">フレンド</a>
            </div><br>
            <div class="footer">
                <a href="/profiles/{{ $profile->id }}/history">選択履歴</a>
            </div>
        </div>
    </body>
</x-app-layout>
</html>