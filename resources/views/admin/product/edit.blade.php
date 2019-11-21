@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Product edit') }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.update', ['product' => $product->id]) }}"
                              enctype="multipart/form-data"
                              method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control"
                                       value="{{ old('name', $product->name) }}">
                            </div>

                            <div class="form-group">
                                <label for="price">{{ __('Price') }}</label>
                                <input type="text" id="price" name="price" class="form-control"
                                       value="{{ old('price', $product->price) }}">
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea style="width: 100%" name="description"
                                          id="description">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="categories">{{ __('Categories') }}</label>
                                @foreach($categories as $catId => $catName)
                                    <input id="categories" class="form-check" type="checkbox"
                                           name="categories[]" value="{{ $catId }}"
                                            {{ in_array($catId, old(
                                            'categories',
                                             ($errors->any() && old('categories') === null) ? [] : $product->categories->pluck('id')->toArray()
                                             )) ? 'checked="checked"' : '' }}> {{ $catName }}
                                @endforeach

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