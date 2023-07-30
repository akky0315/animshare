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
        <div class="content">
            <h1 class="title">アニメを選択するための方法を決めよう！</h1>
            <h3>
                おすすめのアニメを選択するのには以下の２パターンのがあるよ！<br><br>
                検索パターン<br>
                アニメが放送された年代とクール数を入力して、おすすめのアニメを探す方法<br>
            </h3>
            <div class="footer">
                <button onclick="location.href='/profiles/{{ $profile->id }}/anims/edit/create/check'">検索<br></button>
            </div>
            <div class="content2">
                <h3>
                    入力パターン<br>
                    アニメタイトルをそのまま入力する方法<br>
                </h3>
            </div>
            <div class="footer">
                <button onclick="location.href='/profiles/{{ $profile->id }}/anims/edit/create/input'">入力<br></button>
            </div>
            <div class="center">
                <h3>注意</h3>
            </div>
            <h4>
                ※ 検索パターンでは2014年から現在までのものしか選択出来ないので、<br>
                2013年以前の作品を紹介したい場合は入力パターンから行ってね！<br>
                ※ 入力パターンでは相手に伝わるようにおすすめしたいアニメが何かを<br>
                伝わるようなタイトルの書き方をしてね！
            </h4>
            <div class="footer_back">
                <button onclick="location.href='/profiles/{{ $profile->id }}/anims/edit'">戻る</button>
            </div>
        </div>
    </body>
</html>