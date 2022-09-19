@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5" class="h-100">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-7">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h3>Register Details</h3>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text"
                                        placeholder="" name="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input class="form-control  @error('last_name') is-invalid @enderror" type="text"
                                        placeholder="" name="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <label for="">Password</label>
                                    <input class="form-control  @error('password') is-invalid @enderror" type="password"
                                        placeholder="" name="password" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        @error('password_confirmation') is-invalid @enderror
                                        value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <label for="">City</label>
                                    <input class="form-control  @error('city') is-invalid @enderror" type="text"
                                        placeholder="" name="city" value="{{ old('city') }}">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone</label>
                                    <input class="form-control  @error('phone') is-invalid @enderror" type="text"
                                        placeholder="" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <label for="">Address</label>
                                    <input class="form-control  @error('address') is-invalid @enderror" type="text"
                                        placeholder="" name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <label for="">Email</label>
                                    <input class="form-control  @error('email') is-invalid @enderror" type="Email"
                                        placeholder="" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <button class="btn btn-primary btn-block" type="submit">Register</button>
                            </div>
                            <hr>
                            <div class="row">
                                <a href="" class="btn btn-primary btn-block">
                                    <i class="bi bi-facebook"></i>
                                    Register With Facebook
                                </a>
                            </div>
                            <br>
                            <div class="row">
                                <a href="" class="btn btn-danger btn-block">
                                    <i class="bi bi-google"></i>
                                    Register With Google
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
