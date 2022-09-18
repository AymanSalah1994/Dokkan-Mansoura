@extends('layouts.store.main_page')
@section('title', 'Check Out')
@section('slider')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3>Orders</h3>
                </div>
                <div class="card-body">
                    {{-- Don't Forget to Put the Order iD --}}
                    <table class="table table-hover">
                        <thead>
                            <th>Order Date</th>
                            <th>Tracking Number</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->updated_at }}</td>
                                <td>
                                    <a href="{{ route('order.details', $order->id) }}">
                                        {{ $order->tracking_id }}
                                    </a>
                                </td>
                                <td>{{ $order->total }}</td>
                                @switch($order->status)
                                    @case(0)
                                        <td>Not Checked/In Cart</td>
                                    @break

                                    @case(1)
                                        <td>Checked and Pending</td>
                                        <td><a href="">Delete Order Order</a></td>
                                        <td><a href="">Return Back to Cart To Edit</a></td>
                                    @break

                                    @case(2)
                                       <td> In Preparation</td>
                                    @break

                                    @case(3)
                                        <td>Done</td>
                                    @break

                                    @case(4)
                                        <td>Cancelled</td>
                                    @break

                                    @case(4)
                                        <td>Refunded</td>
                                    @break

                                    @default
                                        <td>""</td>
                                @endswitch
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        @if ($msdg = session('status'))
            swal('{{ $msdg }}')
        @endif
    </script>
@endsection
