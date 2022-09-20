@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> Users </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }} </td>
                                <td>{{ $user->first_name }} </td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->role_as }}</td>
                                <td>
                                    <a href="" class="btn btn-success">TO Merchant</a>
                                    <a href="" class="btn btn-light">TO Dealer</a>
                                    <a href="" class="btn btn-primary">View</a>
                                    <a href="" class="btn btn-danger"
                                        onclick="event.preventDefault();document.getElementById('{{ $user->id }}').submit();">
                                        Delete
                                    </a>
                                </td>
                                {{-- dispay none and still visible inspect --}}
                                <form id="{{ $user->id }}" action=""
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
