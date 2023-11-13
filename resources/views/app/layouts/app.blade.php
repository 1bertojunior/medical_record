<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>@yield('title', 'Medical Record')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default/all.css') }}">
</head>
<body>

    <div class="container-test">
        @yield('content')
    </div>

</body>
</html>
