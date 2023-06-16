<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>プロフィール作成</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <h1>プロフィール作成</h1>
        <form action="/profiles" method="POST">
            @csrf
            <div class="name">
                <h2>名前</h2>
                <input type="text" name="profile[name]" placeholder="ニックネーム" value="{{ old('profile.name') }}">
            </div>
            <input type="submit" value="決定">
        </form>
    </body>
</html>