@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-3">BIENVENIDO A NUESTRO SITIO</h1>
        <p class="lead">Los invitamos a recorrer nuestro e-shop y encontrar los productos de más alta calidad.</p>
        <hr class="my-4">
        <p>Las mejores marcas en un solo lugar.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('productos') }}" role="button">Comenzar</a>
        </p>
    </div>
</div>
@endsection