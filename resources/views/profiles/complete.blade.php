<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>あなたのおすすめアニメが決まったよ！<br></h1>
        @csrf
        <a type="hidden" value="{{ $count = 1 }}"></a>
            @foreach($anims as $anim)
            <h3>アニメ{{ $count }} : {{ $anim->title }}</h3>
            <a type="hidden" value="{{ $count++ }}"></a>
            @endforeach
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/home">ホームへ</a>
        </div>
    </body>
</html>