<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <div class="content">
            <form action="/profiles/{{ $profile->id }}/anims/edit/insert" method="POST">
                @csrf
                <div class="content_animdatas">
                    <select name="animdata">
                        @foreach($animdatas as $animdata)
                        <div class='content_animdata'>
                            <option value='{{ $animdata['title'] }}'>{{ $animdata['title'] }}</option>
                        </div>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="profile[id]" value={{ $profile->id }}>
                <input type="submit" value="決定"><br>
            </form>
        </div>
        <div class="footer">
            <a href='/profiles/{{ $profile->id }}/anims/edit/create/check/select'>戻る</a>
        </div>
    </body>
</html>