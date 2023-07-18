<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class='title'>あなたの視聴するアニメは{{ $to_profile->name }}さんが選んだものに決まった！<br></h1>
        <a type="hidden" value="{{ $count = 1 }}"></a>
        <div class="content">
            <form action="/profiles/{{ $profile->id }}/anims" method="POST">
            @csrf
            <div class="anims">
                @foreach($anims as $anim)
                <div class="anim">
                    <h3>アニメ{{ $count }} : {{ $anim->title }}</h3>
                    <input type="radio" name="id" value={{ $anim->id }}>
                </div>
                <a type="hidden" value="{{ $count++ }}"></a>
                @endforeach
                <input type="hidden" name=profile[name] value="{{ $profile->name }}">
            </div>
            <input type='submit' value="決定">
            </form>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/anims/select/random">再選択</a>
        </div>
    </body>
</html>