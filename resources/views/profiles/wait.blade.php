<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>承認待ち</h1>
        <div class="profile">
            @csrf
            @foreach ($waiters as $waiter)
                @if($waiter->pivot->approval === 0)
                    <h3 class='name'>名前：{{ $waiter->name }}</h3>
                    <h3>
                        <form action="/profiles/{{ $profile->id }}/{{ $waiter->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="取り消し">
                        </form>
                    </h3>
                @endif
            @endforeach
        </div><div class="footer">
            <a href="/profiles/{{ $profile->id }}/friend">戻る</a>
        </div>
    </body>
</html>