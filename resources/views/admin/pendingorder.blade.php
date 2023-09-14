@extends('admin.layouts.Main')
@section('page_title', 'Pending Order')

@section('content')


    <div class="container pt-3">
        <div class="card pt-4">
            <div class="card-tittle text-center"><strong><h4>Pending Orders</h4></strong></div>
            <div class="card-body">


                <table class="table">
                    <tr>
                        <th>User Id</th>
                        <th>Shipping Information</th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Total Will Pay</th>
                        <th>Action</th>
                    </tr>


                    @foreach ($pending_order as $orders)
                        <tr>
                            <td>{{ $orders->user_id }}</td>
                            <td>
                                <ul>
                                    <li>Address-{{ $orders->shipping_address }}</li>
                                    <li>Postal Code-{{ $orders->shipping_postalcode }}</li>
                                    <li>Phone-{{ $orders->shipping_phone }}</li>
                                </ul>
                            </td>
                            <td>{{ $orders->product_id }}</td>
                            <td>{{ $orders->quantity }}</td>
                            <td>{{ $orders->total_price }}</td>
                            <td>
                                <a href="# " class="btn btn-success">Confiremed Order</a>
                                {{-- <a href="#" class="btn btn-warning">Cancelled</a> --}}
                            </td>
                    @endforeach

                    </tr>

                </table>


            </div>



        </div>






    </div>
@endsection
