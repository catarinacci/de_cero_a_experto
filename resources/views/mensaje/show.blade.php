@extends('layout')

@section('contenido')
    <div class="container">
        <h1>Mensaje</h1>
        <p>Enviado por {{$message->nombre}} - {{$message->email}}</p>
        <p>{{$message->mensaje}}</p>
    </div>
@stop
