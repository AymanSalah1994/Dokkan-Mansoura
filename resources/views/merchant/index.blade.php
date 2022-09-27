@extends('layouts.merchant.merchant_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> {{ __('User') }} : {{ request()->user()->first_name }} </h1>
        </div>
    </div>
    <form action="{{ route('update.profile.merchant') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <h3>{{ _('User Details') }}</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">{{ __('First Name') }}</label>
                        <input class="form-control" type="text" name="first_name"
                            value="{{ old('first_name', request()->user()->first_name) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Last Name</label>
                        <input class="form-control" type="text" name="last_name"
                            value="{{ old('last_name', request()->user()->last_name) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">City</label>
                        <input class="form-control" type="text" name="city"
                            value="{{ old('city', request()->user()->city) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Phone</label>
                        <input class="form-control" type="text" name="phone"
                            value="{{ old('phone', request()->user()->phone) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Address</label>
                        <input class="form-control" type="text" name="address"
                            value="{{ old('address', request()->user()->address) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input class="form-control" type="Email" name="email"
                            value="{{ old('email', request()->user()->email) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Bio</label>
                        <input class="form-control" type="" name="bio"
                            value="{{ old('bio', request()->user()->bio) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Facebook Link</label>
                        <input class="form-control" name="facebook_link"
                            value="{{ old('faceook_link', request()->user()->fb_link) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">YouTube Video</label>
                        <input class="form-control" name="youtube_vid"
                            value="{{ old('youtube_vid', request()->user()->youtube_vid) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('images/some_asset/2.jpg') }}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" name="profile_picture" id="">
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
    </form>
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
