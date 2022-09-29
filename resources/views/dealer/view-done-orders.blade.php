@extends('layouts.dealer.dealer_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> {{ __('Done Orders') }} </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>tracking number</th>
                        <th>total</th>
                        <th>status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($alldoneOrders as $order)
                            <tr>
                                <td>{{ $order->id }} </td>
                                <td>{{ $order->tracking_id }} </td>
                                <td>{{ $order->total }}</td>
                                <td>Done</td>
                                <td>
                                    <a class="btn btn-danger"
                                        href="{{ route('dealer.panel.view.to.refund', ['id' => $order->id, 'tracking_id' => $order->tracking_id]) }}">
                                        REfund</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
