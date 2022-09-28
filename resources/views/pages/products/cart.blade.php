@extends("layouts.master")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%" class="text-center">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Product" class="text-center">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="50" height="50" class="img-responsive"/></div>
                                        <div class="col-sm-9">
                                            <h6 class="nomargin">{{ $details['name'] }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">${{ $details['price'] }}</td>
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                </td>                        
                                <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                                <td class="actions" data-th="">
                                    <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
                <!-- <tfoot>
                    <tr>
                        <td colspan="5" class="text-right"><h3><strong>Total: ${{$total}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ route('product') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                            <button class="btn btn-success">Checkout</button>
                        </td>
                    </tr>
                </tfoot> -->
            </table>
        </div>
        <div class="col-sm-3 alert alert-secondary">
            <a href="{{ route('product') }}" class="btn btn-info btn-block mb-2" style="border-radius: 30px;"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5><strong>Total</strong></h5>
                </div>
                <div class="col-md-6">
                    <h5 class="text-right"><strong>${{$total}}</strong></h5>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-md-12">
                    <img src="{{ asset('assets/images/visa.png') }}" style="width: 10%;">
                    <small>Cash On Delivery</small>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="a" checked>
                        <label class="form-check-label" for="exampleRadios1"></label>
                    </div>
                    <hr>
                    <img src="{{ asset('assets/images/mastercard.png') }}" style="width: 10%;">
                    <small>Credit Master Card</small>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="b">
                        <label class="form-check-label" for="exampleRadios2"></label>
                    </div>
                    <hr>
                    <img src="{{ asset('assets/images/aba.png') }}" style="width: 10%;">
                    <small>ABA Card</small>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="b">
                        <label class="form-check-label" for="exampleRadios2"></label>
                    </div>
                    <hr>
                </div>

                <!-- <div class="col-md-2">
                    <img src="{{ asset('assets/images/visa.png') }}" style="width: 250%;">
                </div>
                <div class="col-md-10">
                    <small><strong>Visa Card</strong></small>
                </div> -->
            </div>   
            <!-- <div class="row mb-2">
                <div class="col-md-2">
                    <img src="{{ asset('assets/images/mastercard.png') }}" style="width: 250%;">
                </div>
                <div class="col-md-10">
                    <small><strong>MasterCard</strong></small>
                </div>
            </div> -->
            <a href="{{route('stripe')}}" class="btn btn-success btn-block" style="border-radius: 30px;">Checkout Product</a>
        </div>
    </div>   
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    $(".update-cart").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);
   
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>

@endsection
