@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Categories') }}
                        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-primary">+</a>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            {{--                            @foreach($categories as $category)--}}
                            {{--                                <tr>--}}
                            {{--                                    <td>{{ $category->id }}</td>--}}
                            {{--                                    <td>{{ $category->title }}</td>--}}
                            {{--                                    <td>{{ $category->created_at }}</td>--}}
                            {{--                                    <td>{{ $category->updated_at }}</td>--}}
                            {{--                                    <td>--}}
                            {{--                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Edit</a>--}}
                            {{--                                        <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="post">--}}
                            {{--                                            @csrf--}}
                            {{--                                            @method('delete')--}}
                            {{--                                            <input type="submit" onclick="return confirm('Are you sure?');" class="btn btn-sm btn-outline-danger" name="deleteCategory" value="Delete">--}}
                            {{--                                        </form>--}}
                            {{--                                    </td>--}}
                            {{--                                </tr>--}}
                            {{--                            @endforeach--}}
                            </tbody>

                            {{--                            <tfoot>{{ $categories->links() }}</tfoot>--}}
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection