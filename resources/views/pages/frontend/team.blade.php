@extends('layouts.app')

@section('title')

    {{trans('dashboard.HFMEC')}}

@endsection

@section('content')


    <section class="page-title" >
        <div class="auto-container">
            <h1>{{trans('dashboard.OfficeTeam')}}</h1>
        </div>

        <!--page-info-->
        <div class="page-info">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{route('index')}}">{{trans('dashboard.Home')}}</a></li>
                            <li class="active">{{trans('dashboard.OfficeTeam')}}</li>
                        </ul>
                    </div>


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


                            @foreach($teams as $team)

                                <div class="shop-item col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img src="{{asset('assets/images/team/'.$team->image)}}" alt=""></figure>
                                        </div>
                                        <!--overlay-box-->
                                        <div class="overlay-box">


                                            <div class="cart-btn"><a class="clearfix" href="{{route('teamDetails',$team->slug)}}">{{trans('dashboard.MoreDetails')}}</a></div>

                                        </div>
                                    </div>

                                    <!--lower-content-->
                                    <div class="lower-content">
                                        <h3><a href="{{route('teamDetails',$team->slug)}}">{{$team->name}}</a></h3>
                                        <!--price-->
                                        <ul class="price">
                                            <li><span></span> {{$team->job}}</li>
                                        </ul>
                                    </div>

                                </div>

                            @endforeach





                        </div>


                        <!-- Styled Pagination -->
                        <div class="styled-pagination text-left padd-top-30">
                            {{$teams->links()}}
                        </div>

                    </section>

                </div>
                <!--Content Side-->



            </div>
        </div>
    </div>
@endsection
