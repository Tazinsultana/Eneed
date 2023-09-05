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
                    <tr>
                        <td>1</td>
                        <td>Fan</td>
                        <td> </td>
                        <td>500</td>
                        <td>50</td>
                        <td>

                            <a href=" " class="btn btn-primary"> Edit</a>
                            <a href="" class="btn btn-danger">delete</a>

                        </td>



                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
