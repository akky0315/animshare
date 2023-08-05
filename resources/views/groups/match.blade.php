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
        <h1 class='title'>
            あなたの視聴するアニメは{{ $to_profile->name }}さんが選んだものに決まりました！
            </h1>
        <div class="content"><br>
            <form action="/profiles/{{ $profile->id }}/groups" method="POST">
                @csrf
                <div class="anims">
                    @foreach($anims as $anim)
                        <div class="anim3">
                            <h2>アニメ名 : {{ $anim->title }}</h2>
                        </div>
                        <div class="radio">
                            <input type="radio" name="id" value={{ $anim->id }}  style="transform:scale(1.5)">
                        </div>
                    @endforeach
                    <input type="hidden" name=profile[name] value="{{ $profile->name }}">
                    <h3><br>
                        グループ全員のマッチが完了してからアニメを選択して決定ボタンを押してね！
                    </h3>
                </div><br><br>
                <input type='submit' class="button" value="決定">
            </form>
        </div>
    </body>
</html>