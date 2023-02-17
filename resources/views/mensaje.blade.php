@extends('inicio')
@section('contenido')
<div class="contenedor mensaje">
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Hola {{$user->name}} Revisa tu email, hemos enviado las instrucciones para
            confirmar tu suscripción</p>
    </div>
    <div>
        <form action="{{route('mensaje')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="submit" class="submit" value="Reenviar Email">
        </form>
        @if (!empty($alerta))
        <div>
            <p class="alerta exito">{{$alerta}}</p>
        </div>


        @endif
    </div>
    <!--.contenedor-sm -->

    <div class="acciones">
        <a href="{{route('register')}}">Ir a Inicio</a>
        <a href="{{route('show')}}">Ver emails registrados </a>
    </div>


</div>

<script>
    setTimeout(() => {
        const alerta = document.querySelector('.alerta');
        alerta.remove();
    }, 5000);
</script>
@endsection