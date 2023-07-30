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
        <h1>フレンド一覧</h1>
        <div class="footer_add">
            <button onclick="location.href='/profiles/{{ $profile->id }}/friend/add'">新規追加</button>
        </div>
        <div class="profile2">
            @csrf
            @foreach ($friends as $friend)
                @if ($friend->pivot->approval === 1)
                    <h2 class='name'>名前：{{ $friend->name }}</h2><br>
                    <h2 class='id'>ID：{{ $friend->password }}</h2><br>
                    <h2 class='id'>
                        参加中グループ：{{ $friend->group->name }}
                        @if($friend->group->id !== 1)
                            <form action="/profiles/{{ $profile->id }}/groups/add" method="POST">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="profile[group_id]" value={{ $friend->group->id }}>
                                <input type="submit" class="button_join" value="参加">
                            </form>
                        @endif
                        <form action="/profiles/{{ $profile->id }}/{{ $friend->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="button_delete" value="削除">
                        </form>
                    </h2>
                @endif
            @endforeach
        </div>
        <div class="footer_wait">
            <button onclick="location.href='/profiles/{{ $profile->id }}/friend/wait'">承認待ち</button>
        </div>
        <div class="footer_approval">
            <button onclick="location.href='/profiles/{{ $profile->id }}/friend/approval'">未承認</button>
        </div>
        <div class="footer_home">
            <button onclick="location.href='/home'">ホームへ</button>
        </div>
    </body>
</html>