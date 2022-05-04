@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')


    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <h1>{{trans('dashboard.CompanyNews')}}</h1>
        </div>

        <!--page-info-->
        <div class="page-info">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>
                            <li class="active">{{trans('dashboard.CompanyNews')}}</li>
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

    <!--Default Section-->
    <section class="default-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Text Column-->


                <!--Accordions Column-->
                <div class="column col-md-12 col-sm-12 col-xs-12">
                    <div class="inner-box">

                        <div class="sec-title-one">
                            <h2>{{trans('dashboard.CompanyNews')}}</h2>
                        </div>

                        <!--Accordion Box-->
                        <ul class="accordion-box">

                            @foreach($news as $new)

                                <!--Block-->
                                <li class="accordion block wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="acc-btn {{$loop->index == 0 ? 'active' : ''}} "><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div><strong>{{$new->title}} - {{$new->created_at->format('M-d-Y')}}</strong></div>
                                    <div class="acc-content {{$loop->index == 0 ? 'current' : ''}}">
                                        <div class="content clearfix">
                                            <figure class="image"><img src="{{asset('assets/images/news/'.$new->image)}}" width="270" height="250" alt=""></figure>
                                            <p>{!! $new->content !!}</p>
                                        </div>
                                    </div>
                                </li>

                            @endforeach


                        </ul><!--End Accordion Box-->
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
