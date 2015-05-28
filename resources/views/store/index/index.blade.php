@extends('store.layouts.default')
@section('title' , 'Home')
@section('left-bar')
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>Categorias</h2>
            <div class="panel-group category-products" id="accordian"><!--category-products-->
                @include('store.partial.list_category')
            </div><!--/category-products-->
        </div>
    </div>
@endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>
            @include('store.partial.list_products' , ['products' => $featured])
        </div><!--features_items-->

        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>
            @include('store.partial.list_products' , ['products' => $recommend])
        </div><!--recommended-->

    </div>
@endsection