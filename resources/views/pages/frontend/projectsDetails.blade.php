@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')


    <!--Page Title-->
    <section class="page-title" >
        <div class="auto-container">
            <h1>{{trans('dashboard.ProjectDetails')}}</h1>
        </div>

        <!--page-info-->
        <div class="page-info">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>
                            <li class="active">{{trans('dashboard.ProjectDetails')}}</li>
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
    <!--Sidebar Page-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <section class="content-section project-details">

                        <!--project-images-->
                        <div class="project-images">
                            <div class="carousel-outer">

                                <ul class="image-carousel">

                                    @foreach($projects->media as $media)
                                    <li><a href="{{asset('assets/images/projects/'.$media->file_name)}}" class="lightbox-image" title="Image Caption Here"><img src="{{asset('assets/images/projects/'.$media->file_name)}}" width="570" height="428" alt=""></a></li>
                                    @endforeach
                                </ul>

                                <ul class="thumbs-carousel">


                                </ul>

                            </div>
                        </div>

                        <div class="sec-title-eight"><h2>{{trans('dashboard.Description')}}</h2></div>

                        <div class="text-block">
                            <p>{!! $projects->description !!}</p>
                        </div>

                        <div class="row clearfix">


                        </div>


                    </section>

                </div>
                <!--Content Side-->

                <!--Sidebar-->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">

                        <!--projext-info-->
                        <div class="sidebar-widget projext-info wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sec-title-seven"><h2>{{$projects->name}}</h2></div>
                            <ul>
                                <li><strong>Status :  </strong> <span class="text-primary">{{$projects->status()}}</span></li>
                                <li><strong>Client :  </strong> <span class="text-primary">{{$projects->client}}</span></li>
                                <li><strong>Commencement Date :  </strong> <span class="text-primary">{{$projects->commencement_date}}</span></li>
                                <li><strong>Location :  </strong> <span class="text-primary">{{$projects->location}}</span></li>
                                <li><strong>Service :  </strong> <span class="text-primary">{{$projects->service->name}}</span></li>
                            </ul>

                        </div>

                        <!--Call TO Action-->
                        <div class="call-to-action-four wow zoomInStable" data-wow-delay="0ms" data-wow-duration="1500ms" style="background-image:url(images/resource/quote-widget.jpg);">
                            <div class="title">Any Questions related Solution? Call us</div>

                            <div class="number"><span class="flaticon-phone-receiver"></span> +001-345-6789-00</div>
                            <a class="theme-btn btn-style-one" href="#">GET QUOTES</a>
                        </div>

                    </aside>


                </div>
                <!--Sidebar-->


            </div>
        </div>
    </div>

@endsection
