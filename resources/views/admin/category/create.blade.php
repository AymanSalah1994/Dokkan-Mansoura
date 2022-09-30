@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add new Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" onsubmit="myButton.disabled = true; return true;" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>KeyWords , Tags</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="keywords">{{ old('keywords') }}</textarea>
                                @error('keywords')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Status</label>
                            <input type="checkbox" class="form-control" name="status">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Popular</label>
                            <input type="checkbox" class="form-control" name="popular">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <input type="file" class="form-group" name="category_picture">
                </div>
                <button type="submit" name="myButton" class="btn btn-primary pull-right">Create Category</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @error('name')
        <script>
            swal("!", "{{ $message }}", "warning");
        </script>
    @enderror
@endsection
