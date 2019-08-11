@extends('layouts.appadmin')

@section('content')

<div class="text-center">
    <a class="btn btn-info btn-lg" href="{{ route('marcasadminget') }}" role="button"><i class="fa fa-plus"></i>Agregar Marca</a>
</div>

<div class="container">
    <div id="brands">
    
        @foreach ($brands as $brand)

            <div id="product-foreach" class="card text-center" style="width: 18rem;">
                
                <div class="brandsAdmin">
                    <img src="{{ Storage::url($brand->image) }}" class="card-img-top img-fluid img-thumbnail" alt="Responsive image">
                </div>

                <h3>{{$brand->name}}</h3>

                <div class="card-body">     
                                 
                    <a class="btn btn-success" href="{{ route('editarmarcasadminget', $brand->id) }}" role="button"><i class="fa fa-pencil-square-o"></i>Editar</a>
                    <a class="btn btn-danger" href="{{ route('borrarmarcasadminget', $brand->id) }}" role="button"><i class="fa fa-trash-o"></i>Eliminar</a>
                </div>
            
            </div>    
            
        @endforeach
    </div>

    {{$brands->links()}}
</div>

@endsection