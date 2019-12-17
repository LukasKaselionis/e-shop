@extends('shared.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Show Product</div>
                    <table class="table">

                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Description</td>
                            <td>Categories</td>
                            <td>Created</td>
                            <td>Updated</td>
                        </tr>
                        <tr>

                            <td class="pb-1">{{ $product->id }}</td>
                            <td class="pb-1">{{ $product->name }}</td>
                            <td class="pb-1">{{ $product->price }}</td>
                            <td class="pb-1">{{ $product->description }}</td>
                            <td class="pb-1">
                                @foreach($product->categories as $category)
                                    {{ $category->id }}
                                @endforeach
                            </td>
                            <td class="pb-1">{{ $product->created_at }}</td>
                            <td class="pb-1">{{ $product->updated_at }}</td>
                        </tr>
                    </table>
                    <div class="card-footer">
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('admin.product.index') }}">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection