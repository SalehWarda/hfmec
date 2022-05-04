@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')

    <section class="page-title">
        <div class="auto-container">
            <h1>{{$detail->name}}</h1>
        </div>

        <!--page-info-->
        <div class="page-info">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>
                            <li class="active">{{$detail->name}}</li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>

    </section>

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">

                <!--Content Side-->
                <div class="content-side order-2 col-md-12 col-lg-12 col-xs-12">
                    <div class="blog-single">
                        <!-- News Block -->
                        <div class="news-block-three">
                            <div class="inner-box">

                                <div class="lower-content">
                                    <h2><strong>{{$detail->job}}</strong></h2>

                                    <div class="text-box">
                                        <img src="{{asset('assets/images/team/'.$detail->image)}}" width="210"height="300" alt="{{$detail->name}}" style="float: right; margin: 0px 0px 10px 10px;" data-pagespeed-url-hash="1927301231"
                                             onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>
                                        <p>{!! $detail->description !!}</p>
                                        <br> <br>
{{--                                        <p> More detailed CV available <a href="assets/team/cv-ENGLISH-35.pdf"--}}
{{--                                                                          target="_blank">here</a></p>--}}
                                        <a href="{{route('team')}}" class="theme-btn btn-style-one">{{trans('dashboard.GoBack')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
