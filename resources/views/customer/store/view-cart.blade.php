@extends('layouts.store.main_page')
@section('title', 'Cart Items')

@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}">Home</a></li>
                <span> / Cart </span>
            </ol>
        </nav>
    </div>

    

    <br>
@endsection

@section('scripts')
    <script></script>
@endsection
