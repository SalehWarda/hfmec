



<header class="main-header header-style-one">
    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container clearfix">
            <!--Top Left-->
            <div class="top-left pull-left">
                <ul class="links-nav clearfix">
                    <li><span class="fa fa-check-square-o"></span> No.1 Supplier</li>
                    <li><span class="fa  fa-support"></span> Certified ISO 9001 : 2008</li>
                    <li><span class="fa fa-bell-o"></span> Leading Service Provider</li>
                </ul>
            </div>

            <!--Top Right-->
            <div class="top-right pull-right">
                <ul class="links-nav clearfix">
                    <li><span class="fa fa-star-o"></span> Award Wining Firm</li>
                    <li><span class="fa fa-globe"></span> English</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Header Top End -->

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container">
            <div class="clearfix">

                <div class="pull-left logo-outer">
                    <div class="logo"><a href="index.html"><img src="{{asset('assets/frontend/images/logoh.png')}}" alt="Brighton" title="Brighton"></a></div>
                </div>

                <div class="pull-right upper-right clearfix">

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <div class="icon-box"><span class="flaticon-location-pin"></span></div>
                        <ul>
                            <li><strong>Mon - Sat : 9.00 - 17.30</strong></li>
                            <li>Sunday : Closed</li>
                        </ul>
                    </div>

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <div class="icon-box"><span class="flaticon-technology"></span></div>
                        <ul>
                            <li><strong>+1 - 000 - 8990 - 1560</strong></li>
                            <li>support@domain.com</li>
                        </ul>
                    </div>

                    <!--Info Box-->
                    <div class="upper-column info-box">
                        <!--<div class="link-btn">
                            <a href="#" class="theme-btn btn-style-one">get a quote</a>
                        </div>-->

                        <div class="icon-box"><span class="flaticon-inbox"></span></div>
                        <ul>
                            <li><strong>Downloads</strong></li>
                            <li>PDF Brochures</li>
                        </ul>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!--Header-Lower-->
    <div class="header-lower">

        <div class="auto-container">
            <div class="nav-outer clearfix">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">

                            <li><a href="about-us.html">Home</a></li>

                            <li class=" dropdown"><a href="#">About Us</a>
                                <ul>
                                    <li><a href="index.html">Introduction</a></li>
                                    <li><a href="index-2.html">Vision & Values</a></li>
                                    <li><a href="index-3.html">Expertise Summary</a></li>
                                    <li><a href="index.html">Key Staff</a></li>
                                    <li><a href="index-2.html">IMS Policy</a></li>
                                    <li><a href="index-3.html">ISO Certificates</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Services</a>
                                <ul>
                                    @foreach($services as $service)
                                        <li><a href="services.html">{{$service->name}}</a></li>

                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Projects</a>
                                <ul>
                                    <li><a href="blog.html">Ongoing Projects</a></li>
                                    <li><a href="blog-grid.html">Completed Projects</a></li>
                                    <li><a href="blog-details.html">Project List (last 10 years)</a></li>
                                    <li><a href="blog-details.html">Clients list</a></li>
                                </ul>
                            </li>
                            <li ><a href="#">Company News</a> </li>
                            <li><a href="#">Career</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->
                <div class="btn-outer"><a href="contact.html" class="theme-btn quote-btn"><span class="fa fa-mail-reply-all"></span>Ask PROPOSAL</a></div>
            </div>

        </div>
    </div>

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="index.html" class="img-responsive"><img src="{{asset('assets/frontend/images/logoh-small.png')}}" alt="Brighton" title="Brighton"></a>
            </div>

            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">

                            <li><a href="about-us.html">Home</a></li>

                            <li class=" dropdown"><a href="#">About Us</a>
                                <ul>
                                    <li><a href="index.html">Introduction</a></li>
                                    <li><a href="index-2.html">Vision & Values</a></li>
                                    <li><a href="index-3.html">Expertise Summary</a></li>
                                    <li><a href="index.html">Key Staff</a></li>
                                    <li><a href="index-2.html">IMS Policy</a></li>
                                    <li><a href="index-3.html">ISO Certificates</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Services</a>
                                <ul>
                                    @foreach($services as $service)
                                        <li><a href="services.html">{{$service->name}}</a></li>

                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Projects</a>
                                <ul>
                                    <li><a href="blog.html">Ongoing Projects</a></li>
                                    <li><a href="blog-grid.html">Completed Projects</a></li>
                                    <li><a href="blog-details.html">Project List (last 10 years)</a></li>
                                    <li><a href="blog-details.html">Clients list</a></li>
                                </ul>
                            </li>
                            <li ><a href="#">Company News</a> </li>
                            <li><a href="#">Career</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>

                </nav><!-- Main Menu End-->
            </div>

        </div>
    </div><!--End Sticky Header-->

</header>
