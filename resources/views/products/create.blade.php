@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Create new Product</h1>
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form class="form-horizontal col-lg-5" method="POST" action="{{ route('products.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name" class="control-label col-xs-2">Name</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of the product">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label col-xs-2">Description</label>
                    <div class="col-xs-10">
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="control-label col-xs-2">Price</label>
                    <div class="col-xs-10">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="control-label col-xs-2">Featured</label>
                    <div class="col-xs-10">
                        <select name="featured" class="form-control">
                            <option value="1">yes</option>
                            <option value="0">no</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="control-label col-xs-2">Recommend</label>
                    <div class="col-xs-10">
                        <select name="recommend" class="form-control">
                            <option value="1">yes</option>
                            <option value="0">no</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">Create Product</button> <a class="btn btn-danger" href="{{ route('products.list') }}">Back to Products list</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection