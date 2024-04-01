@extends('product.layout')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 margin-tb">
            <div style="text-align: center;">
                <h4>How To Create Laravel 10 CRUD Application with Bootstrap</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}">
                    Add New Product
                </a>
            </div>
            <p>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.index') }}">
                    Go To Categories
                </a>
            </div>
            </p>
        </div>
    </div>

    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered" style="margin-top: 20px;">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/images/{{ $product->image }}" width="100px"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td><a class="btn btn-info" href="{{ route('categories.show', $product->category->id) }}">{{$product->category->name}}</a></td>

                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection
