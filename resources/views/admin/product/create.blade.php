@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('New Product') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.product.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="price">{{ __('Price') }}</label>
                                <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price') }}">
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea style="width: 100%" name="description" id="description"></textarea>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" name="submit" value="{{ __('Save') }}">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection