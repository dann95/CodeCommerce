@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Products</h1>
            <table class="table table-responsive table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->name }}</td>
                        <td>{{ $produto->description }}</td>
                        <td>R$ {{ $produto->price }}</td>
                        <td><a href="{{ route('products.edit' , ['id' => $produto->id]) }}">editar</a> | <a href="{{ route('products.delete' , ['id' => $produto->id]) }}">deletar</a> </td>
                    </tr>
                @endforeach
            </table>
            <div class="text-center">
                {!! $produtos->render() !!}
            </div>
            <hr>
            <div class="pull-right">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
            </div>
        </div>
    </div>
@endsection
