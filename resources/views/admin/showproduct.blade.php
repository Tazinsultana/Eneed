@extends('admin.layouts.Main')
@section('page_title', 'Show Products')
@section('content')

    <div class="container px-6  mt-4">
        <div class="card ">
            <h5 class="card-header text-center "><strong>Product Details</strong></h5>


            <div class="row">
                <div class="col">
                    <div class="box_main">

                        <table class="table">
                            <div class="product_img"><img src="{{ asset($product->product_img) }}">
                            </div>
                        </table>

                    </div>
                </div>

                <div class="col">

                    <div class="row">
                        <div class="col">

                            <div class="box_main">
                                <div class="table-responsive">
                                    <table class="table">
                                        <div class="box_main">
                                            <tr>

                                                <h3><strong>Product Name -</strong> {{ $product->product_name }}</h3>
                                            </tr>
                                            <tr>
                                                <h3><strong>Product Price - </strong>{{ $product->price }}</h3>
                                            </tr>

                                            <tr>
                                                <h3><strong>Quantity - </strong>{{ $product->price }}</h3>
                                            </tr>
                                        </div>
                                        <div class="my-3 card">
                                            <tr>
                                                <h3><strong>Description - </strong>{{ $product->product_long_des }}</h3>
                                            </tr>

                                        </div>
                                        <div class="card py bg-light my-3">
                                            <tr>
                                                <h3><strong>Category - </strong>{{ $product->product_category_name }}</h3>
                                            </tr>
                                            <tr>
                                                <h3><strong>SubCategory - </strong>{{ $product->product_subcategory_name }}
                                                </h3>
                                            </tr>

                                        </div>

                                        </tr>

                                    </table>

                                </div>

                            </div>

                        </div>



                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection
