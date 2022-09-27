@extends('layouts.store.main_page')
@section('title', 'Check Out')

@section('slider')
    @include('customer.store.toast')
@endsection
@section('content')
    @include('layouts.dividers.divider-small')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3>User Details</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input class="form-control" type="text" placeholder="{{ request()->user()->first_name }}"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input class="form-control" type="text" placeholder="{{ request()->user()->last_name }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">City</label>
                                <input class="form-control" type="text" placeholder="{{ request()->user()->city }}"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone</label>
                                <input class="form-control" type="text" placeholder="{{ request()->user()->phone }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Address</label>
                                <input class="form-control" type="text" placeholder="{{ request()->user()->address }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Email</label>
                                <input class="form-control" type="Email" placeholder="{{ request()->user()->email }}"
                                    readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('profile.view') }}" class="btn btn-primary">Edit Your Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Order Details') }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Price') }}</th>
                            </thead>
                            @php
                                $total = 0;
                                $checking_order = '';
                            @endphp
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ (int) $item->quantity * (int) $item->product->selling_price }}</td>
                                </tr>
                                @php
                                    $total += (int) $item->quantity * (int) $item->product->selling_price;
                                    $checking_order = $item->order_id;
                                @endphp
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        <span>{{ __('Total') }} : {{ $total }}</span>
                        {{-- <a href="" class="btn btn-success rounded-pill float-end">Confirm</a> --}}
                        {{-- Make it a Button for Form , Form to change order status --}}
                    </div>
                    <div class="card-footer">
                        {{-- order.confirm --}}
                        <div class="row">
                            <form action="{{ route('order.confirm') }}" class="row" method="POST">
                                @csrf
                                <input type="hidden" name="checking_order" value="{{ $checking_order }}">
                                <button type="submit"
                                    class="btn btn-success rounded-pill float-end">{{ __('Confirm (Pay on Delivery)') }}</button>
                            </form>
                        </div>
                        <br>
                        <div class="row">
                            <button class="btn btn-success rounded-pill float-end"
                                disabled>{{ __('Online (Not Working Currently)') }}</button>
                        </div>
                        {{-- Make it a Button for Form , Form to change order status --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('scripts')

@endsection
