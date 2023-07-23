<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1>未承認</h1>
        <div class="profile">
            @csrf
            @foreach ($waitees as $waitee)
                @if($waitee->pivot->approval === 0)
                    <h3 class='name'>名前：{{ $waitee->name }}</h3>
                    <h3>
                        <form action="/profiles/{{ $profile->id }}/friend/approval" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $waitee->id }}">
                            <input type="hidden" name="true" value="1">
                            <input type="submit" value="承認">
                        </form>
                        <form action="/profiles/{{ $profile->id }}/{{ $waitee->id }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="拒否">
                        </form>
                    </h3>
                @endif
            @endforeach
        </div><div class="footer">
            <a href="/profiles/{{ $profile->id }}/friend">戻る</a>
        </div>
    </body>
</html>