@extends("admin.layouts.master")
@section('content')

    <div class="container">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h1 class="h3 text-gray-800 text-center font-italic text-uppercase">Create User</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('store-user')}}" method="post">
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
                            <label for="name" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @enderror
                            </div>                       
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                @enderror
                            </div>                       
                        </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('list-user') }}" class="btn btn-danger float-right">Close</a>
                    <button type="submit" class="btn btn-primary float-right mr-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection