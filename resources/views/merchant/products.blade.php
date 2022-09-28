@extends('layouts.merchant.merchant_panel')
@section('content')
    <div class="card">
        <h1>Here is A search Form</h1>
    </div>
    <div class="container">
        @foreach ($products as $product)
            <div class="row justify-content-end align-items-center">
                <div class="col-md-4">
                    <a href="{{ route('merchant.panel.product.view', $product->slug) }}" class="btn btn-primary">View</a>
                </div>
                <div class="col-md-8">
                    <div class="card mb-2" style="">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ Storage::url($product->product_picture) }}" class="card-img card-img-top"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
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
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    @if ($status = session('status'))
        <script>
            swal("Done !", "{{ $status }}", "success");
        </script>
    @endif
@endsection
