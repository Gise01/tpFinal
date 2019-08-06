@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Dashboard</h3>
                </div>

                <div id="card-body-admin" class="card-body">
                    <a class="btn btn-outline-success btn-lg" href="{{ route('productosadmin') }}" role="button">Productos</a>
                    <a class="btn btn-outline-info btn-lg" href="{{ route('categoriasadmin') }}" role="button">Categorias</a>
                    <a class="btn btn-outline-warning btn-lg" href="{{ route('marcasadmin') }}" role="button">Marcas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection