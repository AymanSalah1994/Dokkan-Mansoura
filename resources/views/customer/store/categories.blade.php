@extends('layouts.store.main_page')

@section('slider')
@endsection

@section('content')
    <div class="divider" style="height: 50px">
    </div>
    <div class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center">All Categories</h2>
            <hr>
            <div class="row gy-5">
                @foreach ($allCategories as $category)
                    {{-- overflow-auto --}}
                    <div class="col-md-3">
                        @include('layouts.store.storeparts.category-card')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
