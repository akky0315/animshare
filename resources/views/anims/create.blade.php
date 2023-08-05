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
        <h1 class="title">アニメ作成</h1>
        <div class="content">
            @if ($profile_count->anims_count < 3)
            <h3>
                {{ $profile->name }}さんようこそ！<br>
                次に、あなたが紹介したいおすすめのアニメを３つ選んでね！
            </h3>
            <form action="/profiles/{{ $profile->id }}/create" method="POST">
                @csrf
                <div class="content_anims"><br>
                    @foreach($anims as $anim)
                        <div class="anim"><br>
                            <h2>アニメ名 : {{ $anim->title }}</h2>
                        </div><br>
                    @endforeach
                </div>
            </form>
            <div class="footer">
                <button onclick="location.href='/profiles/{{ $profile->id }}/anims/create/check/select'">選択</button>
            </div>
            @endif
            
            @if($profile_count->anims_count >= 3)
            <h3>
                {{ $profile->name }}さんのおすすめするアニメは以下の３つになります！<br>
                おすすめするアニメはあとで変更可能だよ！
            </h3>
            <form action="/profiles/{{ $profile->id }}/create" method="POST">
                @csrf
                <div class="content_anims"><br>
                    @foreach($anims as $anim)
                        <div class="anim"><br>
                            <h2>アニメ名 : {{ $anim->title }}</h2>
                        </div><br>
                    @endforeach
                </div>
            </form>
            <div class="footer">
                <button onclick="location.href='/home'">決定</a>
            </div>
            @endif
        </div>
    </body>
</html>