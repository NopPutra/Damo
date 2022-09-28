@extends("admin.layouts.master")
@section('content')

    <div class="container">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="h3 text-gray-800 text-center font-italic text-uppercase">Show Product</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="{{$product->name}}" readonly>
                                    </div>                       
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="type" class="form-control" value="{{ $product->type ? $product->type->name : '' }}" readonly>
                                    </div>                       
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="price" class="form-control" value="{{$product->price}}" readonly>
                                    </div>                       
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control" rows="3" readonly>{{$product->description}}</textarea>
                                    </div>    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <img src="/productimage/{{$product->image}}" style="width:190px;">
                                    </div>                       
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('list-product') }}" class="btn btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection