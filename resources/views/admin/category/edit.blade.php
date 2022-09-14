@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h6>Add new Category</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update' ,$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name' , $category->name) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug' ,$category->slug) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description , SEPERATE WITH comma !!</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="description" >{{ old('description' , $category->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">meta_title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title' ,$category->meta_title) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">meta_keywords</label>
                            <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords' ,$category->meta_keywords) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="meta_description" >{{ old('meta_description' ,$category->meta_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Status</label>
                            <input type="checkbox" class="form-control" name="status" {{ $category->status=='1' ? "checked" : ""}}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Popular</label>
                            <input type="checkbox" class="form-control" name="popular" {{ $category->popular=='1' ? "checked" : ""}}>
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
                <button type="submit" class="btn btn-primary pull-right">Update Category</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
