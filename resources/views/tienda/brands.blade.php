@extends('layouts.app')

@section('content')

<<div class="text-center">
    <h2>Catálogo de Marcas</h2>
</div>

<div class="container">
    <div id="brands">
    
    @foreach ($brands as $brand)

        <div id="product-foreach" class="card text-center" style="width: 18rem;">
           <a href="{{ route('marca_productos', $brand->id) }}"><img src="{{ Storage::url($brand->image) }}" class="card-img-top" alt=""></a>
            
            <h3>{{$brand->name}}</h3>

            <div class="card-body">
                
                <p>{{ $brand->description }}</p>
                <a class="btn btn-primary" href="{{ route('marca_productos', $brand->id) }}" role="button">Detalles</a>
            
            </div>

        </div>

    @endforeach
    </div>

    <div class="text-center">
        {{$brands->links()}}
    </div>
</div>

@endsection