@extends('layouts.store.main_page')
@section('title', 'Check Out')

@section('slider')
    @include('customer.store.toast')
@endsection
@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
        <nav aria-label="breadcrumb">
            <span>TOTAL : </span>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            {{-- User Details --}}
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3>User Details</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="First Name" readonly>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Last Name" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="City" readonly>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Phone Number" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-control" type="text" placeholder="Address" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-control" type="Email" placeholder="Email" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="" class="btn btn-primary">Edit Your Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Order Details --}}
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h3>Order Details</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <input class="form-control" type="text" placeholder="First Name" readonly>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" placeholder="Last Name" readonly>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" placeholder="Last Name" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('scripts')

@endsection
