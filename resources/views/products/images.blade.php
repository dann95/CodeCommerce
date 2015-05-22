@extends('app')
@section('content')
    <div class="container">
            <div class="row">
                <h1>Image of {{ $product->name }}</h1>
                <hr>
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="{{ url('images/products/not_found.jpg') }}" alt="...">
                    </a>
                    <form method="POST" action="{{ route('products.image.store',['id' => $product->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" name="image"><br>
                        <button type="submit" class="btn btn-success">Upload image</button> <a class="btn btn-danger" href="{{ route('products.edit' , ['id' => $product->id]) }}">Back to product</a>
                    </form>
                </div>
            </div>
    </div>
@endsection