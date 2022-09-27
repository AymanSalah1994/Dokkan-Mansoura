@extends('layouts.merchant.merchant_panel')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Name</h3>
                        </div>
                        <div class="col-md-4">
                            <h3>Quantity</h3>
                        </div>
                        <div class="col-md-4">
                            <h3>Date</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($relatedCartItems as $item)
            <div class="row">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">{{ $item->product->name }}</div>
                            <div class="col-md-4">{{ $item->quantity }}</div>
                            <div class="col-md-4">{{ $item->updated_at }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('scripts')
@endsection
