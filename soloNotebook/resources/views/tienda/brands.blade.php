@extends('layouts.app')

@section('content')

<div class="container">


    <h2>Catálogo de Marcas</h2>
    
    @foreach ($brands as $brand)

        <div class="Brand">
        
        <h4>{{$brand->name}}</h4>
        <img src="{{ asset('storage/hp.png') }}" alt="" width='200'>

        <div class="product-info">
        
            <button><a href="{{ route('marca_productos', $brand->id) }}">Detalles</a></button>
            
        </div>

        </div>

    @endforeach

</div>

@endsection