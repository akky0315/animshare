<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/app.app_welcome.css') }}">
    </head>
    
    <body class="antialiased">
        <h1 class="title">アニメシェアサイトへようこそ！<br></h1>
        <div class="content">
            <h3 type="text">
                このサイトでは、サイトを訪れた人にこれまで見てきたアニメの中で、<br>
                おすすめしたいと思ったアニメを紹介してもらっています！<br>
                あなたがおすすめしたいと思ったアニメもぜひ紹介してほしいです！<br><br>
                また紹介してくれたアニメはシェアされるので、新しいジャンルの発見や<br>
                今まで見たことのなかったアニメを見るきっかけにしてね！<br>
            </h3>
        </div><br>
        <div class="footer">
            <button onclick="location.href='/profiles/create'">始める<br></button>
        </div>
    </body>
</html>