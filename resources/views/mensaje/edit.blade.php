@extends('layout')

@section('contenido')
<div class="container">
    <h1>Editar Mensaje con el id: {{$message->id}}</h1>
    <form method="POST" action="{{route('mensaje.update', $message->id)}}" >
        @csrf
        @method('PUT')
        <p><label for="nombre">
            Nombre
            <input class="form-control"type="text" name="nombre" id="" value="{{$message->nombre}}">
            {!!$errors->first('nombre', '<span class=error>:message</span>')!!}
        </label></p>
        <p><label for="email">
            Email
            <input class="form-control"type="email" name="email" id="" value="{{$message->email}}">
            {!!$errors->first('email', '<span class=error>:message</span>')!!}
        </label></p>
        <p><label for="mensaje">
            Mensaje
            <textarea class="form-control"name="mensaje" id="" cols="30" rows="10">{{$message->mensaje}}</textarea>
            {!!$errors->first('mensaje', '<span class=error>:message</span>')!!}
        </label></p>
        <input class="btn btn-primary" type="submit" value="Enviar">

    </form>
</div>
@stop
