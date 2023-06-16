<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class='name'>{{ $profile->name }}さんようこそ！<br></h1>
        <a href="/profiles/{{ $profile->id }}">プロフィール表示<br></a>
        <div class='display'>
            <h3>おすすめアニメ表示<br></h3>
            <a href="/display">表示<br></a>
        </div>
        <div class='select'>
            <h3>おすすめアニメ選択<br></h3>
            <a href="/select">選択<br></a>
        </div>
        <div class='friend'>
            <a href="/friend">フレンド<br></a>
        </div>
        <div class='select_history'>
            <a href='/select_history'>選択履歴</a>
        </div>
    </body>
</html>