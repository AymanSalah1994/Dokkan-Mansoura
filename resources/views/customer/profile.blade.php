@extends('layouts.store.main_page')
@section('title', 'Profile')

@section('slider')
@endsection
@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
        <nav aria-label="breadcrumb">
            <span>This is Your Profile !</span>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            {{-- User Details --}}
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h3>User Details</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input class="form-control" type="text" placeholder="{{ $user->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input class="form-control" type="text" placeholder="{{ $user->last_name }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">City</label>
                                <input class="form-control" type="text" placeholder="{{ $user->city }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone</label>
                                <input class="form-control" type="text" placeholder="{{ $user->phone }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Address</label>
                                <input class="form-control" type="text" placeholder="{{ $user->address }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Email</label>
                                <input class="form-control" type="Email" placeholder="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('profile.view') }}" class="btn btn-primary">Save Updates</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Order Details --}}
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Actions</h3>
                    </div>
                    <div class="card-footer">
                        <br>
                        <div class="row">
                            <button class="btn btn-success rounded-pill float-end" disabled>Delete your Profile </button>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('scripts')

@endsection
