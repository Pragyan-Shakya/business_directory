<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Notice Bank | Item Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900%7COpen+Sans" rel="stylesheet" />
    <link rel="stylesheet" href='{{ asset('public/assets/user/assets/libraries/font-awesome/css/font-awesome.min.css') }}' />
    <link rel="stylesheet" href='{{ asset('public/assets/user/assets/libraries/ionicons-2.0.1/css/ionicons.min.css') }}' />
    <link rel="stylesheet" href='{{ asset('public/assets/user/assets/cache/css.min.css') }}' />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/user/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/user/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/type-icon/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/user/assets/css/imgal.min.css') }}">

    @yield('styles')
</head>
<body class="">
<header class="header">
    <div class="container container-palette top-bar affix-menu top-bar-color top-bar-white affix-menu">
        <div class="container-top">
            <div class="clearfix">
                <div class="pull-left logo"><a href="{{ url('/') }}">N</a></div>
                <div class="pull-left">
                    <div class="local-form">
                        <form action="">
                            <div class="form-group"> <select class="form-control selectpicker" title="I’m looking for...">
                                    <option value="a" data-icon="ion-map">Place</option>
                                    <option value="B" data-icon="ion-help">Lost &amp; Found</option>
                                    <option value="c" data-icon="ion-briefcase">Find Job</option>
                                    <option value="d" data-icon="ion-star">Event</option>
                                    <option value="d" data-icon="ion-android-wifi">Classified</option>
                                </select> </div>
                            <div class="form-group"> <input type="text" class="form-control" id="location" placeholder="Location" /> </div>
                            <div class="form-group form-group-btns"> <button type="submit" class="btn btn-custom btn-custom-secondary btn-icon"><i class="ion-ios-search-strong"></i></button></div>
                        </form>
                    </div>
                </div>
                <div class="top-bar-btns">
                    <ul class="nav-items">
                        @if(Auth::check())
                            <li><a href="{{ route('user.index') }}" class="btn btn-custom-default">Dashboard</a></li>
                            <li><a href="#" class="btn btn-custom-primary">Add Listing</a></li>
                        @else
                            <li><a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-custom-default">Log In</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-custom-primary">Add Listing</a></li>
                        @endif
                        <li>
                            <div class="dropdown">
                                <button onclick="dropdown_btn()" class="btn btn-gridbtn"><i class="fa fa-th"></i></button>
                                <div id="myDropdown" class="dropdown-content row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="">
                                                    <ul class="gridbtn-list">
                                                        <li>
                                                            <i class="ion-map"></i>
                                                        </li>
                                                        <li>Place
                                                        </li>
                                                    </ul>
                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href=""><ul class="gridbtn-list">
                                                        <li>
                                                            <i class="ion-help"></i>
                                                        </li>
                                                        <li>Lost & Found

                                                        </li>
                                                    </ul></a>

                                            </div>
                                            <div class="col-md-4">
                                                <a href=""><ul class="gridbtn-list">
                                                        <li>
                                                            <i class="ion-briefcase"></i>
                                                        </li>
                                                        <li>Find Job
                                                        </li>
                                                    </ul></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href=""> <ul class="gridbtn-list">
                                                        <li><i class="ion-star"></i>
                                                        </li>
                                                        <li>Event
                                                        </li>
                                                    </ul></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href=""> <ul class="gridbtn-list">
                                                        <li>
                                                            <i class="ion-android-wifi"></i>
                                                        </li>
                                                        <li>Classified
                                                        </li>
                                                    </ul></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href=""> <ul class="gridbtn-list">
                                                        <li>
                                                            <i class="ion-android-document"></i>
                                                        </li>
                                                        <li>Tender
                                                        </li>
                                                    </ul></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </li>
                    </ul>
                    <button type="button" class="navbar-toggle" id="navigation-toogle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="pull-right navigation-wrapper"> <a href="#" class="button-close"></a>
                    <div class="logo"><a href="#">N</a></div>
                    <ul class="nav navbar-nav nav-items default-menu" id="main-menu">
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
                    <!-- <ul class="lang-menu-mobile">
                      <li> <a class="dropdown-item" href="#"> <img src="assets/img/flags/en.png" alt="" class="" />EN </a> </li>
                      <li> <a class="dropdown-item" href="#"> <img src="assets/img/flags/hr.png" alt="" class="" />HR </a> </li>
                      <li> <a class="dropdown-item rtl" href="homepage-search-top640d.php?test=rtl"> <img src="assets/img/flags/ae.png" alt="" class="" />AR </a> </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</header><!-- /.header -->
