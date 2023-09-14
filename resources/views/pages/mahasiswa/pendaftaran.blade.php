@extends('layouts.app')

@section('content')
    @include('layouts.headers.default')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">{{ __('Silahkan isi form berikut dengan sebenar-benarnya.') }}</h3>
                    </div>
                    <div class="card-body">
                        <div id="smartwizard">
                            <ul>
                                <li><a href="#step-1">Step 1<br /><small>Account Info</small></a></li>
                                <li><a href="#step-2">Step 2<br /><small>Personal Info</small></a></li>
                                <li><a href="#step-3">Step 3<br /><small>Payment Info</small></a></li>
                                <li><a href="#step-4">Step 4<br /><small>Confirm details</small></a></li>
                            </ul>
                            <div class="mt-4">
                                <div id="step-1">
                                    <div class="row">
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Name"
                                                required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control"
                                                placeholder="Email" required> </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"> <input type="text" class="form-control"
                                                placeholder="Password" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control"
                                                placeholder="Repeat password" required> </div>
                                    </div>
                                </div>
                                <div id="step-2">
                                    <div class="row">
                                        <div class="col-md-6"> <input type="text" class="form-control"
                                                placeholder="Address" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="City"
                                                required> </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"> <input type="text" class="form-control"
                                                placeholder="State" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control"
                                                placeholder="Country" required> </div>
                                    </div>
                                </div>
                                <div id="step-3" class="">
                                    <div class="row">
                                        <div class="col-md-6"> <input type="text" class="form-control"
                                                placeholder="Card Number" required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control"
                                                placeholder="Card Holder Name" required> </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="CVV"
                                                required> </div>
                                        <div class="col-md-6"> <input type="text" class="form-control"
                                                placeholder="Mobile Number" required> </div>
                                    </div>
                                </div>
                                <div id="step-4" class="">
                                    <div class="row">
                                        <div class="col-md-12"> <span>Thanks For submitting your details with
                                                BBBootstrap.com. we will send you a confirmation email. We will review your
                                                details and revert back.</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionalJs')
    <script src="{{ asset('assets') }}/js/mahasiswa/pendaftaran.js"></script>
@endsection
