@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> Order : {{ $order->tracking_id }} </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            {{-- Order Details --}}
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3>Order Details</h3>
                    </div>
                    <div class="card-body">
                        {{-- Don't Forget to Put the Order iD --}}
                        <table class="table table-hover">
                            <thead>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </thead>
                            @php
                                $total = 0;
                                $checking_order = '';
                            @endphp
                            @foreach ($order->cartItems as $item)
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
                        <span>Total : {{ $total }}</span>
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
            <div class="col-md-5">
                @if ($order->status == '1')
                    <div class="row">
                        <a href="">Return TO Cart to Edit</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
