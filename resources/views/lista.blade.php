@extends('inicio')
@section('contenido')

<div class="contenedor   contenedor-xl">
    <div class="titulo">
        <h3>Listado de usuarios registrados</h3>
    </div>
    <div class="listado-usuarios">
        <p>Nombre</p>
        <p>Email </p>
        <p>Estado</p>
    </div>
    @foreach ($users as $user)
    <div class="usuario">
        <p>{{$user->name}}</p>
        <p>{{$user->email}}</p>
        <p class="etiq {{  $user->confirmado == 1 ?  'confirmado' :  'no-confirmado' }}">{{$user->confirmado == 1 ?
            'Validado' : 'No validado'}}</p>
    </div>
    @endforeach

    <div class="acciones">
        <a href="{{route('register')}}">Ir a Inicio</a>
        <a href="{{route('show')}}">Ver emails registrados </a>
    </div>
</div>
@endsection