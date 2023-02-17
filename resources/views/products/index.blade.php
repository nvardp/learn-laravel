@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Laravel CRUD Example</h2>
            </div>
            <div class="pull-right mb-4">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">

        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card mb-2 mt-2" style="width: 21rem;">
                    <img height="250px" class="card-img-top" src="{{  "images" . DIRECTORY_SEPARATOR . $product->getCoverImg() }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $product->name }} </h5>
                        <p class="card-text"> {{ $product->description }} </p>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    {{ $products->links() }}



@endsection
