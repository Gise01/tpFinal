@extends('layouts.app')

@section('content')

<div class="text-center">
    <h2>Productos en Categoria {{$category->name}}</h2>
</div>
    
<<div class="container">
    <div id="categories">
    
        @foreach ($products as $product)

            <div id="product-foreach" class="card text-center" style="width: 18rem;">
                <a href="{{ route('detalle', $product->id) }}"><img src="{{ asset('storage/icononotebook.png') }}" class="card-img-top" alt=""></a>
                
                <h3>{{$product->name}}</h3>

                <div class="card-body">     
                
                    <p>Precio: ${{ $product->price }}</p>
                    
                    <a class="btn btn-warning" href="{{ route('agregar', $product->id) }}" role="button">Comprar</a>
                    <a class="btn btn-primary" href="{{ route('detalle', $product->id) }}" role="button">Detalles</a>
                </div>
            
            </div>    
            
        @endforeach
    </div>

</div>
@endsection