@extends('layouts.app')

@section('content')


<div class="text-center">
    <h2>Detalle del Producto</h2>
</div>
    
<div id="product">
    
    <div class="card text-center" style="width: 18rem;">
        <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="">
        <h4>{{$product->name}}</h4>

        <div class="card-body">
            <p>{{$product->description}}</p>
            <p>{{$product->category->name}}</p>
            <p>{{$product->brand->name}}</p>
            <p>Precio: ${{ $product->price }}</p>
            
            <a class="btn btn-warning" href="{{ route('agregar', $product->id) }}" role="button">Comprar</a>
            <a class="btn btn-primary" href="{{ route('productos') }}" role="button">Regresar</a>   
        </div>
    </div>

</div>

@endsection