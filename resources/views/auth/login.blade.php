@extends('layout')

@section('contenido')
    <div class="container">
        <h1>Login</h1>
        <form class="form-inline" action="/login" method="post">
            @csrf
            <input class="form-control" type="email" name="email" id="" placeholder="Email">
            <input class="form-control" type="password" name="password" id="" placeholder="Password">
            <input class="btn btn-primary" type="submit" value="Entrar">
        </form>
    </div>
    <br>
@stop
