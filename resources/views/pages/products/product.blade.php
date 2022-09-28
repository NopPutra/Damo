@extends("layouts.master")
@section('content')

    <div class="container">
        <br>
        <h1 class="h3 mb-4 text-gray-800 text-center font-italic text-uppercase">{{__('product.product')}}</h1>
        <div class="row">
            <form action="{{ route('product') }}" method="get" style="width: 1200px; float: right;">
                <div class="input-group mb-3">
                    <input value="{{ request()->has('search') ? request('search') : '' }}" name="search" type="text" class="form-control mr-sm-2" placeholder="{{__('product.search_product')}}" aria-label="search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit"><i class="fa fa-search" aria-hidden="true"></i>{{__('product.search')}}</button>
                    </div> 
                </div>
            </form>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('product')}}" class="btn btn-danger btn-lg">All</a>
                @foreach($types as $type)
                    <a href="{{ route('product', ['c' => $type->id]) }}" class="btn btn-info btn-lg">{{$type->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="card" style="width: 15rem;">
                    <!-- <img class="card-img-top" src="{{ asset('/assets/products/'. $product->image) }}" alt="Card image cap"> -->
                    <img src="/productimage/{{$product->image}}">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $product->name }}</h5>
                        <!-- <h5 class="text-center mb-2" style="color:green;">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                        </h5> -->
                        <!-- <h5 class="text-center">{{ $product->description }}</h5> -->
                        <h5 class="text-center">
                            <!-- <span><s class="text-secondary">$20</s></span> -->
                            <span>${{ $product->price }}</span>
                        </h5>
                        <!-- <a href="{{url('/product/detail/'. $product->id)}}" class="btn btn-primary">{{__('product.detail')}}</a> -->
                        <p class="btn-holder"><a href="{{route('add-cart', $product->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a> </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="m-4">
        <span class="pagination justify-content-center">{{$products->appends($_GET)->links()}}</span>
    </div>

@endsection