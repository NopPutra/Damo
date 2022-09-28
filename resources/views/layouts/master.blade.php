<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tragon</title>

    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.css">

    <!-- fontawesome icon -->
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

    <!-- css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

</head>
<body>
    <!-- <div class="container"> -->

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <h6 class="card-header text-uppercase" style="background: #008B8B; color: #fff" ><marquee behavior="" direction="">{{__('master.master')}}</marquee></h6>
            </nav>
            <!-- End of Topbar -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/home') }}"><img src="/assets/images/tragon.png" width="60"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-uppercase" href="{{ url('/home') }}">{{__('master.home')}}</a>
                        <!-- <a class="nav-link text-uppercase" href="{{ url('/home') }}"><i class="fa fa-home"></i></a> -->
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-uppercase" href="{{ url('/product') }}">{{__('master.product')}}</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-uppercase" href="{{url('/contact')}}">{{__('master.contact_us')}}</a>
                    </li>
                    <!-- <li class="nav-item active">
                        <a class="nav-link text-uppercase" href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i></a>
                    </li> -->
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/lang/en')}}">{{__('master.english')}}</a>       
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/lang/kh')}}">{{__('master.khmer')}}</a>
                    </li>
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="text-uppercase" style="color:red">Login</span></a>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>  -->
                    <li class="nav-item active">
                        <a class="nav-link text-uppercase" href="" style="color:red">Register</a>
                    </li>
                </ul>
                <ul>
                    <div class="dropdown">
                        <button type="button" class="btn btn-warning" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </button>
                        <div class="dropdown-menu">
                            <div class="row total-header-section">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                </div> 
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                    <p>Total: <span class="text-info">${{ $total }}</span></p>
                                </div>     
                            </div>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{ $details['image'] }}" />
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p>{{ $details['name'] }}</p>
                                            <span class="price text-warning"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                    <a href="{{ route('cart') }}" class="btn btn-warning btn-block text-center">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>

        <br/>
        <div class="container">
        
            @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div> 
            @endif
        
            @yield('content')
        </div>
        
        @yield('scripts')



        <!-- Footer -->
        <footer class="text-center text-lg-start bg-info text-white mt-5">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3 p-4">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>{{__('master.company_name')}}
                        </h6>
                        <p class="text-uppercase">{{__('master.putra_shop')}}</p> 
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">{{__('master.product')}}</h6>
                        <p><a href="#!" class="text-reset">{{__('master.bag')}}</a></p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">{{__('master.links')}}</h6>
                        <p><a href="{{ url('/home') }}" class="text-reset">{{__('master.home')}}</a></p>
                        <p><a href="{{ url('/product') }}" class="text-reset">{{__('master.product')}}</a></p>
                        <p><a href="{{ url('/contact') }}" class="text-reset">{{__('master.contact_us')}}</a></p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">{{__('master.contact_us')}}</h6>
                        <p><i class="fas fa-home me-2"></i>{{__('master.master1')}}</p>
                        <p><i class="fa fa-envelope me-3"></i>putra@gmail.com</p>
                        <p><i class="fa fa-phone me-2"></i>(+885)96 000 6666</p>
                        <!-- <p><i class="fa fa-phone me-2"></i>(+885)31 000 6666</p> -->
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f me-3" style="font-size:36px;color:white;"></i></a>
                        <a href="https://www.youtube.com/watch?v=PfkDPWZSv08"><i class="fab fa-youtube me-3" style="font-size:36px;color:white;"></i></a>
                        <a href="https://t.me/NopPutra"><i class="fab fa-telegram" style="font-size:36px;color:white;"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">© 2021 Copyright:
                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div> 
        </footer>
        
    <!-- </div> -->

    <style>
        .nav-link:hover{
            background-color:gray;
            color:white !important;
        }
        .dropdown{
            float:right;
            padding-right: 30px;
        }    
        .dropdown .dropdown-menu {
            padding: 20px;
            top: 60px !important;
            width: 350px !important;
            left: -230px !important;
            box-shadow: 0px 5px 30px black;
        }
        .total-header-section{
            border-bottom:1px solid #d2d2d2;
        }  
        .checkout{
            border-top:1px solid #d2d2d2;
            padding-top: 15px;
        }
        .checkout .btn-warning {
            color: white;
            border-radius: 30px;
            height: 35px;
            background: #FF9800;
            font-size: 16px;
            padding: 3px 0 0;
        }
 
    </style>

</body>
</html>