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
        <h1>{{ $m_profile->group->name }}の皆さんが選んだアニメは次のものになります！</h1>
        <div class="content">
            @foreach($profiles as $profile)<br>
            <input type="hidden" value="{{ $i = 1 }}">
            <div class="profile3">
                <h2>{{ $profile->name }}</h2>
            </div><br>
            <div class="anim3">
                @foreach($anim->where("profile_id", $profile->id) as $anim2)
                    @if($i > $anim->where("profile_id", $profile->id)->count()-3)
                        <h2>アニメ名：{{ $anim2->title }}</h2><br>
                    @endif
                    <input type="hidden" value="{{ $i++ }}">
                @endforeach<br>
            </div>
            @endforeach
            <div class="footer">
                <button onclick="location.href='/profiles/{{ $m_profile->id }}/groups/{{ $group->id }}/match'">マッチへ</button>
            </div>
        </div>
    </body>
</html>