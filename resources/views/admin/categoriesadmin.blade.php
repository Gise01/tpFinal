@extends('layouts.appadmin')

@section('content')

<div class="text-center">
    <a class="btn btn-info btn-lg" href="{{ route('categoriasadminget') }}" role="button"><i class="fa fa-plus"></i>Agregar Categoria</a>
</div>

<div class="container">
    <div id="categories">
    
        @foreach ($categories as $category)

            <div id="product-foreach" class="card text-center" style="width: 18rem;">
                <img src="{{ Storage::url($category->image) }}" class="card-img-top" alt="">
                
                <h3>{{$category->name}}</h3>

                <div class="card-body">     
                                 
                    <a class="btn btn-success" href="{{ route('editarcategoriaadminget', $category->id) }}" role="button"><i class="fa fa-pencil-square-o"></i>Editar</a>
                    <a class="btn btn-danger" href="{{ route('borrarcategoriaadminget', $category->id) }}" role="button"><i class="fa fa-trash-o"></i>Eliminar</a>
                </div>
            
            </div>    
            
        @endforeach
    </div>
    {{$categories->links()}}
</div>

@endsection