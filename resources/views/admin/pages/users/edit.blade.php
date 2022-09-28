@extends("admin.layouts.master")
@section('content')

    <div class="container">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="h3 text-gray-800 text-center font-italic text-uppercase">Edit User</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('update-user', $user->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            </div>                       
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                            </div>                       
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" name="password" class="form-control" value="{{$user->password}}">
                            </div>                       
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('list-user') }}" class="btn btn-danger float-right">Close</a>
                        <button type="submit" class="btn btn-primary float-right mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection