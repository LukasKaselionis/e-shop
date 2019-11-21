@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Show Product</div>

                    <div class="card-body">
                        <h5 class="pb-1">{{ $product->id }}</h5>
                        <h5 class="pb-1">{{ $product->name }}</h5>
                        <h5 class="pb-1">{{ $product->price }}</h5>
                        <h5 class="pb-1">{{ $product->description }}</h5>
                        @foreach($product->categories as $category)
                            <h5 class="pb-1">{{ $category->id }}</h5>
                        @endforeach
                        <h5 class="pb-1">{{ $product->description }}</h5>
                        <h5 class="pb-1">{{ $product->created_at }}</h5>
                        <h5 class="pb-1">{{ $product->updated_at }}</h5>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('admin.product.index') }}">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection