<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アニメ検索</title>

        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="antialiased">
        <form action="/profiles/{{ $profile->id }}/anims/{{ $anim->id }}/create" method="POST">
            @csrf
            <a>年代：</a>
            <input type="number" name="year_num" placeholder="2023"><br>
            <a>クール：</a>
            <input type="number" name="cule_num" placeholder="1"><br><br>
            <a>例）</a><br>
            <a>冬に放送されたアニメ：１<br>春に放送されたアニメ：２<br>夏に放送されたアニメ：３<br>秋に放送されたアニメ：４<br></a>
            <input type="submit" value="決定"><br><br>
        </form>
    </body>
</html>