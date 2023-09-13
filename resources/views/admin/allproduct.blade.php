@extends('admin.layouts.Main')
@section('page_title')
    All Products || Dashboard
@endsection
@section('content')
    <div class="container">

        <!-- Bootstrap Table with Header - Light -->
        <h4 class="fw-bold py-3 "><span class="text-muted fw-light">Page/</span> All Product</h4>
        <div class="card ">
            <h5 class="card-header ">Product Information</h5>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}

                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Product name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $product)
                        {{-- <input type="hidden" value="{{ $product->id }}" name="product_id"> --}}
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>

                                <td>
                                    <img style="height:100px" src="{{ asset($product->product_img) }}" alt="{{ $product->product_name }}">
                                    <br>
                                    <a href="{{ route('editproductimage', $product->id) }} " class="btn btn-primary">Update Image</a>

                                </td>
                                <td> {{ $product->price }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>

                                    <a href="{{ route('editproduct', $product->id) }} " class="btn btn-primary"> Edit</a>
                                    <a href="{{ route('showproduct',[$product->id,$product->slug]) }}" class="btn btn-warning">Show</a>
                                    <a href="{{ route('deleteproduct',$product->id) }}" class="btn btn-danger">Delete</a>

                                </td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
