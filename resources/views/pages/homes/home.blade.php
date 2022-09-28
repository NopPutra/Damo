@extends("layouts.master")
@section('content')
        
        <div class="container">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('/assets/images/slider.png') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/assets/images/slider1.png') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/assets/images/slider2.png') }}" alt="Third slide">
                    </div>
                </div>
            </div>
            <br>
            <h1 class="h3 mb-4 text-gray-800 text-center font-italic text-uppercase">{{__('home.lestest_product')}}</h1>
            <div class="row">
                <form action="{{ route('product') }}" method="get" style="width: 1200px;"> 
                    <div class="input-group mb-3">
                        <input value="{{ request()->has('search') ? request('search') : '' }}" name="search" type="text" class="form-control mr-sm-2" placeholder="{{__('home.search_product')}}" aria-label="search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit"><i class="fa fa-search" aria-hidden="true"></i>{{__('home.search')}}</button>
                        </div> 
                    </div>
                </form>
            </div>

            <div class="row">
                @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card" style="width: 15rem;">
                        <img src="/productimage/{{$product->image}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}} - {{$product->price}}$</h5>
                            <!-- <a href="#" class="btn btn-primary">Add to Cart</a> -->
                            <!-- <p class="btn-holder"><a href="{{route('add-cart', $product->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p> -->
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