@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Products') }}
                        <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary">+</a>
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
                                <th>Title</th>
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
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="{{
                                        route('admin.product.edit', ['product' => $product->id])
                                        }}">
                                            Edit
                                        </a>
                                        <a class="btn btn-sm btn-outline-success"
                                           href="{{ route('admin.product.show', ['product' => $product->id]) }}">Show</a>

                                        <form class="d-inline"
                                              action="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" onclick="return confirm('Are you sure?');"
                                                   class="btn btn-sm btn-outline-danger" name="deleteArticle"
                                                   value="Delete">
                                        </form>
                                    </td>
                                </tr>

                            @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection