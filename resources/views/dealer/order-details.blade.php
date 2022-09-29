@extends('layouts.dealer.dealer_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> Order : {{ $order->tracking_id }} </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Buyer') }}</th>
                                <th>{{ __('Remove this Item') }}</th>
                            </thead>
                            @foreach ($order->cartItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ (int) $item->quantity * (int) $item->product->selling_price }}</td>
                                    <td>{{ $item->product->user->first_name }}</td>
                                    <td><a href="">Delete if Not FOuund</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        <span>Total : {{ $order->total }}</span>
                    </div>
                    <div class="card-footer">
                        @switch($order->status)
                            @case(0)
                                Not Checked/In Cart
                            @break

                            @case(1)
                                Checked and Pending
                            @break

                            @case(2)
                                In Preparation
                            @break

                            @case(3)
                                Cancelld
                            @break

                            @case(4)
                                Done
                            @break

                            @case(4)
                                Refunded
                            @break

                            @default
                                <td>""</td>
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>{{ __('Customer Name') }}:</h3>
                        <p> {{ $order->user->first_name }} {{ $order->user->last_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <h3> {{ __('phone') }}:{{ $order->user->phone }} </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
