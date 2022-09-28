@extends("admin.layouts.master")
@section('content')

    <div class="container">
        <div class="card">
            @if ($message = Session::get('success')) 
                <div class="alert alert-success"> 
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card-header">
                <a href="{{route('create-product')}}" class="btn btn-primary mr-4"><i class="fa fa-plus"></i>Add New</a> 
                Total of Products: {{(int)$productCounts}}
                <form action="{{ route('list-product') }}" method="get" style="width: 400px; float: right;">
                    <div class="input-group mb-3">
                        <input value="{{ request()->has('search') ? request('search') : '' }}" name="search" type="text" class="form-control mr-sm-2" placeholder="Search Product Name" aria-label="search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                        </div> 
                    </div>
                </form> 
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">N.o</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col" class="text-center">Type</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <!-- <td class="text-center">{{(int)((request()->has('page') ? request()->page : 1) - 1) * 10 + (int)$key + 1}}</td>   1->10       -->
                            <td class="text-center">{{(int)$productCounts - (int)$limit * (int)((request()->has('page') ? request()->page : 1) - 1) - (int)$key}}</td>  
                            <td class="text-center">{{$product->name}}</td>
                            <!-- <td class="text-center"><img src="{{ asset('/storage/products/'. $product->image) }}" style="width: 2rem;"></td> -->
                            <td class="text-center"><img src="/productimage/{{$product->image}}" style="width:30px;"></td>
                            <td class="text-center"><span class="badge badge-pill badge-dark">{{ $product->type ? $product->type->name : '' }}</span></td>
                            <td class="text-center">{{$product->price}}</td>    
                            <td class="text-center">
                                <form action="{{route('delete-product', $product->id)}}" method="post" >
                                    @csrf
                                    @method('delete')
                                    <input type="hidden">
                                    <!-- <a href="{{route('view-product', $product->id)}}" class="btn btn-info"><i class="far fa-eye"></i></a> |
                                    <a href="{{route('edit-product', $product->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a> |
                                    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button> -->
                                    <a href="{{route('view-product', $product->id)}}"><i class="far fa-eye" style="color:green;"></i></a> |
                                    <a href="{{route('edit-product', $product->id)}}"><i class="fas fa-edit" style="color:blue;"></i></a> |
                                    <a type="submit" class="show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash" style="color:red;"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <!-- https://releases.jquery.com/ -->
                    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
                    <script type="text/javascript">
            
                        $('.show_confirm').click(function(event) {
                            var form =  $(this).closest("form");
                            var name = $(this).data("name");
                            event.preventDefault();
                            swal({
                                title: `Are you sure you want to delete?`,
                                text: "If you delete this, it will be gone forever.",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                form.submit();
                                }
                            });
                        });
            
                    </script>
                </table>
                <div class="m-4">
                    <span class="pagination justify-content-center">{{$products->links()}}</span>
                    <!-- {{$products->count()}} -->
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <h1 class="h3 mb-2 text-gray-800 text-center font-italic text-uppercase">List Product</h1>
        <a href="{{route('create-product')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New</a>  
        <form action="{{ route('list-product') }}" method="get" style="width: 500px; float: right;">
            <div class="input-group mb-3">
                <input value="{{ request()->has('search') ? request('search') : '' }}" name="search" type="text" class="form-control mr-sm-2" placeholder="Search Product Name" aria-label="search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                </div> 
            </div>
        </form>

        @if ($message = Session::get('success')) 
            <div class="alert alert-success"> 
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Type</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                <tr>
                    
                    <td class="text-center">{{(int)$productCounts - (int)$limit * (int)((request()->has('page') ? request()->page : 1) - 1) - (int)$key}}</td>  


                    <td class="text-center">{{$product->name}}</td>
                    
                    <td class="text-center"><img src="/productimage/{{$product->image}}" style="width:40px;"></td>
                    <td class="text-center"><span class="badge badge-pill badge-dark">{{ $product->type ? $product->type->name : '' }}</span></td>
                    <td class="text-center">{{$product->price}}</td>    
                    <td class="text-center">
                        <form action="{{route('delete-product', $product->id)}}" method="post" >
                            @csrf
                            @method('delete')
                            <input type="hidden">
                            <a href="{{route('view-product', $product->id)}}" class="btn btn-info"><i class="far fa-eye"></i></a> |
                            <a href="{{route('edit-product', $product->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a> |
                            <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

            
            <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
            <script type="text/javascript">
    
                $('.show_confirm').click(function(event) {
                    var form =  $(this).closest("form");
                    var name = $(this).data("name");
                    event.preventDefault();
                    swal({
                        title: `Are you sure you want to delete?`,
                        text: "If you delete this, it will be gone forever.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                        form.submit();
                        }
                    });
                });
    
            </script>
        </table>
        
        <div class="m-4">
            <span class="pagination justify-content-center">{{$products->links()}}</span>
          
        </div>
        
    </div> -->

@endsection