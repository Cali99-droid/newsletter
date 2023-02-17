@extends('inicio')
@section('contenido')
<div class="contenedor confirmar">
    <!-- <?php //include_once __DIR__ .'/../templates/nombre-sitio.php'; 
            ?> -->
    <div class="contenedor-sm">
        <p class="descripcion-pagina">! Hola {{$user->name}} ¡</p>
        <p class="descripcion-pagina">! Gracias por confirmar tu suscripción ¡</p>

        <div class="acciones">
            <a href="{{route('register')}}">Ir a Inicio</a>
            <a href="{{route('show')}}">Ver emails registrados </a>
        </div>
    </div>
    <!--.contenedor-sm -->
</div>
@endsection