@extends("layouts.master")
@section('content')

    <br>
    <h1 class="h3 mb-4 text-gray-800 text-center font-italic">{{__('contact.contact_us')}}</h1>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <div class="text-center mb-3">
                <i class="fa fa-phone" style="font-size:48px;color:blue;"></i>
            </div>
            <h5 class="text-center font-italic text-uppercase">{{__('contact.by_phone')}}</h5>
            <p class="text-center font-italic">
                ({{__('contact.contact1')}})
                <br> ({{__('contact.call_us')}}):
                <br> <strong>(+885)96 000 6666</strong>
            </p>
        </div>
        <div class="col-sm-4">
            <div class="text-center mb-3">
                <i class="fas fa-handshake" style="font-size:48px;color:blue;"></i>
            </div>
            <h5 class="text-center mb-4 font-italic text-uppercase">{{__('contact.contact2')}}</h5>
            <p>{{__('contact.contact3')}}</p>
            
            <div class="text-center">
                <a href="https://t.me/NopPutra" class="btn btn-light btn-lg btn-block text-uppercase">{{__('contact.start_here')}}</a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="text-center mb-3">
                <i class="fab fa-telegram" style="font-size:48px;color:blue;"></i>
            </div>
            <h5 class="text-center font-italic text-uppercase">{{__('contact.contact4')}}</h5>
            <p class="text-center font-italic">
                {{__('contact.contact5')}}
            </p>
            <br>
            <div class="text-center">
                <a href="https://t.me/NopPutra" class="btn btn-light btn-lg btn-block text-uppercase">{{__('contact.start_chat')}}</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row mb-4" style="background-color:gray; color:white;">
        <h1 class="h3 mt-4 mb-4 text-gray-800 text-center font-italic">{{__('contact.contact6')}}</h1>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 mb-4">
            <a href="https://www.youtube.com/watch?v=PfkDPWZSv08" class="btn btn-light btn-lg btn-block text-uppercase">{{__('contact.contact7')}}</a>
        </div>
        <div class="col-sm-4"></div>
    </div>
  
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 text-center font-italic">{{__('contact.contact8')}}</h1>
        <div class="col-sm-6">
            <div class="text-right">
                <i class="fa fa-map-marker" aria-hidden="true" style="font-size:72px;color:blue;"></i>
            </div>
        </div>
        <div class="col-sm-6">
            <h5 class="font-italic">{{__('contact.contact9')}}</h5>
            <h6 class="font-italic">{{__('contact.contact10')}} <br> {{__('contact.contact11')}}</h6>
        </div>
    </div>
    

@endsection