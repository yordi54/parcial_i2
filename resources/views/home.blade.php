@extends('layouts.app')

@section('content')


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Nuevos Productos</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                            @foreach($productos as $prod)

                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ route('imagen.show',['filename' => $prod->imagen])}}" alt="">
                                        <div class="product-label">
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$prod->category->nombre}}</p>
                                        <h3 class="product-name"><a href="{{ route('detail',['id' => $prod->id]) }}">{{$prod->nombre}}</a></h3>
                                        <h4 class="product-price">${{$prod->precio}}</h4>
                                     
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{route('add.carrito',['id' => $prod->id ])}}" class="add-to-cart-btn" role="button">Añadir Carrito</a>
                                    </div>
                                </div>
                                <!-- /product -->
                            @endforeach
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->



@endsection