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
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }} </td>
                                <td>{{ $order->tracking_id }} </td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                <a href="{{ route('categories.edit', $order->id) }}" class="btn btn-primary">View</a>
                                <a href="" class="btn btn-danger"
                                        onclick="event.preventDefault();document.getElementById('{{ $order->id }}').submit();">
                                        Delete</a>
                                </td>
                                <form id="{{ $order->id }}" action="{{ route('categories.delete', $order->id) }}"
                                    {{-- dispay none and still visible inspect --}} method="post" style="display: none">
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
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
