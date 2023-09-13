@extends('user.layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                <div class="box_main">
                    <div class="electronic_img"><img src="{{ asset($products->product_img) }}"></div>

                </div>
            </div>


            <div class="col-lg-8">
                <div class="box_main">
                    <h4 class="shirt_text text-left">{{ $products->product_name }}</h4>
                    <p class="price_text text-left">price<span style="color: #262626;">{{ $products->price }}</span></p>

                    <div class="my-3 prouct-details">
                        <p class="lead"> {{ $products->product_long_des }} </p>


                        <div class="py-2 bg-light my-3">
                            <p>Category-{{ $products->product_category_name}}</p>
                            <p>SubCategory-{{ $products->product_subcategory_name }}</p>
                            <p>Available Quantity -{{ $products->product_quantity }}</p>

                        </div>
                        

                    </div>
                   
                    <form action="{{ route('addproducttocart') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $products->id }}" name="product_id">
                        <input type="hidden" value="{{ $products->price }}" name="price">
                        <label for="product-quantity">Quantity</label>
                        <input type="number" min="1"  name="product_quantity">
                        <input class="btn btn-warning" type="submit" value="Add to Cart">
                    </form>
                   

                </div>
            


            </div>





            <div class="fashion_section">
                <div id="main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <h1 class="fashion_taital">Related Product</h1>
                                <div class="fashion_section_2">
                                    <div class="row">
                                        @foreach ($related_product as $products)
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
                                                <div class="seemore_bt"><a href="{{ route('productdetails',[$products->id,$products->slug]) }}">See More</a></div>
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
