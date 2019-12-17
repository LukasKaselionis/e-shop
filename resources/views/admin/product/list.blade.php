@extends('shared.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-end pb-2">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-lg btn-outline-primary">Add</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        {{ __('Products') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <td>Cover</td>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>

                            @foreach($products as $product)

                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @if ($product->cover)
                                            <img width="50" src="{{ asset('storage/'.$product->cover) }}"
                                                 alt="{{ $product->title }}">
                                        @endif
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td class="d-flex flex-row">
                                        <a class="btn btn-sm btn-outline-primary mr-1" href="{{
                                        route('admin.product.edit', ['product' => $product->id])
                                        }}">
                                            Edit
                                        </a>
                                        <a class="btn btn-sm btn-outline-success mr-1"
                                           href="{{ route('admin.product.show', ['product' => $product->id]) }}">Show</a>

                                        <form
                                              action="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" onclick="return confirm('Are you sure?');"
                                                   class="btn btn-sm btn-outline-danger" name="deleteProduct"
                                                   value="Delete">
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                            <tfoot>{{ $products->links() }}</tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection