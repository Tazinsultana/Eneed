@extends('admin.layouts.Main')
@section('page_title')
    Add Sub-Categories || Dashboard
@endsection
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 "><span class="text-muted fw-light">Page/</span> Add Sub Category</h4>

        <div class="col-xxl">
            <div class="card ">
                {{-- <div class="card-header d-flex align-items-center justify-content-between"> --}}
                <h4 class="mb-0 mx-3 mt-3">Add New Sub Category</h4>
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
                    
                    <form action="{{ route('storesubcategory') }} " method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> Sub Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                                    placeholder="Enter Sub Category" />
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name"> Select Category</label>
                            <div class="col-sm-10">
                                <select id="category_id" name="category_id" class="form-control">
                                    <option> Select Category </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
