@extends('layout')

@section('contenido')
    <div class="container">
        <h1>Todos los mensajes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message )
                    <tr>
                        <td>{{$message->id}}</td>
                        <td>
                            <a href="{{route('mensaje.show', $message->id)}}">
                                {{$message->nombre}}
                            </a>
                        </td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->mensaje}}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{route('mensaje.edit', $message->id)}}">Editar</a>
                            <form style="display: inline" action="{{route('mensaje.destroy', $message->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
