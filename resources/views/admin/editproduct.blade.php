@extends('admin.layouts.Main')
@section('page_title')
    Edit Products || Dashboard
@endsection
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 "><span class="text-muted fw-light">Page/</span> Edit Product</h4>

        <div class="col-xxl">
            <div class="card ">
                {{-- <div class="card-header d-flex align-items-center justify-content-between"> --}}
                <h4 class="mb-0 mx-3 mt-3">Add New Product</h4>
                {{-- <small class="text-muted float-end">Default label</small> --}}
                {{-- </div> --}}
                <div class="card-body">


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('updateproduct') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    placeholder="Phone" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> Product Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="product_price" name="product_price"
                                    placeholder="100" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> Product Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_quantity" name="product_quantity"
                                    placeholder="12" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> Product Short
                                Description</label>
                            <div class="col-sm-10">
                                {{-- <input type="text" class="form-control" id="product_quantity" name="product_quantity"
                                placeholder="12" /> --}}
                                <textarea class="form-control" name="short_pd" id="short_pd" cols="20" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> Product Long
                                Description</label>
                            <div class="col-sm-10">
                                {{-- <input type="text" class="form-control" id="product_quantity" name="product_quantity"
                                placeholder="12" /> --}}
                                <textarea class="form-control" name="long_pd" id="long_pd" cols="30" rows="10"></textarea>
                            </div>
                        </div>







                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload File</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="product_img" name="product_img" />
                                {{-- <input class="form-control" type="file" id="formFileMultiple" multiple /> --}}
                            </div>
                        </div>




                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product Product</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
