@extends('layouts.app')

@section('content')

<div class="container">

    
    @foreach ($products as $product)

        <div class="product">
        
        <h3>{{$product->name}}</h3>
        <img src="{{ asset('storage/notebook.jpg') }}" alt="" width='200'>

        <div class="product-info">
        
            <p>{{$product->descrption}}</p>
            <p>Precio: ${{ $product->price }}</p>

        </div>

        </div>

    @endforeach

</div>

@endsection