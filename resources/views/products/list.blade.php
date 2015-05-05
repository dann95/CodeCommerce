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
                        <td><a href="#">editar</a>|<a href="#">deletar</a> </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
