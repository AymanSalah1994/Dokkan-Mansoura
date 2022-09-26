{{-- categoryProducts --}}
@extends('layouts.store.main_page')
@section('title', 'All Merchants')
@section('content')
    <div class="divider" style="height: 50px">
    </div>

    <div class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center">All Merchants</h2>
            <hr>
            <div class="row gy-5">
                @foreach ($all_merchants as $merchant)
                    <div class="col-md-3">
                        @include('layouts.store.storeparts.merchant-card')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
