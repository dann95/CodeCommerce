@extends('store.layouts.default')
@section('title','minha conta')
@section('content')
    <div class="container">
        <h1>Meus pedidos</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <th>pedido</th>
                <th>valor</th>
                <th>status</th>
                </thead>
                <tbody>
                    @foreach(Auth::user()->orders as $order)
                        <tr>
                            <td><a href="{{ route('order.view' , ['id' => $order->id]) }}"> Pedido #{{ $order->id }}</a></td>
                            <td>R$ {{ $order->price }}</td>
                            <td>{{ $status[$order->status]}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection