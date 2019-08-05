@extends('layouts.app')

@section('content')

<div class="container">


    <h2>Catálogo de Productos</h2>
    
    @foreach ($products as $product)

        <div class="product">
        
        <h4>{{$product->name}}</h4>
        <img src="{{ asset('storage/notebook.jpg') }}" alt="" width='200'>

        <div class="product-info">
            
            <p>Precio: ${{ $product->price }}</p>
            <button><a href="{{ route('agregar', $product->id) }}">Comprar</a></button>
            <button><a href="{{ route('detalle', $product->id) }}">Detalles</a></button>
        </div>

        </div>

    @endforeach

</div>

@endsection