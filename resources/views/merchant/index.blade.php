@extends('layouts.merchant.merchant_panel')
@section('content')
    
    <div class="card">
        <div class="card-body">
            <h1> {{ __('User') }} : {{ request()->user()->first_name }} </h1>
        </div>
    </div>
    <form action="{{ route('merchant.panel.profile.update') }}" onsubmit="myButton.disabled = true; return true;"
        method="post" enctype="multipart/form-data">
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
                        <input class="form-control" name="fb_link"
                            value="{{ old('fb_link', request()->user()->fb_link) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">YouTube Video</label>
                        <input class="form-control" name="youtube_vid"
                            value="{{ old('youtube_vid', request()->user()->youtube_vid) }}">
                    </div>
                </div>


                <div class="row ">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                            <img src="{{ request()->user()->profile_picture ? Storage::url(request()->user()->profile_picture) : asset('images/150x150.png') }}"
                                alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists img-thumbnail "
                            style="max-width: 150px; max-height: 150px;"></div>
                        <div class="">
                            <span class="btn btn-outline-secondary btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="profile_picture" accept="image/*">
                            </span>
                            <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>







                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" name="myButton" class="btn btn-warning float-right">Update</button>
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
