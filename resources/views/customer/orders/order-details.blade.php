@extends('layouts.store.main_page')
@section('title', 'Order Details')

@section('slider')
@endsection
@section('content')
    <div class="divider" style="height: 50px">
    </div>
    @if ($order)
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3>{{ __('Order Details') }}</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="">
                                    <th>{{ __('Product Name') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Price') }}</th>
                                </thead>
                                @php
                                    $total = 0;
                                    $checking_order = '';
                                @endphp
                                @foreach ($cartItems as $item)
                                    <tr class="{{ $item->status == '5' ? 'table-danger' : 'table-success' }}">
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->cart_total_price }}</td>
                                    </tr>
                                    @php
                                        $total += $item->cart_total_price;
                                        $checking_order = $item->order_id;
                                    @endphp
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer">
                            <span>{{ __('Total') }} : {{ $total }}</span>
                        </div>
                        <div class="card-footer">
                            <span>{{ __('Order Total') }} : {{ $order->total }}</span>
                        </div>
                        <div class="card-footer">
                            <span>{{ __('* Total Changes Based on Prices Changes') }}</span>
                        </div>
                        <div class="card-footer">
                            @switch($order->status)
                                @case(0)
                                    {{ __('Not Checked/In Cart') }}
                                    <br>
                                    <a href="{{ route('cart.checkout') }}">{{ __('Checkout') }} >> </a>
                                @break

                                @case(1)
                                    {{ __('Checked and Pending') }}
                                @break

                                @case(2)
                                    {{ __('In Preparation') }}
                                @break

                                @case(3)
                                    {{ __('Cancelled') }}
                                @break

                                @case(4)
                                    {{ __('Done') }}
                                @break

                                @case(5)
                                    {{ __('Refunded') }}
                                @break

                                @default
                                    <td>""</td>
                            @endswitch
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-5">
                    @if ($order->status == '1')
                        <div class="row">
                            <form action="{{ route('return.order.to.cart') }}"
                                onsubmit="myButton.disabled = true; return true;" method="post"
                                class="form-inline float-start">
                                @csrf
                                <input type="hidden" name="tracking_id" value="{{ $order->tracking_id }}">
                                <button href="" class="btn btn-info">{{ __('Return Order to Cart') }}</button>
                            </form>
                        </div>
                        <div class="row">
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('order.cancel') }}"
                                    onsubmit="myButton.disabled = true; return true;" method="post" class="form-inline">
                                    @csrf
                                    <input type="hidden" name="tracking_id" value="{{ $order->tracking_id }}">
                                    <button href="" class="btn btn-danger">{{ __('Cancel Order') }}</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    {{ __('The Order is checked and Pending,you will be contaced Soon') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        {{ Redirect::to('/') }}
    @endif
    <br>
@endsection

@section('scripts')

@endsection
