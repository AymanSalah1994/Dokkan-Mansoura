@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h6>Add new Product</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">small description</label>
                            <input type="text" class="form-control" name="small_description"
                                value="{{ old('small_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description , SEPERATE WITH comma !!</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">original price</label>
                            <input type="number" class="form-control" name="original_price"
                                value="{{ old('original_price') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">selling price</label>
                            <input type="number" class="form-control" name="selling_price"
                                value="{{ old('selling_price') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">tax</label>
                            <input type="number" class="form-control" name="tax" value="{{ old('tax') }}">
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
                            <input type="text" class="form-control" name="meta_keywords"
                                value="{{ old('meta_keywords') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="meta_description">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Status</label>
                            <input type="checkbox" class="form-control" name="status">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">trending</label>
                            <input type="checkbox" class="form-control" name="trending">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="category_id" id="" class="form-select form-control">
                                <option value="">Select Category</option>
                                @foreach ($allCategories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('company_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <input type="file" class="form-group" name="product_picture">
                </div>
                <button type="submit" class="btn btn-primary pull-right">Create Product</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Error Directives --}}
    @error('name')
        <script>
            swal("!", "{{ $message }}", "warning");
        </script>
    @enderror
@endsection
