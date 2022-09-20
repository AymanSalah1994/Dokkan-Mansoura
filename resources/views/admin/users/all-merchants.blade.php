@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> merchants </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>Merchant Name</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($merchants as $merchant)
                            <tr>
                                <td>{{ $merchant->id }} </td>
                                <td>{{ $merchant->first_name }} </td>
                                <td>{{ $merchant->phone }}</td>
                                <td>{{ $merchant->role_as }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">View</a>
                                    <a href="" class="btn btn-danger">Revoke</a>
                                    <a href="" class="btn btn-danger"
                                        onclick="event.preventDefault();document.getElementById('{{ $merchant->id }}').submit();">
                                        Delete
                                    </a>
                                </td>
                                {{-- dispay none and still visible inspect --}}
                                <form id="{{ $merchant->id }}" action=""
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
