<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>{{ $m_profile->group->name }}の皆さんが選んだアニメは次のものになります！</h1>
        @foreach($profiles as $profile)
            <input type="hidden" value="{{ $i = 1 }}">
            <h3>{{ $profile->name }}</h3>
            @foreach($anim->where("profile_id", $profile->id) as $anim2)
                @if($i > $anim->where("profile_id", $profile->id)->count()-3)
                    <h3>{{ $anim2->title }}</h3>
                @endif
                <input type="hidden" value="{{ $i++ }}">
            @endforeach<br>
        @endforeach
        
        <a href="/profiles/{{ $m_profile->id }}/groups/{{ $group->id }}/match">マッチへ</a>
    </body>
</html>