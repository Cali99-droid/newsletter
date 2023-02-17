@extends('inicio')
@section('contenido')
<form action="{{ route('register') }}" class="form-contact" method="POST">
    @csrf
    <h2>Registro Newsletter</h2>

    <label for="nombre" class="contact-information">
        <span class="label">Nombre</span>
        <input class="input" type="text" id="nombre" name="nombre" placeholder="ej. Juan Manuel"
            value="{{old('nombre')}}">
    </label>
    @error('nombre')
    <div class="alerta error">* {{$message}}</div>
    @enderror
    <label for="email" class="contact-information">
        <span class="label">Email</span>
        <input class="input" type="email" id="email" name="email" placeholder="ej. miemail@mail.com"
            value="{{old('email')}}">
    </label>
    @error('email')
    <div class="alerta error">* {{$message}}</div>
    @enderror

    <div class="lista">
        <button class="submit" type="submit">enviar</button>
        <a class="submit" target="_blank" href="{{route('show')}}">Ver emails registrados </a>

    </div>

</form>

<script>
    setTimeout(() => {
        const alertas = document.querySelectorAll('.alerta');

        alertas.forEach(alerta => {
             alerta.remove();
        });
       
    }, 3000);
</script>
@endsection