@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            @if($category)
            <h1>Editing <small>{{ $category->name }} category</small></h1>
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form class="form-horizontal col-lg-5" method="POST" action="{{ route('categories.update' , ['id'=>$category->id]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name" class="control-label col-xs-2">Name</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of the category" value="{{ $category->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label col-xs-2">Description</label>
                    <div class="col-xs-10">
                        <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">Update category</button> <a class="btn btn-danger" href="{{ route('categories.list') }}">Back to Categories list</a>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
@endsection