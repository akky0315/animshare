<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <div>
            <select name="anim[title]">
                @foreach($animdatas as $animdata)
                <option value='{{ $animdata['id'] }}'>{{ $animdata['title'] }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="決定"><br>
        <a href='/profiles/{{ $profile->id }}/anims/check'>戻る</a>
    </body>
</html>