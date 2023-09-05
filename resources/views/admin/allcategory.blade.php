@extends('admin.layouts.Main')
@section('page_title')
    All Categories || Dashboard
@endsection
@section('content')
    <div class="container">

        <!-- Bootstrap Table with Header - Light -->
        <h4 class="fw-bold py-3 "><span class="text-muted fw-light">Page/</span> All Category</h4>
        <div class="card ">
            <h5 class="card-header ">Category Information</h5>

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
                            <th>Category name</th>
                            <th>Sub Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td>Electronics</td>
                            <td> 100</td>
                            <td>500</td>
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
