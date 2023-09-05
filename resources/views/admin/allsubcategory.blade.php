@extends('admin.layouts.Main')
@section('page_title')
    All Sub-Categories || Dashboard
@endsection
@section('content')
    <!-- Bootstrap Table with Header - Light -->
    <div class="container">
        <h4 class="fw-bold py-3 "><span class="text-muted fw-light">Page/</span> All Sub Category</h4>
        <div class="card ">
            <h5 class="card-header ">Sub Category Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Sub Category name</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td>Fan</td>
                            <td> Electronics</td>
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
