@extends('layouts.app')

@section('content')

<div class="container">


    <h2>Catálogo según Categoría</h2>
    
    @foreach ($categories as $category)

        <div class="category">
        
        <h4>{{$category->name}}</h4>
        <img src="{{ asset('storage/acces.jpg') }}" alt="" width='200'>

        <div class="product-info">
        
            <button><a href="{{ route('categoria_productos', $category->id) }}">Detalles</a></button>
            
        </div>

        </div>

    @endforeach

</div>

@endsection