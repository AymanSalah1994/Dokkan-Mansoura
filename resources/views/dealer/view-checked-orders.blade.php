@extends('layouts.dealer.dealer_panel')
@section('title', 'Ckecked Orders')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> Orders </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>#</th>
                        <th>tracking number</th>
                        <th>total</th>
                        <th>status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($checkedOrders as $order)
                            <tr>
                                <td>{{ $order->id }} </td>
                                <td class="table-success">
                                <a href="{{ route('dealer.panel.view.order.details',
                                ['id' => $order->id, 'tracking_id' => $order->tracking_id ]) }}">
                                        {{ $order->tracking_id }}
                                    </a>
                                </td>
                                <td>{{ $order->total }}</td>
                                <td>Checked and Pending</td>
                                <td>
                                    <a href="" class="btn btn-primary"
                                        onclick="event.preventDefault();document.getElementById('{{ $order->id }}').submit();">
                                        Mark as Prepared</a>
                                </td>
                                <form id="{{ $order->id }}" action="{{ route('dealer.panel.mark.order.prepared', $order->id) }}"
                                    method="post" style="display: none">
                                    @csrf
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection