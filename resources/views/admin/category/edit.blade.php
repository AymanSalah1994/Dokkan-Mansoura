@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h6>Edit Category</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update') }}" onsubmit="myButton.disabled = true; return true;" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="category_" value="{{ $category->id }}">
                <input type="hidden" name="slug" value="{{ $category->slug }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $category->name) }}">
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
                                <textarea class="form-control" rows="5" name="description">{{ old('description', $category->description) }}</textarea>
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
                                <textarea class="form-control" rows="5" name="keywords">{{ old('keywords', $category->keywords) }}</textarea>
                                @error('keywords')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Status</label>
                            <input type="checkbox" class="form-control" name="status"
                                {{ $category->status == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Popular</label>
                            <input type="checkbox" class="form-control" name="popular"
                                {{ $category->popular == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <img src="{{ Storage::url($category->category_picture) }}" alt="" width="100">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <input type="file" class="form-group" name="category_picture">
                </div>
                <button type="submit" name="myButton" class="btn btn-primary pull-right">Update Category</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
