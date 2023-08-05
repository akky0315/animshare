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
        <h1>{{ $my_profile->group->name }}</h1><br>
        <div class="content">
            @foreach($profiles as $profile)
            <h2 class='name'>
                名前：{{ $profile->name }}
                @if($profile->preparate === 0)
                    準備中
                @else
                    準備完了
                @endif
            </h2><br>
            @if($profile->id === $my_profile->id)
                <form action="/profiles/{{ $my_profile->id }}/groups/{{ $group->id }}/preparate" method="POST">
                    @csrf
                    @if($profile->preparate === 0)
                        <div class="footer_group">
                            <input type="hidden" name="profile[preparate]" value="1">
                            <input type="hidden" name="count" value="1">
                            <input type="submit" class="button" value="準備完了">
                        </div>
                    @else
                        <div class="footer_group">
                            <input type="hidden" name="profile[preparate]" value="0">
                            @if($group->g_count > 0)
                                <input type="hidden" name="count" value="-1">
                            @endif
                            <input type="submit" class="button_yellow"value="再準備">
                        </div>
                    @endif
                </form>
                <form action="/profiles/{{ $my_profile->id }}/groups/leave" method="POST">
                    @csrf
                    <div class="footer_back">
                        <input type="hidden" name="profile[preparate]" value="0">
                        <input type="hidden" name="profile[group_id]" value="1">
                        <input type="submit" class="button" value="退出">
                    </div>
                </form>
            @endif
        @endforeach
        @if($count["profiles_count"] === $count["g_count"])
            <div class="footer">
                <button onclick="location.href='/profiles/{{ $my_profile->id }}/groups/{{ $group->id }}/match/check'">開始</button>
            </div>
        @endif
        <div class="footer_update">
            <button onclick="location.href='/profiles/{{ $my_profile->id }}/groups/{{ $group->id }}'">更新</button>
        </div>
        </div>
    </body>
</html>