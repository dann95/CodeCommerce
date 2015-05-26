@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Create new Product Tag</h1>
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form class="form-horizontal col-lg-5" method="POST" action="{{ route('tags.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name" class="control-label col-xs-2">Name</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of the tag">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">Create Tag</button> <a class="btn btn-danger" href="{{ route('tags.list') }}">Back to Tag list</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection