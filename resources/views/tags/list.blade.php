@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Products</h1>
            <table class="table table-responsive table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td><a href="{{ route('tags.edit' , ['id' => $tag->id]) }}">editar</a> | <a href="{{ route('tags.delete' , ['id' => $tag->id]) }}">deletar</a> </td>
                    </tr>
                @endforeach
            </table>
            <div class="text-center">
                {!! $tags->render() !!}
            </div>
            <hr>
            <div class="pull-right">
                <a href="{{ route('tags.create') }}" class="btn btn-primary">Create Tag</a>
            </div>
        </div>
    </div>
@endsection