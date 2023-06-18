<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アニメ作成</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <h1>アニメ作成</h1>
            <form action="/profiles/{{ $profile->id }}/create" method="POST">
            @csrf
            <a type="hidden" value="{{ $count = 1 }}"></a>
            
            @foreach($anims as $anim)
                <h3>アニメ{{ $count }} : {{ $anim->title }}</h3><br>
                <a type="hidden" value="{{ $count++ }}"></a>
            @endforeach
            
            @if($count < 4)
                <input type="hidden" name="profile[id]" value={{ $profile->id }}>
                <input type="submit" value="検索"><br></a>
            @endif
            
            @if($count == 4)
                <a href="/profiles/{{ $profile->id }}/complete">決定</a>
            @endif
            </form>
    </body>
</html>