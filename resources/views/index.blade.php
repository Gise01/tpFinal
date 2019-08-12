@extends('layouts.app')

@section('content')

<img src="{{ asset('storage/logo.png') }}" class="img-fluid rounded mx-auto d-block" alt="Responsive image">


<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('storage/Slide1.jpg') }}" class="d-block w-100" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/Slide2.jpg') }}" class="d-block w-100" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/Slide3.jpg') }}" class="d-block w-100" alt="Slide 3">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/Slide4.') }}" class="d-block w-100" alt="Slide 4">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
    <div class="text-center">
        <h3>Categorias</h3>
    </div>

    <div class="container">
        <div id="categories">
            
        @foreach ($categories as $category)
            <div id="category-foreach" class="card text-center" style="width: 18rem;">
                <a href="{{ route('categoria_productos', $category->id) }}"><img id="indexCategory" src="{{ Storage::url($category->image) }}" class="card-img-top" alt="categorias"></a>
            
                <div class="card-body">
                  <h5 class="card-title">{{$category->name}}</h5>
                </div>
            </div>
        @endforeach
        
        </div>
    </div>
</div>

<div class="container">
    <div class="text-center">
        <h3>Productos Destacados</h3>
    </div>
      
    <div class="container">
        <div id="categories">

        @foreach ($products as $product)
            <div id="category-foreach" class="card text-center" style="width: 18rem;">
                <a href="{{ route('detalle', $product->id) }}"><img id="indexProduct" src="{{ Storage::url($product->image) }}" class="card-img-top" alt="categorias"></a>
          
                <div class="card-body">
                  <h5 class="card-title">{{$product->name}}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection