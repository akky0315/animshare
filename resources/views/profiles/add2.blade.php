<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>検索結果</h1>
        <div class="content">
        <form action"profiles/{{ $profile->id }}/friend/{{ $to_profile->id }}" method="POST">
            @csrf
            {{ $to_profile->name }}
            <input type="hidden" name="id" value="{{ $to_profile->id }}">
            <input type="submit" value="追加">
        </form>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/friend/add">戻る</a>
        </div>
    </body>
</html>