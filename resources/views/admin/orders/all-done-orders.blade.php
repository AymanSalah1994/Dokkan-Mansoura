@extends('layouts.dashboard.main_panel')
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
                                <td>{{ $order->status }}</td>
                                <td>
                                    <a href="{{ route('refund.order.details', $order->id) }}"
                                        class="btn btn-danger">REfund</a>
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
