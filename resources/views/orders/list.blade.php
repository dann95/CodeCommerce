@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Orders</h1>
            <table class="table table-responsive table-striped">
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td> {{ $order->client->name }}</td>
                        <td>R$ {{ $order->price }}</td>
                        <td>{{ $status[$order->status] }}</td>
                        <td><a href="{{ route('orders.edit',['id' => $order->id]) }}">editar status</a> </td>
                    </tr>
                @endforeach
            </table>
            <div class="text-center">
                {!! $orders->render() !!}
            </div>
            <hr>
        </div>
    </div>
@endsection
