@extends('web.layout.web')

@section('head')
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Pricing - {{env('app_name')}}</title>
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
    {{--    <link rel="stylesheet" id="switcher-css" type="text/css" href="{{asset('web/assets\switcher\css\switcher.css')}}" media="all">--}}
    <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\blue.css')}}" title="blue" media="all" data-default-color="true">
    {{-- <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\pink.css')}}" title="pink" media="all">
     <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\orange.css')}}" title="orange" media="all">
     <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\green.css')}}" title="green" media="all">
     <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\red.css')}}" title="red" media="all">
     <link rel="alternate stylesheet" type="text/css" href="{{asset('web/assets\switcher\css\purple.css')}}" title="purple" media="all">--}}

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
@endsection


@section('content')


    <!-- Inner-Banner -->
    <section id="inner_banner" class="parallex-bg">
        <div class="container">
            <div class="white-text text-center div_zindex">
                <h1>{{ __('Pricing') }}</h1>
            </div>
        </div>
        <div class="dark-overlay"></div>
    </section>
    <!-- /Inner-Banner -->

    <!-- Pricing -->
    <section id="inner_pages">
        <div class="container">
            <div class="row">
                @foreach($plans as $plan)
                <div class="col-md-{{ $planClass }}">
                    <div class="pricing_wrap active">
                        <div class="pricing_header">
                            @if($plan->id == 4)
                                <p class="popular_plan">Most Popular</p>
                            @endif

                            <h2>{{$plan->title}}</h2>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                        </div>
                        <div class="plan_info">
                            <div class="plan_price">{{$plan->price / 100}} €</div>
                            <ul>
                                <li><span>10</span> Listing</li>
                                <li><span>90 Days </span> Availability</li>
                                <li><span>Standard </span> Listing</li>
                                <li><span>24/7 </span> Support</li>
                            </ul>
                            <a href="{{route('register')}}" class="btn">Get Started</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <div class="row">
                <div class="offset-4 col-md-4">
                    <div class="pricing_wrap">
                        <div class="pricing_header">
                            <p class="popular_plan">OR TRY OUR</p>
                            <h2>Free Plan</h2>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                        </div>
                        <div class="plan_info">
                            <div class="plan_price">Free</div>
                            <ul>
                                <li><span>One</span> Listing</li>
                                <li><span>30 Days </span> Availability</li>
                                <li><span>Standard </span> Listing</li>
                                <li><span>Limited </span> Support</li>
                            </ul>
                            <a href="{{route('register')}}" class="btn">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>

            <h3>30 Days 100% Money Back Guarantee</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <a href="#">Read FAQ?</a></p>
            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. <a href="#">Contact Now!</a></p>
        </div>
    </section>
    <!-- /Pricing -->
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{asset('web/assets\js\jquery.min.js')}}"></script>
    <script src="{{asset('web/assets\js\popper.min.js')}}"></script>
    <script src="{{asset('web/assets\js\bootstrap.min.js')}}"></script>
    <script src="{{asset('web/assets\js\interface.js')}}"></script>
    <!--Carousel-JS-->
    <script src="{{asset('web/assets\js\owl.carousel.min.js')}}"></script>
    <!--Switcher-->
    {{--<script src="{{asset('web/assets\switcher\js\switcher.js')}}"></script>--}}
@endsection
