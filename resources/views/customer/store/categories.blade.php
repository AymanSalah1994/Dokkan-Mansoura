@extends('layouts.store.main_page')

@section('slider')
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center">{{__('All Categories')}}</h2>
            <hr>
            <div class="row gy-5">
                @foreach ($allCategories as $category)
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
