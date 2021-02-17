﻿<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>{{env('app_name')}}</title>
<!--Bootstrap -->
{{--<link rel="stylesheet" href="assets\css\bootstrap.min.css" type="text/css">--}}
<link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="{{asset('web/assets\css\owl.carousel.css')}}" type="text/css">
<!--FontAwesome Font Style -->
<link href="{{asset('web/assets\css\font-awesome.min.css')}}" rel="stylesheet">
   <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="{{asset('web/assets\switcher\css\switcher.css')}}" media="all">
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\blue.css')}}" title="blue" media="all" data-default-color="true">
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\pink.css')}}" title="pink" media="all">
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\orange.css')}}" title="orange" media="all">
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\green.css')}}" title="green" media="all">
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\red.css')}}" title="red" media="all">
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\purple.css')}}" title="purple" media="all">

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('web/assets\images\favicon-icon\apple-touch-icon-144-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('web/assets\images\favicon-icon\apple-touch-icon-72-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{asset('web/assets\images\favicon-icon\apple-touch-icon-57-precomposed.png')}}">
<link rel="shortcut icon" href="{{asset('web/assets\images\favicon-icon\favicon.png')}}">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

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
              <li class="menu-item-has-children"><a href="#">Home</a> <span class="arrow"></span>
              	<ul class="sub-menu">
                	<li><a href="index.html">Home 1</a></li>
                    <li><a href="index-2.html">Home 2</a></li>
                    <li><a href="index-3.html">Home 3</a></li>
					<li><a href="index-4.html">Home 4</a></li>
                 </ul>
              </li>
              <li class="menu-item-has-children"><a href="#">Listing</a> <span class="arrow"></span>
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
              </li>
              <li class="menu-item-has-children"><a href="#">Pages</a> <span class="arrow"></span>
              	 <ul class="sub-menu">
                	<li><a href="about-us.html">About Us</a></li>
                    <li><a href="how-it-work.html">How it Work</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="contact-us.html">Contact Us</a></li>
                    <li><a href="404-error.html">404 Error</a></li>
<li><a href="user_listing_list.html">User Listing Page</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children"><a href="#">Blog</a> <span class="arrow"></span>
              	 <ul class="sub-menu">
                	<li><a href="blog-grid-style.html">Blog Grid Style</a></li>
                    <li><a href="blog-list-style.html">Blog List Style</a></li>
                    <li><a href="blog-single.html">Single Blog</a></li>
                </ul>
              </li>
              <li class="menu-item-has-children">
              		<a href="#">Elements</a>
                    <ul class="sub-menu">
                        <li><a href="header.html">Header Style</a></li>
                        <li><a href="footer.html">Footer Style</a></li>
                    </ul>
               </li>
              <li class="menu-item-has-children"><a href="#">User Panel</a> <span class="arrow"></span>
              	 <ul class="sub-menu">
                	<li><a href="dashboard.html">Dashboard</a></li>
                    <li><a href="dashboard-my-listings.html">My Listings</a></li>
                    <li><a href="dashboard-reviews.html">Reviews</a></li>
                    <li><a href="dashboard-bookmarks.html">Bookmarks</a></li>
                    <li><a href="dashboard-add-listing.html">Add Listing</a></li>
					<li><a href="dashboard-my-events.html">My Events</a></li>
					<li><a href="dashboard-add-event.html">Add Event</a></li>
                    <li><a href="dashboard-my-profile.html">My Profile</a></li>
                </ul>
              </li>
                <li><a href="{{route('login')}}">Log In</a></li>
              <li><a href="{{route('register')}}">Sign In</a></li>
            </ul>
            <div class="submit_listing">
	            <a href="pricing.html" class="btn outline-btn"><i class="fa  fa-plus-circle"></i> Submit Listing</a>
            </div>
          </div>
        </div>
	</div>
</div>
    </nav>
</header>
<!-- /Header -->

<!-- Banner -->
<section id="banner" class="parallex-bg section-padding">
	<div class="container">
    	<div class="intro_text white-text div_zindex">
    		<h1>Welcome to ElemoListing</h1>
	        <h5>Search and apply to millions of Listings</h5>
            <div class="search_form">
            	<form action="listing-grid-map.html" method="get">
                	<div class="form-group select">
                   		<select class="form-control">
                	    	<option>What are you looking for?</option>
            	            <option>Real Estate</option>
                            <option>Restaurant</option>
                            <option>Real Estate</option>
        	                <option>Health & Fitness</option>
    	                    <option>Beauty & Spas</option>
                            <option>Hotels & Travel</option>
                            <option>Automotive</option>
	                    </select>
                    </div>
                    <div class="form-group">
                   		<input type="text" class="form-control" placeholder="Location">
                    </div>
                    <div class="form-group search_btn">
                    	<input type="submit" value="Search" class="btn btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Banner -->

