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
        <h1>承認待ち</h1>
        <div class="profile">
            @csrf
            @foreach ($waiters as $waiter)
                @if($waiter->pivot->approval === 0)
                    <h2 class='name'>名前：{{ $waiter->name }}</h2>
                    <form action="/profiles/{{ $profile->id }}/{{ $waiter->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="button_wait" value="取り消し">
                    </form>
                @endif
            @endforeach
        </div><div class="footer_home">
            <button onclick="location.href='/profiles/{{ $profile->id }}/friend'">戻る</a>
        </div>
    </body>
</html>