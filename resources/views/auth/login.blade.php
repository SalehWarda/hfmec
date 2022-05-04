@extends('layouts.login')

@section('title')

    Login

@endsection


@section('content')



    <section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url({{asset('assets/backend/images/login-bg1.jpg')}});" >
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
{{--                <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url({{asset('assets/backend/images/login-bg1.jpg')}});">--}}
{{--                    <div class="login-fancy">--}}
{{--                        <ul class="list-unstyled  pos-bot pb-30">--}}
{{--                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>--}}
{{--                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">

                        @include('partials.flash')

                        <form action="{{route('login')}}" method="post">

                            @csrf

                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">{{trans('dashboard.Email')}}* </label>
                                <input id="name" class="web form-control" type="email" placeholder="{{trans('dashboard.Email')}}" name="email">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">{{trans('dashboard.Password')}}* </label>
                                <input id="Password" class="Password form-control" type="password" placeholder="{{trans('dashboard.Password')}}" name="password">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control" name="two" id="two" />
                                    <label for="two">{{trans('dashboard.Rememberme')}}</label>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-success">
                                <span>{{trans('dashboard.Login')}}</span>
                                <i class="fa fa-check"></i>
                            </button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
