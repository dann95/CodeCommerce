@extends('store.layouts.default')
@section('title','minha conta')
@section('content')
    <div class="container">
        <h1>Pedido #{{ $order->id }}</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <th>produto</th>
                <th>valor</th>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->product->price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="text-right">Total R$ {{ $order->price }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection