@extends('user.layouts.app')
@section('content')
    <h2>Final step to place your order</h2>
    <div class="container">

        <div class="row">

            <div class="col-8">
                <div class="box_main">

                    <h3> <Strong> Products will send at- </Strong></h3>
                    <p>Address- {{ $shipping_address->address }}</p>
                    <p>Postal Code- {{ $shipping_address->postal_code }}</p>
                    <p>Phone - {{ $shipping_address->phone}}</p>


                </div>




            </div>
            <div class="col-4">
                <div class="box_main">

                    <h4><strong>Final Products Are- </strong></h4>


                    <table class="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>


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
                                <td>{{ $carts->quantity }} </td>
                                {{-- <input type="number" min="1"  name="product_quantity" style="height: 30px">  --}}

                                <td>{{ $carts->price }}</td>


                            </tr>
                            @php
                                $total = $total + $carts->price;
                            @endphp
                        @endforeach

                        <tr>
                            @if ($total > 0)
                                <td></td>
                                <td></td>

                                <td class="text-left"><strong>Total</strong></td>
                                <td>{{ $total }}</td>
                            @endif
                        </tr>




                    </table>


                </div>



            </div>

            <div class=" row m-5 pb-4">

                <form action="{{ route('placeorder') }}" method="POST">
                    @csrf
                    <input type="submit" value="Place Order" class="btn btn-primary" style="margin-right: 20px">
                  

                </form>

                <form action="" method="POST">
                    @csrf
                    <input type="submit" value="Cancel Order" class="btn btn-danger">
                </form>
            </div>
        </div>


    </div>
@endsection
