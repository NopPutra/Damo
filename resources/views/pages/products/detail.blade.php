@extends("layouts.master")
@section('content')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-4">
        <!-- <img src="{{ asset('/assets/products/'. $product->image) }}" style="width: 20rem;"> -->
        <img src="/productimage/{{$product->image}}">
    </div>
    <div class="col-md-3">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name: <span>{{ $product->name }}</span></li>
            <li class="list-group-item">Price: <span>{{ $product->price }}</span></li>
            <li class="list-group-item">Description: <span>{!! $product->description !!}</span></li>
        </ul>
        <br>
        <a href="{{ route('list-product') }}" class="btn btn-danger float-right">Back</a>
    </div>
    
</div>

@endsection