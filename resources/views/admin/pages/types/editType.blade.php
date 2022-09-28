@extends("admin.layouts.master")
@section('content')

    <div class="container">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="h3 text-gray-800 text-center font-italic text-uppercase">Edit Type Product</h1>
                </div>
                <div class="card-body"> 
                    <form action="{{route('update-type', $type->id)}}" method="post">    
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" value="{{$type->name}}">
                            </div>                       
                        </div> 
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('list-type') }}" class="btn btn-danger float-right">Close</a>
                        <button type="submit" class="btn btn-primary float-right mr-2">Update</button>  
                    </form>  
                </div>
            </div>
        </div>
    </div>

@endsection