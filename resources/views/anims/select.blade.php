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
        <h1 class="title">あなたが視聴するアニメを決めよう！</h1>
        <div class="content">
            <h3>視聴するアニメを選択するのには以下の２パターンのがあるよ！<br><br>
                フリーマッチ<br>
                フリーマッチはグループを作成し、そのグループ内の人の中からランダムで選ばれるよ！<br>
            </h3>
            <div class="footer">
                <button onclick="location.href='/profiles/{{ $profile->id }}/groups/create'">フリー<br></button>
            </div>
            <h3>
                ランダムマッチ<br>
                ランダムマッチはサイトを訪れてくれた人の中からランダムで選ばれるよ！<br>
            </h3>
            <div class="footer">
                <button onclick="location.href='/profiles/{{ $profile->id }}/anims/select/random'">ランダム<br></button>
            </div>
            <div class="footer_home">
                <button onclick="location.href='/home'">ホームへ</button>
            </div>
        </div>
    </body>
</html>