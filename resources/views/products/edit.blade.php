@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            @if($product)
            <h1>Edit <small>{{$product->name}}</small></h1>
            @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <a class="thumbnail">
                        <img src="{{ url('images/products')."/".$product->cover }}" style="width: 200px; height: 200px" >
                    </a>
                    <a href="{{ route('products.images', ['id' => $product->id]) }}" class="btn btn-primary">edit images</a>
                </div>
            </div>
            <hr>
                <form class="form-horizontal col-lg-5" method="POST" action="{{ route('products.update', ['id' => $product->id]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name" class="control-label col-xs-2">Name</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" value="{{ $product->name }}" id="name" name="name" placeholder="Name of the product">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="control-label col-xs-2">Description</label>
                    <div class="col-xs-10">
                        <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="control-label col-xs-2">Price</label>
                    <div class="col-xs-10">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" value="{{ $product->price }}" name="price" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="freatured" class="control-label col-xs-2">Featured</label>
                    <div class="col-xs-10">
                        <select name="featured" class="form-control">
                            <option value="1"{{ ($product->featured) ? ' selected' : '' }}>yes</option>
                            <option value="0"{{ (!$product->featured) ? ' selected' : '' }}>no</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="recommend" class="control-label col-xs-2">Recommend</label>
                    <div class="col-xs-10">
                        <select name="recommend" class="form-control">
                            <option value="1"{{ ($product->recommend) ? ' selected' : '' }}>yes</option>
                            <option value="0"{{ (!$product->recommend) ? ' selected' : '' }}>no</option>
                        </select>
                    </div>
                </div>

                    <div class="alert-info">
                        <strong>Available tags:</strong>
                        {{ implode('  ,  ' , $tags) }}<br>
                        <strong>you must insert separated by comma.</strong>
                    </div>

                    <div class="form-group">
                        <label for="recommend" class="control-label col-xs-2">Tags</label>
                        <div class="col-xs-10">
                            <textarea name="tags" class="form-control">{{ implode(',' , $product->tags->lists('name')) }}</textarea>
                        </div>
                    </div>



                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">Edit Product</button> <a class="btn btn-danger" href="{{ route('products.list') }}">Back to Products list</a>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
@endsection