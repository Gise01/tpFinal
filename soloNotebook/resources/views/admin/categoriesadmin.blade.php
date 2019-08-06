@extends('layouts.appadmin')

@section('content')

<div class="container">
    @foreach ($categories as $category)

    <div class="category">

        <h4>{{$category->name}}</h4>
            <img src="{{ asset('storage/acces.jpg') }}" alt="" width='200'>

        <div class="product-info">

            <button><a href="">Detalles</a></button>
        
        </div>
    </div>

    @endforeach

    {{$categories->links()}}
</div>

@endsection