@extends('layouts.app')

@section('content')

<div class="container">


    <h2>Detalle del producto</h2>
    
    <div class="products-block">
        
        <img src="{{ asset('storage/notebook.jpg') }}" alt="" width='200'>

    </div>

    <div class="products-block">
        
        <h4>{{$product->name}}</h4>
        
        <div class="product-info">
            <p>{{$product->description}}</p>

            <p>{{$product->category->name}}</p>

            <p>{{$product->brand->name}}</p>
        
            <p>Precio: ${{ $product->price }}</p>
            
            <button><a href="{{ route('agregar', $product->id) }}">Comprar</a></button>
        </div>
        
    </div>

    <button><a href="{{ route('productos') }}">Regresar</a></button>    

</div>

@endsection