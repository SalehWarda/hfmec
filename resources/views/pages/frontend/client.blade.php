@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')


    <!--Page Title-->
    <section class="page-title" >
        <div class="auto-container">
            <h1>{{trans('dashboard.ClientList')}}</h1>
        </div>

        <!--page-info-->
        <div class="page-info">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>
                            <li class="active">{{trans('dashboard.ClientList')}}</li>
                        </ul>
                    </div>

                    {{--                    <div class="col-md-6 col-sm-6 col-xs-12">--}}
                    {{--                        <ul class="social-nav clearfix">--}}
                    {{--                            <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>--}}
                    {{--                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>--}}
                    {{--                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>--}}
                    {{--                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>--}}
                    {{--                            <li><a href="#"><span class="fa fa-flickr"></span></a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}

                </div>
            </div>
        </div>

    </section>

    <!--Sidebar blog Page-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-12 col-md-8 col-sm-12 col-xs-12 pull-right">
                    <section class="shop-items">
                        <div class="row clearfix">


                            @foreach($clients as $client)

                                <div class="shop-item col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            @if($client->client_image)
                                            <figure class="image"><img src="{{asset('assets/images/client/'.$client->client_image)}}" width="270" height="250" alt=""></figure>
                                            @else
                                                <figure class="image"> <img src="{{asset('assets/images/projects/noImage.jpg')}}" alt="{{$client->client}}"></figure>
                                            @endif
                                        </div>
                                        <!--overlay-box-->
                                        <div class="overlay-box">


                                            <div class="cart-btn"><a class="clearfix" >{{$client->client}}</a></div>

                                        </div>
                                    </div>

                                </div>

                            @endforeach





                        </div>


                        <!-- Styled Pagination -->
                        <div class="styled-pagination text-left padd-top-30">
                            {{$clients->links()}}
                        </div>

                    </section>

                </div>
                <!--Content Side-->



            </div>
        </div>
    </div>

@endsection
