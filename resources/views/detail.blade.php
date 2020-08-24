@extends('layouts.app')

@section('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="{{ route('imagen.show',['filename' => $producto->imagen])}}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ route('imagen.show',['filename' => $producto->imagen])}}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ route('imagen.show',['filename' => $producto->imagen])}}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ route('imagen.show',['filename' => $producto->imagen])}}" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="{{ route('imagen.show',['filename' => $producto->imagen])}}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ route('imagen.show',['filename' => $producto->imagen])}}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ route('imagen.show',['filename' => $producto->imagen])}}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ route('imagen.show',['filename' => $producto->imagen])}}" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$producto->nombre}}</h2>

                    <div>
                        <h3 class="product-price">${{$producto->precio}}</h3>
                        <span class="product-available">In Stock</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


                    <div class="add-to-cart">
                        

                        <a href="{{route('add.carrito',['id' => $producto->id ])}}" class="add-to-cart-btn" role="button">Añadir Carrito</a>

                    </div>



                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="#">{{$producto->category->nombre}}</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>

                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->



                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->



@endsection