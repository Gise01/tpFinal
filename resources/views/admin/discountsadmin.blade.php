@extends('layouts.appadmin')

@section('content')

<div class="container">
    
    <div class="text-center">
        <a class="btn btn-info btn-lg text-center" href="{{ route('descuentosadminget') }}" role="button"><i class="fa fa-plus"></i>Agregar Descuento</a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($discounts as $discount)
                    <tr class="table-dark">
                        <td>{{ $discount->name}}</td>
                        <td>{{ $discount->value}}</td>
                        <td>{{ $discount->description}}</td>
                        <td><a class="btn btn-success" href="{{ route('editardescuentoadminget', $discount->id) }}" role="button"><i class="fa fa-pencil-square-o"></i>Editar</a></td>
                        <td><a class="btn btn-danger" href="{{ route('borrardescuentoadminget', $discount->id) }}" role="button"><i class="fa fa-trash-o"></i>Eliminar</a></td>
                    </tr>

                    <label for=""></label>
                @endforeach
            </tbody>
        </table>
        
                
    </div>
    
</div>

@endsection