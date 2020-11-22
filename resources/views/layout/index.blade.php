<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS -->
    <script src="https://kit.fontawesome.com/d681fccbbc.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="{{ url(mix("css/style.css")) }}" >
    <link rel="stylesheet" type="text/css" href="{{ url(mix("bootstrap/bootstrap-custom.css"))}}"

</head>
<body>
<div  id="app" >
<navbar title="{{ $title}}" ></navbar>
</div>
<div class="container">
    @yield('content')
</div>


</body>

<script src="{{ url(mix("bootstrap/jquery.js"))}}"></script>
<script src="{{ url(mix("bootstrap/bootstrap.js"))}}"></script>
<script src="{{ url(mix("js/app.js")) }}"></script>
</html>
