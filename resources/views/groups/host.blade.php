<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <form action="/profiles/{{ $profile->id }}/groups/host" method="POST">
        @csrf
        <h1>{{ $profile->group->name }}</h1>
            @foreach($profiles as $profile)
                    <h3 class='name'>
                        名前：{{ $profile->name }}
                    </h3>
            @endforeach
            <div class="footer">
                <input type="hidden" name="profile[group_id]" value="1">
                <input type="submit" value="退出">
            </div>
        </form>
    </body>
</html>