<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>フレンド一覧</h1>
        <div class="profile">
            @csrf
            @foreach ($friends as $friend)
                @if ($friend->pivot->approval === 1)
                    <h3 class='id'>ID：{{ $friend->id }}</h3>
                    <h3 class='name'>名前：{{ $friend->name }}</h3>
                    <h3 class='id'>
                        参加中グループ：{{ $friend->group->name }}
                        @if($friend->group->id !== 1)
                            <form action="/profiles/{{ $profile->id }}/groups/add" method="POST">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="profile[group_id]" value={{ $friend->group->id }}>
                                <input type="submit" value="参加">
                            </form>
                        @endif
                        <form action="/profiles/{{ $profile->id }}/{{ $friend->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="削除">
                        </form>
                    </h3>
                @endif
            @endforeach
        </div><div class="footer">
            <a href="/profiles/{{ $profile->id }}/friend/wait">承認待ち</a>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/friend/approval">未承認</a>
        </div>
        <div class="footer">
            <a href="/profiles/{{ $profile->id }}/friend/add">新規追加</a>
        </div>
        <div class="footer">
            <a href="/home">ホームへ</a>
        </div>
    </body>
</html>