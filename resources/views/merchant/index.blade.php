@extends('layouts.merchant.merchant_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> User : {{ request()->user()->first_name }} </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>User Details</h3>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <label for="">First Name</label>
                    <input class="form-control" type="text" value="{{ request()->user()->first_name }}">
                </div>
                <div class="col-md-6">
                    <label for="">Last Name</label>
                    <input class="form-control" type="text" value="{{ request()->user()->last_name }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">City</label>
                    <input class="form-control" type="text" value="{{ request()->user()->city }}">
                </div>
                <div class="col-md-6">
                    <label for="">Phone</label>
                    <input class="form-control" type="text" value="{{ request()->user()->phone }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Address</label>
                    <input class="form-control" type="text" value="{{ request()->user()->address }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Email</label>
                    <input class="form-control" type="Email" value="{{ request()->user()->email }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Bio</label>
                    <input class="form-control" type="Email" value="{{ request()->user()->bio }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Facebook Link</label>
                    <input class="form-control" type="Email" value="{{ request()->user()->fb_link }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="">YouTube Video</label>
                    <input class="form-control" type="Email" value="{{ request()->user()->youtube_vid }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('images/some_asset/2.jpg') }}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="file" name="" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-warning float-right">Update</button>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
