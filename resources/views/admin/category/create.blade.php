@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h6>Add new Category</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
{{--                            @error('name')--}}
{{--                            <span style="color: red">{{ $message }}</span>--}}
{{--                            @enderror--}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description , SEPERATE WITH comma !!</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="description" value="{{ old('description') }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">meta_title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">meta_keywords</label>
                            <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="meta_description" value="{{ old('meta_description') }}"></textarea>
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
                <button type="submit" class="btn btn-primary pull-right">Create Category</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    {{--    Error Directives --}}
    @error('name')
        <script>
            swal("!", "{{ $message }}", "warning");
        </script>
    @enderror
@endsection
