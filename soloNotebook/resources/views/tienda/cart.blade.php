@extends('layouts.app')

@section('content')

<div class="container">
    @if(count($cart))

    <button><a href="{{ route('vaciar') }}"><i class="fa fa-trash"></i></a></button>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr class="table-dark">
                        <td>{{ $item->image}}</td>
                        <td>
                        <input type="number" 
                        min="1"
                        max="{{ $item->stock}}" 
                        value="{{ $item->quantity}}" 
                        id="product_{{ $item->id }}">
                        
                        <a id="pruebo" href="" 
                        class="btn btn-warning btn-update-item" 
                        data-href="{{ route('update') }}" 
                        data-id="{{ $item->id }}" >
                        <i class="fa fa-refresh"></i>
                         </a>

                        </td>
                        <td>{{ $item->name}}</td>
                        <td>${{ $item->price}}</td>
                        <td>${{ $item->price * $item->quantity}}</td>
                        <td><button><a href="{{ route('eliminar', $item->id) }}"><i class="fa fa-remove"></i></a></button></td>
                    </tr>

                    <label for=""></label>
                @endforeach
            </tbody>
        </table>
        
        <h4><span>Total: $ {{ $total }}</span></h4>
        
        <button><a href="{{ route('productos') }}">Seguir Comprando</a></button>
        <button><a href="{{ route('carrito') }}">Finalizar compra</a></button> 
    </div>
    @else
    <h3>Su carrito esta vacio</h3>
    @endif
   
</div>

@endsection