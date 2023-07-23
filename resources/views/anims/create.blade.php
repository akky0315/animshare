<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <h1 class="title">アニメ作成</h1>
        <div class="content">
            @if ($profile_count->anims_count < 3)
            <form action="/profiles/{{ $profile->id }}/create" method="POST">
            @csrf
            <div class="content_anims">
                @foreach($anims as $anim)
                <div class="anim">
                    <h3>アニメ名 : {{ $anim->title }}</h3>
                </div>
                @endforeach
            </div>
            <a href="/profiles/{{ $profile->id }}/anims/create/check/select">選択</a>
            @endif
            
            @if($profile_count->anims_count >= 3)
            <div class="anims">
                @foreach($anims as $anim)
                <div class="anim">
                    <h3>アニメ名 : {{ $anim->title }}</h3>
                </div>
                @endforeach
            </div>
            <div class="footer">
                <a href="/profiles/{{ $profile->id }}/complete">決定</a>
            </div>
            @endif
            </form>
        </div>
    </body>
</html>