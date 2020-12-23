<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{url('css/bootstrap.css')}}" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('style.css')}}" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{url('css/responsive.css')}}" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="{{url('css/colors.css')}}" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="{{url('css/version/tech.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div id="wrapper">
    <header class="tech-header header">
        <div class="container-fluid">
            <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('images/version/tech-logo.png')}}" alt=""></a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>

                        @foreach($categories as $cate)
                        <li class="nav-item dropdown has-submenu">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$cate->name}}</a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="container">
                                        <div class="mega-menu-content">
                                            <div class="tab">
                                                @foreach($categories_child as $cate_child)
                                                    @if($cate_child->cate==$cate->id)
                                                <button class="tablinks active">{{$cate_child->name}}</button>
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div><!-- end mega-menu-content -->
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @endforeach

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="tech-category-01.html">Gadgets</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="tech-category-02.html">Videos</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="tech-category-03.html">Reviews</a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="tech-contact.html">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-2">
                        @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/register')}}"><i class="fa fa-sign-up"></i>
                                 Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/login')}}"><i class="fa fa-sign-in"></i> Login</a>
                        </li>
                        @else
                            <li class="nav-item">
                                {{Auth::user()->name}}
                                <a class="nav-link" href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div><!-- end container-fluid -->
    </header><!-- end market-header -->
