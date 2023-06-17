<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.leaapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body class="antialiased">
        <h1 class='name'>あなたの名前は{{ $profile->name }}に決まりました！<br></h1>
        <h3>続いて、あなたのおすすめしたいアニメを３つ教えてね！</h3>
        <form action="/profiles/{{ $profile->id }}/create" method="POST">
            @csrf
            <input type="hidden" name="profile[id]" value={{ $profile->id }}>
            <input type="submit" value="次へ">
        </form>
    </body>
</html>