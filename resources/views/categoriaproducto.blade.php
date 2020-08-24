@extends('layouts.app')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

        
            <!-- STORE -->
            <div id="store" class="col-md-9">
          
                <!-- store products -->
                <div class="row">
                    @foreach($productos as $prod)
                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ route('imagen.show',['filename' => $prod->imagen])}}" alt="">

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
                    </div>
                    <!-- /product -->
                    
                    @endforeach
                    
                </div>
              
                <!-- /STORE -->
            </div>
           
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    @endsection