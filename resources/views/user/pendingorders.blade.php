@extends('user.layouts.userprofile_template')
@section('page_title', 'Pending Orders')
@section('profilecontent')

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}

        </div>
    @endif

    <table <div class="col-4">
        <div class="box_main">

            <h4><strong>Final Products Are :- </strong></h4>


            <table class="table">
                <tr>
                    <th>Product ID</th>
                    <th>Price</th>
                    <th>Quantity</th>

                </tr>
          
                    @foreach ($pending_order as $orders)
                    <tr>
                        <td> {{ $orders->product_id }} </td>
                        <td> {{ $orders->quantity }}</td>
                        <td> {{ $orders->total_price }}</td>
                        
                </tr>
                    @endforeach

            </table>


        </div>






    </table>







@endsection
