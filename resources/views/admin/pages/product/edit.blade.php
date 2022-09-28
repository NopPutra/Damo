@extends("admin.layouts.master")
@section('content')

    <div class="container">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="h3 text-gray-800 text-center font-italic text-uppercase">Create Product</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('update-product', $product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                                    </div>                       
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="type" id="type">
                                            <option value="{{$product->type ? $product->type->name : ''}}">{{$product->type ? $product->type->name : ''}}</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>                       
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="price" class="form-control" value="{{$product->price}}">
                                    </div>                       
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control" rows="3">{{$product->description}}</textarea>
                                    </div>    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <img src="/productimage/{{$product->image}}" style="width:160px; height:140px;">
                                    </div>                       
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">New Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>                       
                                </div>
                            </div>
                        </div>                                     
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('list-product') }}" class="btn btn-danger float-right">Close</a>
                        <button type="submit" class="btn btn-primary float-right mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection