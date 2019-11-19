@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Category edit') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.category.update', ['category' => $category->id]) }}"
                              method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" id="title" name="title" class="form-control"
                                       value="{{ old('title', $category->title) }}">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-sm btn-outline-primary"
                                       value="{{ __('Save') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection