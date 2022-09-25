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
            <div class="col-md-8">
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
                                    <td>
                                        <form action="{{ route('refund.order.item') }}" method="POST" style="">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-warning">Refund this Only</button>
                                        </form>
                                    </td>
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
                                Cancelled
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
            <div class="col-md-4">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('refund.whole.order', $order->id) }}" method="post" style="">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <button type="submit" class="btn btn-danger">Return the Whole Order</button>
                            </form>
                        </div>
                    </div>
                </div>
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
