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
                                <td>
                                    <form action="{{ route('admin.user.to.merchant')}}" class="form form-inline" method="post">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $user->id }}">
                                        <button type="submit" class="btn">TO Merchant</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ route('admin.user.to.dealer')}}" class="form form-inline" method="post">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $user->id }}">
                                        <button type="submit" class="btn">TO Dealer</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{ route('admin.user.delete')}}" class="form form-inline" method="post">
                                        @csrf
                                        <input type="hidden" name="identifier" value="{{ $user->id }}">
                                        <button type="submit" class="btn">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('admin.user.view', $user->id) }}" class="btn">View</a>
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
