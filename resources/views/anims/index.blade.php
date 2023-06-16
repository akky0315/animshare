<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <div>
                @foreach($animdatas as $animdata)
                    <a>{{ $animdata['title'] }}<br></a>
                @endforeach
                </div>
        </div>
        <div class="footer">
            <a href="/">ホームへ</a>
        </div>
    </body>
</html>