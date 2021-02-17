
<!-- Header -->
<header id="header">
    <nav class="navbar navbar-expand-lg fixed-top" id="header_nav">
        <div class="container-fluid">
            <div class="row header_row">

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="navbar-header">
                        <div class="logo"> <a href="{{route('web.home')}}"><img src="{{asset('web/assets\images\logo.png')}}" alt="image"></a> </div>
                    </div>
                    <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggler" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li><a href="{{route('web.home')}}">Home</a></li>
                            <li><a href="{{route('web.home')}}">How it work</a></li>
                            <li><a href="{{route('web.home')}}">Blog</a></li>

                            {{--<li class="menu-item-has-children"><a href="#">Listing</a> <span class="arrow"></span>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children"><a href="#">Grid Layout</a> <span class="arrow"></span>
                                        <ul class="sub-menu">
                                            <li><a href="listing-grid.html">Listing Gird</a></li>
                                            <li><a href="listing-grid-sidebar.html">Listing Gird Sidebar</a></li>
                                            <li><a href="listing-grid-map.html">Listing Gird Half Map</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">List Layout</a> <span class="arrow"></span>
                                        <ul class="sub-menu">
                                            <li><a href="listing-listview.html">Listing List</a></li>
                                            <li><a href="listing-listview-sidebar.html">Listing List Sidebar</a></li>
                                            <li><a href="listing-listview-map.html">Listing List Half Map</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Single Listing</a> <span class="arrow"></span>
                                        <ul class="sub-menu">
                                            <li><a href="listing-detail-1.html">Style 1</a></li>
                                            <li><a href="listing-detail-2.html">Style 2</a></li>
                                            <li><a href="listing-detail-3.html">Style 3</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="event-detail.html">Event Detail</a></li>
                                </ul>
                            </li>--}}

                            <li class="menu-item-has-children"><a href="#">Professionals</a> <span class="arrow"></span>
                                <ul class="sub-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="how-it-work.html">How it Work</a></li>
                                    <li><a href="{{route('web.pricing')}}">Pricing</a></li>
                                    <li><a href="404-error.html">404 Error</a></li>
                                    <li><a href="user_listing_list.html">User Listing Page</a></li>
                                </ul>
                            </li>

                            <li><a href="contact-us.html">Contact Us</a></li>

                            <li><a href="{{route('login')}}">Log In</a></li>
                            <li><a href="{{route('register')}}">Sign In</a></li>
                        </ul>
                        <div class="submit_listing">
                            <a href="{{route('web.pricing')}}" class="btn outline-btn"><i class="fa fa-plus-circle"></i> Submit Listing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- /Header -->
