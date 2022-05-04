@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')

    <!--Sidebar blog Page-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->

                <h3><strong>{{trans('dashboard.ISOCertificates')}}</strong></h3><br><br>
                <div class="content-side col-lg-12 col-md-8 col-sm-12 col-xs-12">
                    <section class="news-outer">

                        <div class="news-style-two">
                            <div class="inner-box">

                                @foreach($iso->media as $media)
                                    <figure class="image">
                                        <img src="{{asset('assets/images/about/'.$media->file_name)}}"/><br>
                                    </figure>
                                @endforeach


                                <!--lower-content-->
                                <div class="lower-content">

                                    <p>{{$iso->iso}}</p>


                                </div>

                            </div>
                        </div>


                    </section>

                </div>
                <!--Content Side-->


            </div>
        </div>
    </div>
@endsection
