<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Notice Bank | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="assets/" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900%7COpen+Sans" rel="stylesheet" />
    <link rel="stylesheet" href='{{ asset('public/assets/user/assets/libraries/font-awesome/css/font-awesome.min.css') }}' />
    <link rel="stylesheet" href='{{ asset('public/assets/user/assets/libraries/ionicons-2.0.1/css/ionicons.min.css') }}' />
    <link rel="stylesheet" href='{{ asset('public/assets/user/assets/cache/css.min.css') }}' />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/user/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/user/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/type-icon/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/css/imgal.min.css') }}">
    @yield('styles')

    <script src="{{ asset('public/assets/user/assets/js/jquery-2.2.1.min.js') }}"></script>

</head>
<body class="">
<header class="header">
    <div class="container container-palette top-bar overflow top-bar-white t-overflow affix-menu">
        <div class="container">
            <div class="clearfix">
                <div class="pull-left logo"><a href="{{ route('front.home') }}">Notice Bank</a></div>
                <div class="top-bar-btns">
                    @if(Auth::check())
                        <ul class="nav-items">
                            <li><a href="{{ route('user.index') }}" class="btn btn-custom-default">Dashboard</a></li>
                            <li><a href="#" class="btn btn-custom-primary">Add Listing</a></li>
                        </ul>
                    @else
                        <ul class="nav-items">
                            <li><a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-custom-default">Log In</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-custom-primary">Add Listing</a></li>
                        </ul>
                    @endif
                </div>
                <button type="button" class="navbar-toggle" id="navigation-toogle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="pull-right navigation-wrapper"> <a href="#" class="button-close"></a>
                <div class="logo"><a href="#">B.Directory</a></div>
                <ul class="nav navbar-nav nav-items default-menu" id="main-menu">
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Place <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            @php
                                $results = json_decode(getConfiguration('listing_categories'));
                            @endphp
                            @foreach($results as $result)
                                @php
                                    $industry = \App\Model\Industry::find($result);
                                @endphp
                                <li><a href="{{ route('front.industry.show', $industry->slug) }}">{{ $industry->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Lost & Found <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="subcategory.php">Report Lost</a></li>
                            <li><a href="subcategory.php">Report Found</a></li>
                            <li><a href="subcategory.php">Get Track Number</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Find Job <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="subcategory.php">Government</a></li>
                            <li><a href="subcategory.php">I/NGO</a></li>
                            <li><a href="subcategory.php">Private</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Events <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="subcategory.php">Event 1</a></li>
                            <li><a href="subcategory.php">Event 2</a></li>
                            <li><a href="subcategory.php">Event 3</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Classified <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="subcategory.php">Real State</a></li>
                            <li><a href="subcategory.php">Car</a></li>
                            <li><a href="subcategory.php">Electronics</a></li>
                            <li><a href="subcategory.php">Furnitures</a></li>
                            <li><a href="subcategory.php">Services</a></li>
                            <li><a href="subcategory.php">Other</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tender<span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="subcategory.php">Tender1</a></li>
                            <li><a href="subcategory.php">Tender2</a></li>
                            <li><a href="subcategory.php">Tender3</a></li>
                            <li><a href="subcategory.php">Tender4</a></li>
                        </ul>
                    </li>
                    <li> <a href="blog-grid.php">Blog </a>
                    </li>
                </ul>
                <!-- <ul class="lang-menu-mobile">
                  <li> <a class="dropdown-item" href="#"> <img src="assets/img/flags/en.png" alt="" class="" />EN </a> </li>
                  <li> <a class="dropdown-item" href="#"> <img src="assets/img/flags/hr.png" alt="" class="" />HR </a> </li>
                  <li> <a class="dropdown-item rtl" href="homepage-search-top640d.php?test=rtl"> <img src="assets/img/flags/ae.png" alt="" class="" />AR </a> </li>
                </ul> -->
            </div>
        </div>
    </div>
    </div>
