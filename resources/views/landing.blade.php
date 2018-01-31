@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Welcome to the north pole</h1>
        <p class="lead">Northpole es un sistema de gestión y archivado de ficheros que permite
            almacenar datos de forma segura, simple, y barata.</p>
        <hr class="my-4">
        <p>Inicia sesión para entrar en northpole, o regístrate si no tienes una cuenta todavía.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Registrarse</a>
            <a class="btn btn-outline-primary btn-lg" href="{{ route('login') }}" role="button">Iniciar sesión</a>
        </p>
    </div>
@endsection