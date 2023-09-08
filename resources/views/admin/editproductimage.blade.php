@extends('admin.layouts.Main')
@section('page_title')
    Edit Product Image || Dashboard
@endsection
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 "><span class="text-muted fw-light">Page/</span> Edit Product Image</h4>

        <div class="col-xxl">
            <div class="card ">
                {{-- <div class="card-header d-flex align-items-center justify-content-between"> --}}
                <h4 class="mb-0 mx-3 mt-3">Edit New Image</h4>
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

                    <form action="{{ route('updateproductimg') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> Previous Image</label>
                            <div class="col-sm-10">
                                {{-- <input type="text" class="form-control" id="product_name" name="product_name"
                                    placeholder="Phone" /> --}}
                                    <img src="{{ asset( $image_info->product_img) }}" alt="{{ $image_info->product_name }}">
                            </div>
                        </div>
                        <input type="hidden" value="{{ $image_info->id }}" name="id">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload New Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="product_img" name="product_img" />
                                {{-- <input class="form-control" type="file" id="formFileMultiple" multiple /> --}}
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Upadate Image</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
