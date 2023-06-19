<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <h1 class="title">プロフィール編集</h1>
        <div class="content">
            <form action="/profiles/{{ $profile->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content_name'>
                    <h2>名前</h2>
                    <input type='text' name='profile[name]' value="{{ $profile->name }}">
                </div>
                <input type="submit" value="決定">
            </form>
        </div>
    </body>
</html>