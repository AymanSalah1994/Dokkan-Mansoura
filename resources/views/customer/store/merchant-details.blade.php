@extends('layouts.store.main_page')
@section('title', __('Merchant Details'))

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $merchant->first_name }}</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card shadow merchant_data">
            <div class="card-body">
                <div class="row">
                    @if ($merchant->profile_picture)
                        <div class="col-md-4">
                            <img src="{{ Storage::url($merchant->profile_picture) }}" alt="" style="width: 100%;height: 15vw;object-fit: cover;">
                        </div>
                    @else
                    <div class="col-md-4">
                        <img src="{{ asset('images/thumb.jpg') }}" alt="" style="width: 100%;height: 15vw;object-fit: cover;">
                    </div>
                    @endif
                    <div class="col-md-8">
                        <h2 class="mb-0">{{ $merchant->first_name }}</h2>
                        <br>
                        <hr>
                        <p>{{ __('Bio') }} :{{ $merchant->bio }}</p>
                        <p>{{ __('Address') }} : {{ $merchant->address }}</p>
                        <p>{{ __('Phone') }} : {{ $merchant->phone }}</p>
                        <p>{{ __('Number Of Products') }} : {{ $merchant->products->count() }}</p>
                        <p class="float-end">
                            <a href="{{ route('merchant.store.products', $merchant->slug) }}"
                                class="btn btn-primary rounded-pill">
                                {{ __('All Products') }}
                            </a>
                        </p>
                        <br>
                        @if ($merchant->fb_link)
                            <span>
                                <ul>
                                    <li style=""><a href="{{ $merchant->fb_link }}"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
