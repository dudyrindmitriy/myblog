@extends('category.layout')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 margin-tb">
            <div style="text-align: center;">
                <h4>Show Category</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Show All Categories</a>
            </div>
            <p>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Show All Products</a>
                </div>
            </p>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;text-align: center;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong><br>
                {{ $category->name }}
            </div>
            <div class="form-group">
                <strong>Products:</strong><br>
                @foreach ($category->products as $product)
                    <p><a class="btn btn-info" href="{{ route('products.show', $product->id) }}">{{$product->name}}</a></p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
