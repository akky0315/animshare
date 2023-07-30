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
        <h1>{{ $year }}年の{{ $cule }}クールのアニメは以下のアニメだよ！</h1>
        <div class="content">
            <form action="/profiles/{{ $profile->id }}/anims/insert" method="POST">
                @csrf
                <div class="content_animdatas">
                    <select name="animdata" class=selectbox>
                        @foreach($animdatas as $animdata)
                        <div class='content_animdata'>
                            <option value='{{ $animdata['title'] }}'>{{ $animdata['title'] }}</option>
                        </div>
                        @endforeach
                    </select>
                </div><br><br><br>
                <input type="hidden" name="profile[id]" value={{ $profile->id }}>
                <input type="submit" class="button" value="決定"><br>
            </form>
        </div>
        <div class="footer_back">
            <button onclick="location.href='/profiles/{{ $profile->id }}/anims/create/check'">戻る</a>
        </div>
    </body>
</html>