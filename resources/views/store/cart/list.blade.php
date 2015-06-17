@extends('store.layouts.default')
@section('title' , 'Carrinho')
@section('content')
    <section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <th>item</th>
                    <th></th>
                    <th>quantidade</th>
                    <th class="text-center">preço</th>
                </tr>
            </thead>
            <tbody>
            @foreach(Session::get('cart')->all() as $key => $item)
                <tr>
                    <td colspan="2"><a href="{{ route('store.product' , ['id' => $key , 'name' => $item['entity']->name]) }}"><img src="{{ url('images/products').'/'.$item['entity']->cover }}" style="width:80px; height:80px;"/></a> <a href="{{ route('store.product' , ['id' => $key , 'name' => $item['entity']->name]) }}"> {{ $item['entity']->name }}</a></td>
                    <td><strong style="font-size: 16px;"><a href="{{ route('cart.del' , ['id' => $key]) }}" style="color:red;"><i class="fa fa-minus-square"></i></a>  {{ $item['qtd'] }} <a href="{{ route('cart.add' , ['id' => $key]) }}" style="color:green;"><i class="fa fa-plus-square"></i></a></strong> </td>
                    <td class="text-center">{{ $item['price'] }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5"><strong><h3 class="pull-right">Total : R${{ Session::get('cart')->total() }}</h3></strong></td>
            </tr>
            </tbody>
        </table>
            <div class="pull-right">
                <a href="{{ route('order.finish') }}"> <button class="btn btn-success">Finalizar Compra <i class="fa fa-check"></i></button></a>
            </div>
        </div>

    </div>
    </section>
@endsection