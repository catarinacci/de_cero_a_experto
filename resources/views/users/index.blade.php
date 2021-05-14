@extends('layout')

@section('contenido')
<div class="container">
    <h1>Todos los Usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Role</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->display_name}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
