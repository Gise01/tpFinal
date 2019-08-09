@extends('layouts.appadmin')

@section('content')

<div class="text-center">
    <h2>Esta seguro que desea borrar...</h2>
</div>

<div class="text-center">
    <form action="{{ route('borrarcategoriaadminpost', $category->id) }}" method="post">
    {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $category->id }}" >
        <button type="sumit" class="btn btn-danger"><i class="fa fa-trash-o"></i>Eliminar</button>   

    </form>
</div>
    
<div id="product">
    
    <div class="card text-center" style="width: 18rem;">
        <img src="{{ asset('storage/notebook.jpg') }}" class="card-img-top" alt="">
        <h4>{{$category->name}}</h4>

        <div class="card-body">
            <p>{{$category->description}}</p>
                        
            <a class="btn btn-primary" href="{{ route('categoriasadmin') }}" role="button">Regresar</a>
        </div>
    </div>

</div>


@endsection