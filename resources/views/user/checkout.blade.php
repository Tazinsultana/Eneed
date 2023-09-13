@extends('user.layouts.app')
@section('page_title')
@section('content')
    {{-- <div class="container"> --}}

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0"><strong> Shipping Address </strong></h5>
                {{-- <small class="text-muted float-end">Default label</small> --}}
            </div>
            <div class="card-body">
                <form action="{{ route('shippinginfo') }}" method="POST">
                    @csrf
                   
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" placeholder="" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Postal code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="" />
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" id="email" name="email" class="form-control" placeholder="" />
                                {{-- aria-label="john.doe" aria-describedby="basic-default-email2" />
                                <span class="input-group-text" id="basic-default-email2">@example.com</span> --}}
                            {{-- </div>

                        </div>
                    </div>  --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                        <div class="col-sm-10">
                            <input type="text" id="phone" name="phone" class="form-control phone-mask"
                                placeholder="" />
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                        <div class="col-sm-10">
                            <textarea id="message" class="form-control" name="message" placeholder="" />
                                </textarea>
                        </div>
                    </div> --}}
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            {{-- <input type="submit" class="btn btn-primary" value="Next"> --}}
                            <button class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

