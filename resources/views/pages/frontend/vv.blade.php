@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')


    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('assets/images/about/'.$vv->image)}});">
        <div class="auto-container">
            <h1>{{trans('dashboard.Vision&Values')}}</h1>
        </div>

        <!--page-info-->
        <div class="page-info">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>
                            <li class="active">{{trans('dashboard.Vision&Values')}}</li>
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

    <!--industry-->
    <section class="industry-section">
        <div class="auto-container">
            <div class="row clearfix">
{{--                <div class="column left-column col-md-6 col-sm-12 col-xs-12">--}}
{{--                    <!--video-box-->--}}
{{--                    <div class="video-box">--}}
{{--                        <figure class="image">--}}
{{--                            <img src="images/resource/video-image-1.jpg" alt="" />--}}
{{--                        </figure>--}}
{{--                        <a href="https://www.youtube.com/watch?v=0e1uTwSRGgI" class="lightbox-image overlay-box">--}}
{{--                            <span class="flaticon-arrows-2"></span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="column col-md-12 col-sm-12 col-xs-12">
                    <!--content-column-->
                    <div class="content-column">
                        <div class="sec-title-one">
                            <h2>{{trans('dashboard.Vision&Values')}}</h2>
                        </div>
                        <div class="text">{!! $vv->vv !!}</div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
