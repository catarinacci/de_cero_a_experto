@extends('layout')

@section('contenido')
@if(session()->has('info'))
    <h3>{{session('info')}}</h3>
@else
<div class="container">
    <h1>Contacto</h1>
    <h2>Escríbeme</h2>
    <form method="POST" action="{{route('mensaje.store')}}" >
        @csrf
        <p><label for="nombre">
            Nombre
            <input class="form-control" type="text" name="nombre" id="" value="{{old('nombre')}}">
            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
        </label></p>
        <p><label for="email">
            Email
            <input class="form-control" type="email" name="email" id="" value="{{old('email')}}">
            {!!$errors->first('email', '<span class=error>:message</span>')!!}
        </label></p>
        <p><label for="mensaje">
            Mensaje
            <textarea class="form-control" name="mensaje" id="" cols="30" rows="10">{{old('mensaje')}}</textarea>
            {!!$errors->first('mensaje', '<span class=error>:message</span>')!!}
        </label></p>
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
</div>
@endif
@stop
