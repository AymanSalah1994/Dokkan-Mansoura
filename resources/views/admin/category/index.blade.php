@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-body">
                    <h4 class="card-title">Create</h4>
                    <a href="{{ route('admin.categories.create') }}">
                        <i class="material-icons">add_circle</i>
                        <span>Create new Category</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-body">
                    <h4 class="card-title">Create</h4>
                    <a href="{{ route('admin.categories.create') }}">
                        <i class="material-icons">add_circle</i>
                        <span>Create new Category</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-body">
                    <h4 class="card-title">Create</h4>
                    <a href="{{ route('admin.categories.create') }}">
                        <i class="material-icons">add_circle</i>
                        <span>Create new Category</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1> Categories </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }} </td>
                                <td>{{ $category->name }} </td>
                                <td>{{ Str::limit($category->description, 25) }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', [$category->id, $category->slug]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger"
                                        onclick="event.preventDefault();document.getElementById('{{ $category->id }}').submit();">
                                        Delete</a>
                                </td>
                                <form id="{{ $category->id }}" action="{{ route('admin.categories.delete', $category->id) }}"
                                    method="POST" style="display: hidden">
                                    @csrf
                                </form>`
                                <td><img src="{{ Storage::url($category->category_picture) }}"
                                        style="width: 100%;
                                    height: 15vw;
                                    object-fit: cover;">
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
            swal("Done !", '{{ $status }}', "success");
        </script>
    @endif
@endsection
