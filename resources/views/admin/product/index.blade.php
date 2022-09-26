@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-body">
                    <h4 class="card-title">Create</h4>
                    <a href="{{ route('products.create') }}">
                        <i class="material-icons">add_circle</i>
                        <span>Create new product</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-body">
                    <h4 class="card-title">Create</h4>
                    <a href="{{ route('products.create') }}">
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
                    <a href="{{ route('products.create') }}">
                        <i class="material-icons">add_circle</i>
                        <span>Create new Category</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h1> Products </h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Seller</th>
                        <th>Selling Price</th>
                        <th>Action</th>
                        <th>Image</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->user->first_name }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->slug) }}" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger"
                                        onclick="event.preventDefault();document.getElementById('{{ $product->id }}').submit();">
                                        Delete</a>
                                </td>
                                <form id="{{ $product->id }}" action="{{ route('products.destroy', $product->slug) }}"
                                    method="post" style="display: none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <td>
                                    <img src="{{ Storage::url($product->product_picture) }}"
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
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
