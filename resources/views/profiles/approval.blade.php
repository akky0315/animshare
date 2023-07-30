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
        <h1>未承認</h1>
        <div class="profile">
            @csrf
            @foreach ($waitees as $waitee)
                @if($waitee->pivot->approval === 0)
                    <h2 class='name'>名前：{{ $waitee->name }}</h2>
                    <form action="/profiles/{{ $profile->id }}/friend/approval" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $waitee->id }}">
                        <input type="hidden" name="true" value="1">
                        <input type="submit" class="button_approval" value="承認">
                    </form>
                    <form action="/profiles/{{ $profile->id }}/{{ $waitee->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="button_leave" value="拒否">
                    </form>
                @endif
            @endforeach
        </div><div class="footer_home">
            <button onclick="location.href='/profiles/{{ $profile->id }}/friend'">戻る</a>
        </div>
    </body>
</html>