<!-- Category-Slider -->
<section id="all_category" class="gray_bg">
	<div class="container">
    	<div id="category_slider">
        	<div class="owl-carousel owl-theme">
            	<div class="item">
                	<a href="#">
    	            	<div class="category_icon">
                            <img src="{{asset('web/assets\images\category-icon1.png')}}" alt="image">
                        </div>
	                    <p>Real Estate</p>
                    </a>
                </div>

                <div class="item">
                	<a href="#">
    	            	<div class="category_icon">
                            <img src="{{asset('web/assets\images\category-icon2.png')}}" alt="image">
                        </div>
	                    <p>Restaurant</p>
                    </a>
                </div>

                <div class="item">
                	<a href="#">
    	            	<div class="category_icon">
                            <img src="{{asset('web/assets\images\category-icon3.png')}}" alt="image">
                        </div>
	                    <p>Health & Fitness</p>
                    </a>
                </div>

                <div class="item">
                	<a href="#">
    	            	<div class="category_icon">
                            <img src="{{asset('web/assets\images\category-icon4.png')}}" alt="image">
                        </div>
	                    <p>Beauty & Spas</p>
                    </a>
                </div>

                <div class="item">
                	<a href="#">
    	            	<div class="category_icon">
                            <img src="{{asset('web/assets\images\category-icon5.png')}}" alt="image">
                        </div>
	                    <p>Hotels & Travel</p>
                    </a>
                </div>

                <div class="item">
                	<a href="#">
    	            	<div class="category_icon">
                            <img src="{{asset('web/assets\images\category-icon6.png')}}" alt="image">
                        </div>
	                    <p>Automotive</p>
                    </a>
                </div>

                <div class="item">
                	<a href="#">
    	            	<div class="category_icon">
                            <img src="{{asset('web/assets\images\category-icon7.png')}}" alt="image">
                        </div>
	                    <p>Event</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Category-Slider -->

<!-- Popular-Cities/Towns -->
<section id="popular_cities" class="section-padding">
	<div class="container">
    	<div class="section-header text-center">
        	<h2>Most Popular Cities/Towns</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        </div>

        <div class="row">
        	<div class="col-sm-6 col-md-3">
            	<div class="cities_list">
                    <div class="city_listings_info">
                    	<h4>New York City</h4>
                        <div class="listing_number"><span>6 Listings</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
            	<div class="cities_list chicago">
                    <div class="city_listings_info">
                    	<h4>Chicago</h4>
                        <div class="listing_number"><span>6 Listings</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
            	<div class="cities_list angeles">
                    <div class="city_listings_info">
                    	<h4>Los Angeles</h4>
                        <div class="listing_number"><span>6 Listings</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
            	<div class="cities_list francisco">
                    <div class="city_listings_info">
                    	<h4>San Francisco</h4>
                        <div class="listing_number"><span>6 Listings</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
            	<div class="cities_list seattle">
                    <div class="city_listings_info">
                    	<h4>Seattle</h4>
                        <div class="listing_number"><span>6 Listings</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
            	<div class="cities_list washington">
                    <div class="city_listings_info">
                    	<h4>Washington, D.C.</h4>
                        <div class="listing_number"><span>6 Listings</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
            	<div class="cities_list orlando">
                    <div class="city_listings_info">
                    	<h4>Orlando</h4>
                        <div class="listing_number"><span>6 Listings</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
            	<div class="cities_list miami">
                    <div class="city_listings_info">
                    	<h4>Miami</h4>
                        <div class="listing_number"><span>6 Listings</span> </div>
                    </div>
                    <a href="#" class="overlay_link"></a>
                </div>
            </div>
        </div>
        <div class="text-center">
        	<a href="#" class="btn">View More Cities / Towns</a>
        </div>
    </div>
</section>
<!-- /Popular Cities/Towns -->

<!-- About-us -->
<section id="about_info" class="section-padding">
	<div class="container">
    	<div class="row">
		<div class="col-md-7"></div>
        	<div class="col-md-5">
            	<div class="white_box">
                    <h3>Save time and hassle. Let us find Quick and Easy</h3>
                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure.</p>
                    <a href="#" class="btn">Start Now !</a>
                </div>
            </div>
        </div>

	</div>
</section>
<!-- /About-us -->

