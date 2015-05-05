@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Categories</h1>
            <table class="table table-responsive table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->name }}</td>
                    <td>{{ $categoria->description }}</td>
                    <td><a href="#">editar</a>|<a href="#">deletar</a> </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection