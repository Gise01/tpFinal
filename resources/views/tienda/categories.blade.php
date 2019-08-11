@extends('layouts.app')

@section('content')

<div class="text-center">
    <h2>Catálogo por categorías</h2>
</div>
    
<div class="container">
    <div id="categories">

    @foreach ($categories as $category)

        <div id="category-foreach" class="card text-center" style="width: 18rem;">
            <a href="{{ route('categoria_productos', $category->id) }}"></a><img src="{{ Storage::url($category->image) }}" class="card-img-top" alt=""></a>
        
            <h3>{{$category->name}}</h3>

            <div class="card-body">
                <p>${{ $category->description }}</p>
                <a class="btn btn-primary" href="{{ route('categoria_productos', $category->id) }}" role="button">Detalles</a>
            </div>
            
        </div>

        
    @endforeach
        
    </div>

    {{$categories->links()}}

</div>

@endsection