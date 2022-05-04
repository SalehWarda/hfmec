

<footer class="main-footer">

    <!--Footer Upper-->
    <div class="footer-upper">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Two 4th column-->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        <div class="col-lg-7 col-sm-6 col-xs-12 column">
                            <div class="footer-widget logo-widget">
                                <div class="logo"><a href="{{route('index')}}"><img src="{{asset('assets/frontend/images/logo.png')}}" width="400" height="150" class="img-responsive" alt=""></a></div>

                                <ul class="contact-info">
                                    <li><span class="icon flaticon-pin"></span> {{$settings->address}}</li>
                                    <li><span class="icon flaticon-technology"></span>{{$settings->mobile}}</li>
                                    <li><span class="icon flaticon-mail-2"></span> {{$settings->email}}</li>
                                </ul>

                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                            <div class="sec-title-three">
                                <h2>{{trans('dashboard.AboutUs')}}</h2>
                            </div>
                            <div class="footer-widget links-widget">
                                <ul>
                                    <li><a href="{{route('introduction')}}">{{trans('dashboard.Introduction')}}</a></li>
                                    <li><a href="{{route('vv')}}">{{trans('dashboard.Vision&Values')}}</a></li>
                                    <li><a href="{{route('es')}}">{{trans('dashboard.ExpertiseSummary')}}</a></li>
                                    <li><a href="{{route('team')}}">{{trans('dashboard.OfficeTeam')}}</a></li>
                                    <li><a href="{{route('ims')}}">{{trans('dashboard.IMSPolicy')}}</a></li>
                                    <li><a href="{{route('iso')}}">{{trans('dashboard.ISOCertificates')}}</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!--Two 4th column End-->

                <!--Two 4th column-->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        <!--Footer Column-->
                        <div class="col-lg-6 col-sm-6 col-xs-12 column">
                            <div class="sec-title-three">
                                <h2>{{trans('dashboard.Services')}}</h2>
                            </div>
                            <div class="footer-widget links-widget">
                                <ul>
                                    @foreach($services as $service)
                                        <li><a href="{{route('service',$service->slug)}}">{{$service->name}}</a></li>

                                    @endforeach

                                </ul>

                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="col-md-6 col-sm-6 col-xs-12 column">
                            <div class="footer-widget gallery-widget">
                                <div class="sec-title-three">
                                    <h2>{{trans('dashboard.CompanyNews')}}</h2>
                                </div>
                                <div class="widget-content">

                                    <div class="post">
                                        <div class="thumb"><a href="{{route('news')}}"><img src="{{asset('assets/images/news/'.$news->image)}}" width="100" height="100" alt="NEW WEBSITE FOR FAHD ALIREZA ENGINEERING CONSULTANTS (FAEC)" data-pagespeed-url-hash="323657726" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a></div>
                                        <h4><a href="{{route('news')}}">{{$news->title}}</a></h4>
                                        <span class="date">{{$news->created_at->format('M-d,Y')}}</span>
                                    </div>
                                    </div>
{{--                                <div class="clearfix">--}}
{{--                                    <figure class="image"><a href="{{asset('assets/frontend/images/resource/footer-gallery-1.jpg')}}" class="lightbox-image" title="Caption Here"><img src="images/resource/footer-gallery-1.jpg" alt=""></a></figure>--}}
{{--                                    <figure class="image"><a href="{{asset('assets/frontend/images/resource/footer-gallery-2.jpg')}}" class="lightbox-image" title="Caption Here"><img src="images/resource/footer-gallery-2.jpg" alt=""></a></figure>--}}
{{--                                    <figure class="image"><a href="{{asset('assets/frontend/images/resource/footer-gallery-3.jpg')}}" class="lightbox-image" title="Caption Here"><img src="images/resource/footer-gallery-3.jpg" alt=""></a></figure>--}}
{{--                                    <figure class="image"><a href="{{asset('assets/frontend/images/resource/footer-gallery-4.jpg')}}" class="lightbox-image" title="Caption Here"><img src="images/resource/footer-gallery-4.jpg" alt=""></a></figure>--}}
{{--                                    <figure class="image"><a href="{{asset('assets/frontend/images/resource/footer-gallery-5.jpg')}}" class="lightbox-image" title="Caption Here"><img src="images/resource/footer-gallery-5.jpg" alt=""></a></figure>--}}
{{--                                    <figure class="image"><a href="{{asset('assets/frontend/images/resource/footer-gallery-6.jpg')}}" class="lightbox-image" title="Caption Here"><img src="images/resource/footer-gallery-6.jpg" alt=""></a></figure>--}}
{{--                                </div>--}}
                            </div>
                        </div>

                    </div>
                </div><!--Two 4th column End-->

            </div>

        </div>
    </div>

    <!--Footer Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Copyright-->
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="copyright text-center">Copyrights &copy; {{date('Y')}} {{$settings->office_name}}. All Rights Reserved.</div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="copyright text-center">Designed By:<a href="https://sawsoft.site/" target="_blank"><strong>SawSoft</strong></a></div>
                </div>


            </div>
        </div>
    </div>

</footer>
