<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Animshare</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
    <h1 class="title">アニメを年代とクールから検索しよう！</h1>
    <div class="content">
        <form action="/profiles/{{ $profile->id }}/anims/edit/create" method="POST">
            @csrf
            <div class="content_year">
                <a>年代：</a>
                <input type="number" name="num[year]" placeholder="2023">
                <p class="year_error" style="color:red">{{ $errors->first('num.year') }}</p>
            </div>
            <div class="content_cule">
                <a>クール：</a>
                <input type="number" name="num[cule]" placeholder="1">
                <p class="cule_error" style="color:red">{{ $errors->first('num.cule') }}</p><br>
                <a>例）</a><br>
                <a>冬に放送されたアニメ：１<br>春に放送されたアニメ：２<br></a>
                <a>夏に放送されたアニメ：３<br>秋に放送されたアニメ：４<br></a>
            </div>
            <input type="submit" value="決定">
        </form>
    </div>
    </body>
</html>