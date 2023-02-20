@extends('products.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update',$full_product['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $full_product['name'] }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $full_product['description'] }}</textarea>
                </div>
            </div>
             <div class="form-group">
                 <strong>Image:</strong>
                 <input type="file" name="fileToUpload[]" id="fileToUpload"  class="fileToUpload "  accept="image/*" multiple />
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>
        </div>
    </form>

    <div class="row mt-2">

        @foreach ($full_product['images'] as $images)
            @if($images)
                @foreach ($images as $image)
                    <div class="col-4 pl-2 pb-2">
                        <img class="contain" height="400px" width="100%" src="../../images/{{ $image->path  }}" alt="img" />
                    </div>
                    <form action="{{ route('productimage.destroy',$image->id) }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endforeach
            @endif
        @endforeach
    </div>

@endsection