<!-- Popular-Listings -->
<section id="popular_listings" class="section-padding">
	<div class="container">
    	<div class="section-header text-center">
        	<h2>Popular Exclusive Listings</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        </div>

        <div id="popular_listing_slider">
        	<div class="owl-carousel owl-theme">
            	<div class="listing_wrap">
                    <div class="listing_img">
                        <span class="like_post"><i class="fa fa-bookmark-o"></i></span>
                        <div class="listing_cate">
                            <span class="cate_icon"><a href="#"><img src="{{asset('web/assets\images\category-icon1.png')}}" alt="icon-img"></a></span>
                            <span class="listing_like"><a href="#"><i class="fa fa-heart-o"></i></a></span>
                        </div>
                        <a href="#"><img src="{{asset('web/assets\images\listing_img1.jpg')}}" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                            <a href="#">Real Estate</a>
                        </div>
                        <h4><a href="#">The Morning Hotel</a></h4>
                        <p>5-star hotel with restaurant, Deluxe Rooms.</p>

                        <div class="listing_review_info">
                            <p><span class="review_score">4.0/5</span>
                               <i class="fa fa-star active"></i> <i class="fa fa-star active"></i> <i class="fa fa-star active"></i>
                               <i class="fa fa-star active"></i> <i class="fa fa-star"></i>
                               (5 Reviews) </p>
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i> Los Angeles</p>
                        </div>
                    </div>
                </div>

                <div class="listing_wrap">
                    <div class="listing_img">
                        <span class="like_post"><i class="fa fa-bookmark-o"></i></span>
                        <div class="listing_cate">
                            <span class="cate_icon"><a href="#"><img src="{{asset('web/assets\images\category-icon2.png')}}" alt="icon-img"></a></span>
                            <span class="listing_like"><a href="#"><i class="fa fa-heart-o"></i></a></span>
                        </div>
                        <a href="#"><img src="{{asset('web/assets\images\listing_img2.jpg')}}" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                            <a href="#">Restaurant</a>
                        </div>
                        <h4><a href="#">Eating Restaurant</a></h4>
                        <p>5-star hotel with restaurant, Deluxe Rooms.</p>

                        <div class="listing_review_info">
                            <p><span class="review_score">4.0/5</span>
                               <i class="fa fa-star active"></i> <i class="fa fa-star active"></i> <i class="fa fa-star active"></i>
                               <i class="fa fa-star active"></i> <i class="fa fa-star"></i>
                               (5 Reviews) </p>
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i> Los Angeles</p>
                        </div>
                    </div>
                </div>

                <div class="listing_wrap">
                    <div class="listing_img">
                        <span class="like_post"><i class="fa fa-bookmark-o"></i></span>
                        <div class="listing_cate">
                            <span class="cate_icon"><a href="#"><img src="{{asset('web/assets/images/category-icon4.png')}}" alt="icon-img"></a></span>
                            <span class="listing_like"><a href="#"><i class="fa fa-heart-o"></i></a></span>
                        </div>
                        <a href="#"><img src="{{asset('web/assets/images/listing_img4.jpg')}}" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                            <a href="#">Beauty & Spas</a>
                        </div>
                        <h4><a href="#">The Morning Hotel</a></h4>
                        <p>5-star hotel with restaurant, Deluxe Rooms.</p>

                        <div class="listing_review_info">
                            <p><span class="review_score">4.0/5</span>
                               <i class="fa fa-star active"></i> <i class="fa fa-star active"></i> <i class="fa fa-star active"></i>
                               <i class="fa fa-star active"></i> <i class="fa fa-star"></i>
                               (5 Reviews) </p>
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i> Los Angeles</p>
                        </div>
                    </div>
                </div>

                <div class="listing_wrap">
                    <div class="listing_img">
                        <span class="like_post"><i class="fa fa-bookmark-o"></i></span>
                        <div class="listing_cate">
                            <span class="cate_icon"><a href="#"><img src="{{asset('web/assets/images/category-icon2.png')}}" alt="icon-img"></a></span>
                            <span class="listing_like"><a href="#"><i class="fa fa-heart-o"></i></a></span>
                        </div>
                        <a href="#"><img src="{{asset('web/assets/images/listing_img3.jpg')}}" alt="image"></a>
                    </div>
                    <div class="listing_info">
                        <div class="post_category">
                            <a href="#">Restaurant</a>
                        </div>
                        <h4><a href="#">Blue Restaurant</a></h4>
                        <p>5-star hotel with restaurant, Deluxe Rooms.</p>

                        <div class="listing_review_info">
                            <p><span class="review_score">4.0/5</span>
                               <i class="fa fa-star active"></i> <i class="fa fa-star active"></i> <i class="fa fa-star active"></i>
                               <i class="fa fa-star active"></i> <i class="fa fa-star"></i>
                               (5 Reviews) </p>
                            <p class="listing_map_m"><i class="fa fa-map-marker"></i> Los Angeles</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- /Popular-Listings -->

