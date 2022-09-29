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
                                    <form action="{{ route('admin.user.revoke') }}" class="form form-inline" method="post">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $merchant->id }}">
                                        <button type="submit" class="btn btn-warning">Revoke</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.user.delete') }}" class="form form-inline" method="post">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $merchant->id }}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
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
