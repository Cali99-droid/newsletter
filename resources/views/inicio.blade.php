<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700;900&display=swap" rel="stylesheet">
    <!-- Fonts -->


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>

<body class="antialiased">
    <div class="contenedor">
        <h2>Newsteller</h2>
    </div>
    <main>
        @yield('contenido')
    </main>
</body>

</html>