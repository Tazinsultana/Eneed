@extends('user.layouts.app')
@section('page_title', 'Home')
@push('inlinecss')
    <style>
        .banner_bg_main {
            width: 100%;
            float: left;
            background-image: url("{{ asset('home/images/banner-bg.png') }}");
            height: auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
    </style>
@endpush
@section('content')
    <!-- header top section start -->
    <!-- logo section start -->

    <div class="banner_section layout_padding pt-5">
        <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Start <br>Your favriot shopping</h1>
                                <div class="buynow_bt"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                <div class="buynow_bt"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                <div class="buynow_bt"><a href="#">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- banner section end -->


    <!-- fashion section start -->
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">All Product</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach ($allproducts as $products)
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">{{ $products->products_name }}</h4>
                                            <p class="price_text">Price <span
                                                    style="color: #262626;">{{ $products->price }}</span></p>
                                            <div class="tshirt_img"><img src="{{ asset($products->product_img) }}"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt">

                                                    <form action="{{ route('addproducttocart') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $products->id }}" name="product_id">
                                                        <input type="hidden" value="{{ $products->price }}" name="price">
                                                        <input type="hidden" value="1" name="product_quantity">
                                                        <input class="btn btn-warning" type="submit" value="Buy Now">
                                                    </form>


                                                </div>
                                                <div class="seemore_bt"><a
                                                        href="{{ route('productdetails', [$products->id, $products->slug]) }}">See
                                                        More</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>

@endsection
