@extends('store.layouts.default')
@if($product)
@section('title' , $product->name)
    @else
@section('title' , 'categoria não encontrada')
    @endif
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
    @if($product)
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ url('images/products').'/'.$product->cover }}" alt=""/>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @forelse($product->images()->get() as $image)
                            <a href="#"><img src="{{ url('images/products').'/'.$image->idExtension }}" alt="" width="80"></a>
                            @empty
                            <a href="#"><img src="{{ url('images/products').'/'.$product->cover }}" alt="" width="80"></a>
                            @endforelse
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{ $product->name }} :: {{ $product->category->name }}</h2>

                    <p>{{ $product->description }}</p>
                                <span>
                                    <span>R$ {{ $product->price }}</span>
                                        <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Adicionar no Carrinho
                                        </a>
                                </span>
                </div>
                <!--/product-information-->
                <p>
                    <strong>
                    @foreach($product->tags as $tag)
                    <a href="{{ route('store.tag.show' , ['id' => $tag->id , 'name' => $tag->name]) }}"> #{{ $tag->name }} </a>
                    @endforeach
                    </strong>
                </p>
            </div>
        </div>
        <!--/product-details-->
    </div>
    @endif
@endsection