<!-- Testimonials -->
<section id="testimonials" class="section-padding parallex-bg">
	<div class="container">
    	<div class="section-header text-center white-text div_zindex">
        	<h2>What Our Clients Say</h2>
        </div>

        <div id="testimonial_slider" class="div_zindex text-center">
        	<div class="owl-carousel owl-theme">
            	<div class="item">
                	<div class="testimonial_header">
    	            	<h5>ESTHER BUECHE</h5>
	                    <p>CEO of XYZ PVT.</p>
                    </div>
                    <p>Objectively innovate empowered manufactured products whereas parallel platforms. Holisticly predominate extensible procedures.</p>
                </div>

                <div class="item">
                	<div class="testimonial_header">
    	            	<h5>WILLIAM STEVES</h5>
	                    <p>Vice Director - Wilson Media</p>
                    </div>
                    <p>Objectively innovate empowered manufactured products whereas parallel platforms. Holisticly predominate extensible procedures.</p>
                </div>
            </div>
        </div>
    </div>
	<div class="dark-overlay"></div>
</section>
<!-- /Testimonials -->

<!-- Latest-Blog -->
<section id="latest_blog" class="section-padding">
	<div class="container">
    	<div class="section-header text-center">
        	<h2>Latest Articles and Tips</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
        </div>

        <div class="row">
        	<div class="col-md-4">
            	<div class="post_wrap">
                	<div class="post_img">
                    	<a href="#"><img src="{{asset('web/assets/images/post_1.jpg')}}" alt="image"></a>
                    </div>
                    <div class="post_info">
                    	<div class="post_category">
                        	<a href="#">Beauty & Spas</a>
                        </div>
                    	<h4><a href="#">The Standard Chunk.</a></h4>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                        <div class="post_meta">
                        	<p>By: <a href="#">ElemoListing</a></p>
                            <p>On: <a href="#">22 March, 2020</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            	<div class="post_wrap">
                	<div class="post_img">
                    	<a href="#"><img src="{{asset('web/assets/images/post_2.jpg')}}" alt="image"></a>
                    </div>
                    <div class="post_info">
                    	<div class="post_category">
                        	<a href="#">Restaurant</a>
                        </div>
                    	<h4><a href="#">There are many variations.</a></h4>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                        <div class="post_meta">
                        	<p>By: <a href="#">ElemoListing</a></p>
                            <p>On: <a href="#">22 March, 2020</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            	<div class="post_wrap">
                	<div class="post_img">
                    	<a href="#"><img src="{{asset('web/assets/images/post_3.jpg')}}" alt="image"></a>
                    </div>
                    <div class="post_info">
                    	<div class="post_category">
                        	<a href="#">Real Estate</a>
                        </div>
                    	<h4><a href="#">All the Lorem Ipsum.</a></h4>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                        <div class="post_meta">
                        	<p>By: <a href="#">ElemoListing</a></p>
                            <p>On: <a href="#">22 March, 2020</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
        	<a href="#" class="btn">Read More Articles</a>
        </div>

    </div>
</section>
<!-- /Latest-Blog -->

<!-- Footer -->
<footer id="footer" class="secondary-bg">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4">
            	<div class="footer_widgets">
                	<h5>Connect with Us</h5>
                    <div class="follow_us">
                    	<ul>
                        	<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            	<div class="footer_widgets">
                	<h5>Quick Links</h5>
                    <div class="footer_nav">
                    	<ul>
                        	<li><a href="#">How it Work</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & condition</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
            	<div class="footer_widgets">
                	<h5>Our Newsletter</h5>
                    <div class="newsletter_wrap">
                    	<form action="" method="get">
                        	<input type="email" class="form-control" placeholder="Enter Email Address">
                            <input type="submit" value="subscribe" class="btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
    	<div class="container">
        	<p>Copyright &copy; 2020 Elemo. All Rights Reserved</p>
        </div>
    </div>
</footer>
<!-- /Footer -->


<!-- Scripts -->
<script src="{{asset('web/assets\js\jquery.min.js')}}"></script>
<script src="{{asset('web/assets\js\popper.min.js')}}"></script>
<script src="{{asset('web/assets\js\bootstrap.min.js')}}"></script>
<script src="{{asset('web/assets\js\interface.js')}}"></script>
<!--Carousel-JS-->
<script src="{{asset('web/assets\js\owl.carousel.min.js')}}"></script>
 <!--Switcher-->
<script src="{{asset('web/assets\switcher\js\switcher.js')}}"></script>
</body>
</html>
