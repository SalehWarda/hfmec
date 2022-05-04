@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')


    <!--Page Title-->
    <section class="page-title" >
        <div class="auto-container">
            <h1>{{trans('dashboard.ContactUs')}}</h1>
        </div>

        <!--page-info-->
        <div class="page-info">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>
                            <li class="active">{{trans('dashboard.ContactUs')}}</li>
                        </ul>
                    </div>



                </div>
            </div>
        </div>

    </section>

    <!--contact-info-->
    <section class="contact-info-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="column col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box wow zoomInStable" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <!--icon-box-->
                        <div class="icon-box">
                            <span class="flaticon-home-1"></span>
                        </div>

                        <h3>Visit Us</h3>
                        <div class="text"><a style="color: black">{{$settings->address}}</a></div>
                    </div>
                </div>

                <div class="column col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box wow zoomInStable" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <!--icon-box-->
                        <div class="icon-box">
                            <span class="flaticon-mail-3"></span>
                        </div>

                        <h3>Mail Us</h3>
                        <div class="text"><a style="color: black" href=" mailto: {{$settings->email}}">{{$settings->email}}</a></div>
                    </div>
                </div>

                <div class="column col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box wow zoomInStable" data-wow-delay="1000ms" data-wow-duration="1500ms">
                        <!--icon-box-->
                        <div class="icon-box">
                            <span class="flaticon-technology"></span>
                        </div>

                        <h3>{{trans('dashboard.Call_Us')}}</h3>

                        <div class="text" ><a style="color: black" href=" tel: {{$settings->mobile}}">{{$settings->mobile}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--contact-section-->
    <section class="contact-form-section">
        <div class="auto-container">
            <div class="sec-title-eight padd-bott-10">
                <h2>{{trans('dashboard.KeepinTouchwithus')}}</h2>
            </div>

            <!-- Contact Form -->
            <div class="default-form contact-form">

                <form method="post" action="{{route('contact')}}" >
                    @csrf
                    <div class="row clearfix">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="full_name" value="" placeholder="{{trans('dashboard.Name')}} *">
                            @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" value="" placeholder="{{trans('dashboard.Email')}} *">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input type="text" name="mobile" value="" placeholder="{{trans('dashboard.Mobile')}} *">
                            @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input type="text" name="subject" value="" placeholder="{{trans('dashboard.Subject')}} *">
                            @error('subject')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea name="message" placeholder="{{trans('dashboard.Message')}} *"></textarea>
                            @error('message')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><button type="submit" class="theme-btn btn-style-three">{{trans('dashboard.SendMessage')}}</button></div>
                    </div>
                </form>

            </div>
            <!--End Contact Form -->


            <div class="row clearfix">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d895.0711424289697!2d50.1870823!3d26.1874197!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49c355e833df4b%3A0x263ab8613b16381!2zRkFFQyDZhdmD2KrYqCDYp9mE2YXZh9mG2K_YsyDZgdmH2K8g2LnZhNmKINix2LbYpyDZhNmE2KfYs9iq2LTYp9ix2KfYqiDYp9mE2YfZhtiv2LPZitip!5e0!3m2!1sen!2ssa!4v1564234517032!5m2!1sen!2ssa" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1821.4033886422696!2d38.106217!3d24.073108!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3cc9a489130c15de!2sCoral%20Business%20Center!5e0!3m2!1sen!2ssa!4v1582641193064!5m2!1sen!2ssa" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>            </div>
            </div>
        </div>
    </section>



@endsection
