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
                            <th>Sub Category name</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ( $subcategories as  $subcategory )
                            <tr>
                                <td>{{ $subcategory->id }}</td>
                                <td>{{ $subcategory->subcategory_name }}</td>
                                <td> {{ $subcategory->category_name }}</td>
                                <td>{{ $subcategory->product_count }}</td>
                                <td>

                                    <a href=" {{ route('editsubcategory',$subcategory->id) }}" class="btn btn-primary"> Edit</a>
                                    <a href="{{ route('deletesubcategory',$subcategory->id) }}" class="btn btn-danger">Delete</a>

                                </td>



                            </tr>
                        @endforeach




                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
