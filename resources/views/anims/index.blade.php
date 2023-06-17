<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <div class="content">
            <form action="/profiles/{{ $profile->id }}/anims/{{ $anim->id }}" method="POST">
                @csrf
                <select name="anim[title]">
                    @foreach($animdatas as $animdata)
                    <option value='{{ $animdata['title'] }}'>{{ $animdata['title'] }}</option>
                    @endforeach
                </select><br>
                <input type="submit" value="決定"><br>
            </form>
        </div>
        <a href='/profiles/{{ $profile->id }}/anims/{{ $anim->id }}/check'>戻る</a>
    </body>
</html>