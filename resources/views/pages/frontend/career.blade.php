@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')


    <!--Page Title-->
    <section class="page-title" >
        <div class="auto-container">
            <h1>{{trans('dashboard.Jobs')}}</h1>
        </div>

        <!--page-info-->
        <div class="page-info">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>
                            <li class="active">{{trans('dashboard.Jobs')}}</li>
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
                <div class="content-side order-2 col-md-7 col-lg-7 col-xs-12">
                    <div class="blog-single">
                        <!-- News Block -->
                        <div class="news-block-three">
                            <div class="inner-box">

                                <div class="text-box">
                                    @if($jobs)
                                    <h1 >{{trans('dashboard.JobAvaliableRightNow')}}</h1>

                                    @else
                                        <h1>{{trans('dashboard.NoJobAvaliableRightNow')}}</h1>
                                    @endif


                                            <br>
                                    <!--Accordions Column-->
                                    <div class="column col-md-12 col-sm-12 col-xs-12">
                                        <div class="inner-box">
                                            <ul class="accordion-box">



                                                @foreach($jobs as $job)
                                                    <!--Block-->
                                                    <li class="accordion block wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                                        <div class="acc-btn {{$loop->index == 0 ? 'active' : ''}}"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div>{{$job->title}}</div>
                                                        <div class="acc-content {{$loop->index == 0 ? 'current' : ''}}">
                                                            <div class="content clearfix">
                                                                <p>{{$job->content}}</p>
                                                            </div>
                                                        </div>
                                                    </li>


                                                @endforeach

                                            </ul><!--End Accordion Box-->
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="default-form contact-form col-md-5">

                    <form method="post" action="{{route('admin.careers.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                <input type="text" name="full_name" value="" required placeholder="{{trans('dashboard.Name')}} *">
                                @error('full_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                <input type="email" name="email" value=""required placeholder="{{trans('dashboard.Email')}} *">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <textarea name="message" required placeholder="{{trans('dashboard.Message')}} *"></textarea>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label><strong>{{trans('dashboard.FormoredetailsuploadyourCV')}}</strong></label>
                                <input name="attachment" required type="file" class="name" >
                                @error('attachment')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-md-12 col-sm-12 col-xs-12"><button type="submit" class="theme-btn btn-style-three">{{trans('dashboard.SendMessage')}}</button></div>
                        </div>
                    </form>

                </div>


            </div>
            <!--Content Side-->


        </div>
    </div>
    </div>



@endsection
