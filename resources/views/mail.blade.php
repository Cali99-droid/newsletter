<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700;900&display=swap" rel="stylesheet">

    <title>Email</title>

</head>
<style>
    body {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

    }

    .cont-tit {
        background-color: rgb(224, 224, 224);
        padding: 1.6rem;
    }

    .titulo {
        color: #4682b4;
    }

    .enlace {
        color: #ffffff;
        background-color: rgb(255, 81, 0);
        font-weight: bold;
        text-decoration: none;
        padding: .6rem;
        border-radius: 15px;
    }

    .cont {
        background-color: #4682b4;
        padding: 2rem;
        color: #ffffff;
        font-weight: bold;
    }
</style>

<body>
    <div class="cont-tit">
        <h1 class="titulo"> {{ $mailData['titulo'] }}
        </h1>
    </div>
    <div class="cont">
        <p>Presiona el siguiente botón para confirmar su suscripción:</p>
        <a class="enlace" href="http://localhost/confirmar?token={{$mailData['token'] }}"
            class="font-medium text-black-600 dark:text-black-900 hover:underline">Confirmar mi suscripción</a>
        <p class="text-gray-400">si no realizaste esta suscripción, puedes omitir este mensaje.
        </p>
    </div>
    {{-- <p class=" text-gray-500">Gravedad: {{ $mailData['descripcion'] }}</p> --}}
</body>

</html>