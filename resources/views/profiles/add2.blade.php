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
        <h1>検索結果</h1>
        <div class="content">
            <div class="content2">
                <form action"profiles/{{ $profile->id }}/friend/{{ $to_profile->id }}" method="POST">
                    @csrf
                    <h2>
                        {{ $to_profile->name }}
                    </h2>
                <input type="hidden" name="id" value="{{ $to_profile->id }}">
                    <input type="submit" class="button_add" value="追加">
                </form>
            </div>
        </div>
        <div class="footer_back">
            <button onclick="location.href='/profiles/{{ $profile->id }}/friend/add'">戻る</button>
        </div>
    </body>
</html>