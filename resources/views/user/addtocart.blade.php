@extends('user.layouts.app')
@section('content')
    {{-- <div class="container"> --}}

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}

        </div>
    @endif

    <div class="container px-6  mt-4">
        <div class="card ">
            <h5 class="card-header text-center "><strong> See Your Bag</strong></h5>
            <div class="row">
                <div class="col-12">

                    <div class="box_main">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>

                                </tr>
                                @php
                                    $total = 0;
                                @endphp


                                @foreach ($cart_item as $carts)
                                    @php
                                        $product_name = App\Models\Product::where('id', $carts->product_id)->value('product_name');
                                        $img = App\Models\Product::where('id', $carts->product_id)->value('product_img');
                                        
                                    @endphp
                                    <tr>
                                        <td>{{ $product_name }}</td>
                                        <td><img src="{{ asset($img) }}" alt="" style="height:50px"></td>
                                        <td>{{ $carts->quantity }}</td>
                                        <td>{{ $carts->price }}</td>
                                        <td> <a href=""Class="btn btn-warning">Remove</a></td>

                                    </tr>
                                    @php
                                        $total=$total+$carts->price;
                                    @endphp
                             
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td class="text-left" >Total</td>
                                    <td>{{ $total }}</td>
                                </tr>




                            </table>

                        </div>

                    </div>

                </div>


            </div>
        </div>



    </div>
@endsection
