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
        <h1 class="title">アニメを年代とクールから検索しよう！</h1>
        <div class="content">
            <form action="/profiles/{{ $profile->id }}/anims/create" method="POST">
                @csrf
                <div class="content_year">
                    <h2>年代</h2>
                    <input type="number" class="textarea" name="num[year]" placeholder="2023">
                    <p class="year_error" style="color:red">{{ $errors->first('num.year') }}</p>
                </div>
                <div class="content_cule">
                    <h2>クール</h2>
                    <input type="number" class="textarea2" name="num[cule]" placeholder="1">
                    <p class="cule_error" style="color:red">{{ $errors->first('num.cule') }}</p><br>
                    <h3>
                        例）<br>
                        冬に放送されたアニメ：１<br>春に放送されたアニメ：２<br>
                        夏に放送されたアニメ：３<br>秋に放送されたアニメ：４<br>
                    </h3>
                </div><br>
                <input type="submit" class="button" value="決定">
            </form>
            <div class="footer_back">
                <button onclick="location.href='/profiles/{{ $profile->id }}/anims/create'">戻る</a>
            </div>
        </div>
    </body>
</html>