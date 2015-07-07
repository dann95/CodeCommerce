@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            @if($order)
                <h1>Editing pedido #<small>{{ $order->id }} </small></h1>
                @if($errors->all())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <form class="form-horizontal col-lg-5" method="POST" action="{{ route('orders.update' , ['id'=>$order->id]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name" class="control-label col-xs-2">Name</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control" disabled id="name" value="{{ $order->client->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label col-xs-2">Description</label>
                        <div class="col-xs-10">
                            <textarea id="description" rows="{{ count($order->items) }}" disabled class="form-control">@foreach($order->items as $item){{ $item->product->name."\n" }}@endforeach
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label col-xs-2">Status</label>
                        <div class="col-xs-10">
                            <select class="form-control" name="status">
                                @foreach($status as $_status => $key)
                                <option value="{{ $_status }}" @if($_status == $order->status) selected @endif>{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-offset-2 col-xs-10">
                            <button type="submit" class="btn btn-primary">Update order status</button> <a class="btn btn-danger" href="{{ route('orders.list') }}">Back to Orders list</a>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection