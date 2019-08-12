@extends('layouts.appadmin')

@section('content')
<div class="text-center">
    <a class="btn btn-info btn-lg" href="{{ route('productosadminget') }}" role="button"><i class="fa fa-plus"></i>Agregar Producto</a>
</div>

<div class="container">
    <div id="products">
    
        @foreach ($products as $product)

            <div id="product-foreach" class="card text-center" style="width: 18rem;">
                
                <div class="productsAdmin">
                    <img src="{{ Storage::url($product->image) }}" class="card-img-top img-fluid img-thumbnail" alt="Responsive image">
                </div>

                <h3>{{$product->name}}</h3>

                <div class="card-body">     
                                 
                    <a class="btn btn-success" href="{{ route('editarproductoadminget', $product->id) }}" role="button"><i class="fa fa-pencil-square-o"></i>Editar</a>
                    <a class="btn btn-danger" href="{{ route('borrarproductoadminget', $product->id) }}" role="button"><i class="fa fa-trash-o"></i>Eliminar</a>
                </div>
            
            </div>    
            
        @endforeach
    </div>

    <div class="text-center">
        {{$products->links()}}
    </div>

</div>
@endsection