@extends('layouts.app')

@section('content')

<div class="container">
    @if(count($cart))

    <div class="text-center">
        <a class="btn btn-danger" href="{{ route('vaciar') }}" role="button"><i class="fa fa-trash"></i>Vaciar Carrito</a>
    </div>

    <div class="table-cart">
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
                            <td><img src="{{ Storage::url($item->image) }}" alt=""></td>
                            <td>
                            <input type="number" 
                            min="1"
                            max="{{ $item->stock}}" 
                            value="{{ $item->quantity}}" 
                            id="product_{{ $item->id }}">
                            
                            <a href="#" 
                            class="btn btn-warning btn-update-item" 
                            data-href="{{ route('update', $item->id) }}" 
                            data-id="{{ $item->id }}">
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
            
            <p>
                <h4><span>Total: $ {{ $total }}</span></h4>
            </p>

            <p>
                <a class="btn btn-warning" href="{{ route('productos') }}" role="button">Seguir Comprando</a>
                <a class="btn btn-primary" href="{{ route('carrito') }}" role="button">Finalizar compra</a>
            </p>
        </div>
        @else
        <h3>Su carrito esta vacio</h3>
        @endif
    </div>
</div>

@endsection