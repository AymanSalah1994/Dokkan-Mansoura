@extends('layouts.store.main_page')
@section('title', 'Search')
@section('slider')
@endsection

@section('content')
    <section class="search-sec">
        <div class="container">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" name="search_word"
                                    value="{{ request('search_word') }}">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                <button type="submit" class="btn btn-primary wrn-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('layouts.dividers.divider-small')
    <form action="" method="GET">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <input type="number" class="form-control search-slt" placeholder="maximum" name="maximum_price"
                            value="{{ request('maximum_price') }}">
                    </div>
                    <div class="row">
                        <input type="number" class="form-control search-slt" placeholder="minimum" name="minimum_price"
                            value="{{ request('minimum_price') }}">
                    </div>
                    <div class="row">
                        <select class="search-slt" id="exampleFormControlSelect1" name="order_by">
                            <option value="">Order By </option>
                            <option value="LtoH" {{ request('order_by') == 'LtoH' ? 'selected' : '' }}>
                                Lowest to Highest</option>
                            <option value="HtoL" {{ request('order_by') == 'HtoL' ? 'selected' : '' }}>
                                Highest To lowest</option>
                        </select>
                    </div>
                    <div class="row">
                        <select class="search-slt" id="exampleFormControlSelect1" name="category">
                            <option value="">Select Category</option>
                            @foreach ($all_categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <select class="search-slt" id="exampleFormControlSelect1" name="merchant">
                            <option value="">Select Merchant</option>
                            @foreach ($all_merchants as $merchant)
                                <option value="{{ $merchant->id }}"
                                    {{ request('merchant') == $merchant->id ? 'selected' : '' }}>
                                    {{ $merchant->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-warning wrn-btn">Filter</button>
                    </div>
                    <div class="row">
                        <button type="reset" class="btn btn-primary wrn-btn">Reset</button>
                    </div>
                </div>
                <div class="col-md-8">
                    {{-- max-width: 540px;" --}}
                    @foreach ($allProducts as $product)
                        <div class="card mb-3" style="">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($product->product_picture) }}" class="card-img card-img-top"
                                        alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                        </a>
                                        <p class="card-text">
                                            {{ Str::limit($product->description, $limit = 50, $end = '...') }}
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                Price : {{ $product->selling_price }}
                                            </small>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                Buyer : {{ $product->user->first_name }}
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- {{ $allProducts->appends(request()->only(['company_id','search']))->links() }} --}}
            {{-- {{ $allProducts->links() }} --}}
        </div>
    </form>
    <div class="container">
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                {{ $allProducts->appends(request()->only(['maximum_price', 'minimum_price', 'order_by', 'category', 'merchant']))->links() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Here we will Make it Refresh Once Search Criteria Changes  ;
    </script>
@endsection
