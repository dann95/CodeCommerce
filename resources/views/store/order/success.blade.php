@extends('store.layouts.default')
@section('title','Obrigado pela compra')
@section('content')
    <div class="container">
        <h1> Obrigado pela compra!</h1>
        A compra <a href="{{ route('order.view' , ['id' => $id]) }}">#{{ $id }}</a> foi recebida com sucesso, você pode acompanhar mais detalhes em <a href="{{ route('account.index') }}">meus pedidos</a>.
    </div>
    <br>
    <br>
    <br>
@endsection