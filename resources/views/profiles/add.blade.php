<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>検索</h1>
        <div class="content">
            <form action"profiles/{{ $profile->id }}/friend/add" method="POST">
                @csrf
                <div class="content_id">
                        ID:
                        <input type="number" name="id" placeholder="1">
                </div>
            <input type="submit" value="検索">
            </form>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">戻る</a>
        </div>
    </body>
</html>