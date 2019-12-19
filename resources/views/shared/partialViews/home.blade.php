@extends('shared.layouts.app')

@section('content')
    <div class="breadcrumb justify-content-center">
        All products
    </div>
    @include('shared.partialViews.product_list', ['products' => $products])

@endsection

@push('scripts')
    @include('components.addToCart')
@endpush

