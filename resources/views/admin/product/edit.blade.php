@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-header">
            <h6>Edit Product</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update',$theProduct->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name',$theProduct->name) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">small description</label>
                            <input type="text" class="form-control" name="small_description"
                                value="{{ old('small_description',$theProduct->small_description) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description , SEPERATE WITH comma !!</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="description">{{ old('description',$theProduct->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">original price</label>
                            <input type="number" class="form-control" name="original_price"
                                value="{{ old('original_price',$theProduct->original_price) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">selling price</label>
                            <input type="number" class="form-control" name="selling_price"
                                value="{{ old('selling_price',$theProduct->selling_price) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ old('quantity',$theProduct->quantity) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">tax</label>
                            <input type="number" class="form-control" name="tax" value="{{ old('tax',$theProduct->tax) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">meta_title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title',$theProduct->meta_title) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">meta_keywords</label>
                            <input type="text" class="form-control" name="meta_keywords"
                                value="{{ old('meta_keywords',$theProduct->meta_keywords) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Meta Description</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="meta_description">{{ old('meta_description',$theProduct->meta_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Status</label>
                            <input type="checkbox" class="form-control" name="status" {{ $theProduct->status =='1' ? "checked" : ""}}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">trending</label>
                            <input type="checkbox" class="form-control" name="trending" {{ $theProduct->trending =='1' ? "checked" : ""}}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="category_id" id="" class="form-select form-control">
                                <option value="">Select Category</option>
                                @foreach ($allCategories as $category)
                                    <option value="{{ $category->id }}" {{ old('company_id',$theProduct->category_id)==$category->id ? 'selected' : '' }}>
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
                <button type="submit" class="btn btn-primary pull-right">Update Product</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
