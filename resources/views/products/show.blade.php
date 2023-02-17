@extends('products.layout')

@section('content')
    <div class="row">
        @foreach ($product->getImages() as $image)
        <div class="col-4 pl-2 pb-2">
            <img class="contain" height="400px" width="100%" src="../images/{{ $image }}" alt="img" />
        </div>
        @endforeach

    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->description }}
            </div>
        </div>
    </div>

@endsection
