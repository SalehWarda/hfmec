@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')

    <!--Main Slider-->
    <section class="main-slider">

        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>

                    @foreach($covers as $cover)
                        <li data-transition="fade" data-slotamount="1" data-masterspeed="1000"
                            data-thumb="images/main-slider/1.jpg" data-saveperformance="off"
                            data-title="Awesome Title Here">
                            <img src="{{asset('assets/images/cover/'.$cover->image)}}" alt=""
                                 data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                            <!--Overlay-->
                            <div class="overlay-style-one"></div>

                            <div class="tp-caption sfl sfb tp-resizeme"
                                 data-x="left" data-hoffset="15"
                                 data-y="center" data-voffset="-110"
                                 data-speed="1500"
                                 data-start="0"
                                 data-easing="easeOutExpo"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.3"
                                 data-endspeed="1200"
                                 data-endeasing="Power4.easeIn">
                                <div class="border-title">{{$cover->title}}</div>
                            </div>
                            <br>

                            <div class="tp-caption sfl sfb tp-resizeme"
                                 data-x="left" data-hoffset="15"
                                 data-y="center" data-voffset="10"
                                 data-speed="1500"
                                 data-start="500"
                                 data-easing="easeOutExpo"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.3"
                                 data-endspeed="1200"
                                 data-endeasing="Power4.easeIn"><h2>{!! $cover->description !!}<br></h2><br></div>

                            <div class="tp-caption sfr sfb tp-resizeme"
                                 data-x="left" data-hoffset="15"
                                 data-y="center" data-voffset="125"
                                 data-speed="1500"
                                 data-start="1000"
                                 data-easing="easeOutExpo"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.3"
                                 data-endspeed="1200"
                                 data-endeasing="Power4.easeIn"> &ensp;&ensp; <a href="{{route('getContact')}}" class="theme-btn btn-style-one">{{trans('dashboard.ContactUs')}}</a>
                            </div>


                        </li>

                    @endforeach




                </ul>

                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </section>

    <!--service-style-one-->
    <section class="service-style-one">
        <div class="auto-container">
            <div class="row clearfix">

                <!--left-column-->
                <div class="column left-column col-md-4 col-sm-12">
                    <!--box-column-->
                    <div class="box-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <h2>{{trans('dashboard.Vision&Values')}}</h2>
                        <div class="text">{!! \Illuminate\Support\Str::limit($vv->vv,122,'...') !!}
                        </div>

                        <a class="more" href="{{route('vv')}}">{{trans('dashboard.MoreDetails')}}<span
                                class="fa fa-long-arrow-right"></span></a>
                    </div>
                </div>

                <div class="col-md-8 col-sm-12">

                    <div class="row clearfix">


                        @foreach(\App\Models\Backend\Service::latest()->take(4)->get() as $service)
                        <!--service-block-->
                        <div class="service-block col-md-6 col-sm-6 col-sm-12">
                            <div class="inner-box">
                                <!--icon-box-->
                                <div class="icon-box">
                                    <span class="flaticon-atom"></span>
                                </div>
                                <h3>{{$service->name}}</h3>
                                <div class="text">{!! \Illuminate\Support\Str::limit($service->description,120,'...') !!}
                                </div>
                                <a class="more" style="color: #103d68;" href="{{route('admin.services',$service->slug)}}">{{trans('dashboard.MoreDetails')}} <span
                                        class="fa fa-arrow-circle-o-right"> </span> </a>

                            </div>
                        </div>
                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--services-column-two-->
    <section class="services-column-two">
        <div class="auto-container">

            <!--Section Title-->
            <div class="sec-title-one">
                <h2>{{trans('dashboard.OurFeaturedServices')}}</h2>
                <div class="text"><strong>{{trans('dashboard.WHATWEDO')}}</strong></div>
            </div>
            <div class="row">

                @foreach($services as $service)
                    <!--Service block two-->
                    <div class="service-block-two col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image-box">
                                <figure class="image"><a href="{{route('service',$service->slug)}}"><img
                                            src="{{asset('assets/images/services/'.$service->image)}}" width="370"
                                            height="250" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <div class="outer-link">
                                    <a href="{{route('service',$service->slug)}}" class="theme-btn service-title"><span
                                            class="flaticon-transport"></span> {{$service->name}}</a>
                                </div>
                                <div
                                    class="text-center">{!! \Illuminate\Support\Str::limit($service->description,45,'...') !!}</div>
                                <div class="link-box"><a href="{{route('service',$service->slug)}}"
                                                         class="theme-btn normal-link"> {{trans('dashboard.VIEWMORE')}}
                                        <span class="fa fa-long-arrow-right"></span></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>


        </div>
    </section>

    <!--Gallery Section-->
    <section class="gallery-section">
        <div class="auto-container">
            <div class="sec-title-one">
                <h2>{{trans('dashboard.ProjectsGallery')}}</h2>
            </div><br>
            <!--Carousel Outer-->
            <div class="carousel-outer">
                <div class="gallery-carousel">

                    @foreach($projects as $project)
                        <!--Gallery Item-->
                        <div class="gallery-item">
                            <div class="inner-box">

                                @if($project->firstMedia)
                                    <img class="image-box"
                                         src="{{asset('assets/images/projects/'.$project->firstMedia->file_name)}}"
                                         width="390" height="345" alt="{{$project->name}}">
                                @else
                                    <img class="image-box" src="{{asset('assets/images/projects/noImage.jpg')}}"
                                         width="390" height="345" alt="{{$project->name}}">
                                @endif

                                <div class="overlay-box">
                                    <div class="inner">
                                        <div class="content">
                                            <h3><a href="{{route('projects',$project->slug)}}">{{$project->name}}</a>
                                            </h3>
                                            <div
                                                class="text">{!! \Illuminate\Support\Str::limit($project->description,50,'...') !!}</div>
                                            <a href="{{route('projects',$project->slug)}}"
                                               class="view-more"> {{trans('dashboard.VIEWMORE')}} <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div><!--End Carousel Outer-->
        </div>
    </section>

    <!--Default Section-->
    <section class="default-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Text Column-->
                <div class="column text-column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-box">

                        <div class="sec-title-one">
                            <h2>{{trans('dashboard.AboutUs')}}</h2>
                        </div>

                        <div class="text">T {!! \Illuminate\Support\Str::limit($introduction->description,200,'...')  !!}</div>

                        <!--featured-gallery-->
                        <div class="featured-gallery">
                            <div class="row clearfix">


                                @foreach(\App\Models\Backend\Project::latest()->take(4)->get() as $project )
                                    <!--featured-image-box-->
                                    <div class="featured-image-box col-md-6 col-sm-6 col-xs-12">
                                        @if($project->firstMedia )
                                            <figure class="image">
                                                <a class="lightbox-image"
                                                   href="{{asset('assets/images/projects/'.$project->firstMedia->file_name)}}"><img
                                                        src="{{asset('assets/images/projects/'.$project->firstMedia->file_name)}}" width="275" height="163" alt=""/></a>
                                            </figure>
                                        @else
                                            <img class="image-box" src="{{asset('assets/images/projects/noImage.jpg')}}"
                                                 width="275" height="163" alt="{{$project->name}}">
                                        @endif

                                    </div>

                                @endforeach



                            </div>
                        </div>

                    </div>
                </div>

                <!--Accordions Column-->
                <div class="column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-box">

                        <div class="sec-title-one">
                            <h2>{{trans('dashboard.Ourlatestwork')}}</h2>
                        </div>

                        <!--Accordion Box-->
                        <ul class="accordion-box">

                            @foreach(\App\Models\Backend\Project::latest()->take(5)->get() as $project )

                                <!--Block-->
                                <li class="accordion block wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="acc-btn {{$loop->index == 0 ? 'active' : ''}}">
                                        <div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span
                                                class="icon icon-minus fa fa-minus"></span></div>
                                       {{$project->name}}
                                    </div>
                                    <div class="acc-content  {{$loop->index == 0 ? 'current' : ''}}">
                                        <div class="content clearfix">
                                            @if($project->firstMedia )
                                            <figure class="image">
                                                <img src="{{asset('assets/images/projects/'.$project->firstMedia->file_name)}}"
                                                    width="120" height="120" alt=""></figure>
                                            @else
                                                <img class="image-box" src="{{asset('assets/images/projects/noImage.jpg')}}"
                                                     width="275" height="163" alt="{{$project->name}}">
                                            @endif
                                            <ul>
                                                <li><strong>Status :  </strong> <span class="text-primary">{{$project->status()}}</span></li>
                                                <li><strong>Client :  </strong> <span class="text-primary">{{$project->client}}</span></li>
                                                <li><strong>Commencement Date :  </strong> <span class="text-primary">{{$project->commencement_date}}</span></li>
                                                <li><strong>Location :  </strong> <span class="text-primary">{{$project->location}}</span></li>
                                                <li><strong>Service :  </strong> <span class="text-primary">{{$project->service->name}}</span></li>
                                            </ul>
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



    <section class="gallery-section">
        <div class="auto-container">
            <div class="sec-title-one">
                <h2>{{trans('dashboard.OurClients')}}</h2>
            </div><br>
            <!--Carousel Outer-->
            <div class="carousel-outer">


                <div class="sponsors-carousel">

                    @foreach($projects as $project)
                        <!--Gallery Item-->
                        <div class="gallery-item">
                            <div class="inner-box">

                                @if($project->client_image)
                                    <img class="image-box"
                                         src="{{asset('assets/images/client/'.$project->client_image)}}"
                                         width="100" height="200" alt="{{$project->client}}">
                                @else
                                    <img class="image-box" src="{{asset('assets/images/projects/noImage.jpg')}}"
                                         width="100" height="200" alt="{{$project->client}}">
                                @endif

                                <div class="overlay-box">
                                    <div class="inner">
                                        <div class="content">
                                            <h5><a >{{$project->client}}</a>
                                            </h5>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div><!--End Carousel Outer-->
        </div>
    </section>




@endsection
