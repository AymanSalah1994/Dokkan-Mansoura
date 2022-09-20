@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> Customer </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }} </td>
                                <td>{{ $customer->first_name }} </td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->role_as }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">View</a>
                                    <a href="" class="btn btn-danger"
                                        onclick="event.preventDefault();document.getElementById('{{ $customer->id }}').submit();">
                                        Delete
                                    </a>
                                </td>
                                {{-- dispay none and still visible inspect --}}
                                <form id="{{ $customer->id }}" action=""
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
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
