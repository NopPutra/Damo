@extends("admin.layouts.master")
@section('content')

    <div class="container">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="h3 text-gray-800 text-center font-italic text-uppercase">Create Product</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('store-product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @enderror
                            </div>                       
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('image') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                    <option value="">Choose</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter Price">
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                                @enderror
                            </div>                       
                        </div>
                        <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3"></textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                                @enderror
                        </div>    
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('list-product') }}" class="btn btn-danger float-right">Close</a>
                    <button type="submit" class="btn btn-primary float-right mr-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection