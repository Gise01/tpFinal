@extends('layouts.app')

@section('content')


<div class="text-center">
    <h2>Detalle del Producto</h2>
</div>

<div class="text-center">
    <div class="card mb-3" style="max-width: 540px;">
        
        <div class="row no-gutters">
        
            <div class="col-md-6">
                <img src="{{ Storage::url($product->image) }}" class="card-img" alt="">
            </div>

            <div class="col-md-6">
                
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p>{{$product->description}}</p>
                    <p>{{$product->category->name}}</p>
                    <p>{{$product->brand->name}}</p>
                    <p>Precio: ${{ $product->price }}</p>
                </div>
                
                <a class="btn btn-warning" href="{{ route('agregar', $product->id) }}" role="button">Comprar</a>
                <a class="btn btn-primary" href="{{ route('productos') }}" role="button">Regresar</a>   
            </div>

        </div>

    </div>
</div>

@endsection