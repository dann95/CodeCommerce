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
                    <td><a href="{{ route('categories.edit' , ['id' => $categoria->id]) }}">editar</a> | <a href="{{ route('categories.delete',['id' => $categoria->id]) }}">deletar</a> </td>
                </tr>
                @endforeach
            </table>
            <hr>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.create') }}">Create new Category</a>
            </div>
        </div>
    </div>
@endsection
