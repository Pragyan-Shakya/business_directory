@extends('front.master')
@section('content')
    <div class="section-search-area section container container-palette mask-grey" data-parallax="scroll" style="background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('{{ asset(getConfiguration('front_banner')) }}') !important;" data-image-src="">
        <!--<div id="map" class="map-bg"> </div>-->
        <div class="container">
            <div class="body">
                <div class="h-area">
                    <h1 class="title">Just Find Anything That You Want</h1> <span class="subtitle">We will help you to find the best possible items in this world .</span>
                </div>
                <div class="mega-search">
                    <div class="tab">
                        <button class="tablinks" onclick="openCategory(event, 'place')">Place</button>
                        <button class="tablinks" onclick="openCategory(event, 'lostnfound')">Lost and Found</button>
                        <button class="tablinks" onclick="openCategory(event, 'findjob')">Find Job</button>
                        <button class="tablinks" onclick="openCategory(event, 'event')">Event</button>
                        <button class="tablinks" onclick="openCategory(event, 'classified')">Classified</button>
                        <button class="tablinks" onclick="openCategory(event, 'tender')">Tender</button>
                    </div>
                    <div id="place" class="tabcontent">
                        <h2>Place</h2>
                        <form action="{{ route('front.listing_search') }}" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="keyword" placeholder="Keyword">
                                </div>
                                <div class="col-md-3">
                                    <select name="industry" class="form-control">
                                        <option value="" >Select Industry</option>
                                        @foreach($industries as $industry)
                                            <option value="{{ $industry->slug }}">{{ $industry->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="location" class="form-control">
                                        <option value="" >Select Location</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-search-submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="lostnfound" class="tabcontent">
                        <h2>Lost and Found</h2>
                        <form action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="location" placeholder="Where to Look?">
                                </div>
                                <div class="col-md-3">
                                    <select name="subcategory" form="" class="form-control">
                                        <option value="0" selected>Select Subcategory</option>
                                        <option value="1rl">Report Lost</option>
                                        <option value="2rf">Report Found</option>
                                        <option value="3gtn">Get Track Number</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="item" placeholder="Name of Item">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-search-submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="findjob" class="tabcontent">
                        <h2>Find Job</h2>
                        <form action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="location" placeholder="Where to Look?">
                                </div>
                                <div class="col-md-3">
                                    <select name="subcategory" form="" class="form-control">
                                        <option value="0" selected>Select Subcategory</option>
                                        <option value="1g">Government</option>
                                        <option value="2in">I/NGO</option>
                                        <option value="3pr">Private</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="item" placeholder="I'm Looking for...">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-search-submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="event" class="tabcontent">
                        <h2>Event</h2>
                        <form action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="location" placeholder="Where to Look?">
                                </div>
                                <div class="col-md-3">
                                    <select name="subcategory" form="" class="form-control">
                                        <option value="0" selected>Select Subcategory</option>
                                        <option value="1ev">Event 1</option>
                                        <option value="2ev">Event 2</option>
                                        <option value="3ev">Event 3</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="item" placeholder="Event Title">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-search-submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="classified" class="tabcontent">
                        <h2>Classified</h2>
                        <form action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="location" placeholder="Where to Look?">
                                </div>
                                <div class="col-md-3">
                                    <select name="subcategory" form="" class="form-control">
                                        <option value="0" selected>Select Subcategory</option>
                                        <option value="1rs">Real State</option>
                                        <option value="2c">Car</option>
                                        <option value="3el">Electronics</option>
                                        <option value="4fu">Furniture</option>
                                        <option value="5se">Services</option>
                                        <option value="6ot">Others</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="range-slider">
                                        <input class="range-slider__range" type="range" value="0" min="0" max="100000" step="500">
                                        <span class="range-slider__value"></span> </div>
                                </div>
                                <div class="col-md-2">
                                    <select name="subcategory" form="" class="form-control">
                                        <option value="0" selected>Condition</option>
                                        <option value="new">Brand New</option>
                                        <option value="used">Used</option>
                                        <option value="old">Old</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-search-submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="tender" class="tabcontent">
                        <h2>Tender</h2>
                        <form action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="location" placeholder="Where to Look?">
                                </div>
                                <div class="col-md-3">
                                    <select name="subcategory" form="" class="form-control">
                                        <option value="0" se>Select Subcategory</option>
                                        <option value="1b">Tender1</option>
                                        <option value="2r">Tender2</option>
                                        <option value="3h">Tender3</option>
                                        <option value="4s">Tender4</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="item" placeholder="Name of Item">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-search-submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.section-search-area -->
    </header><!-- /.header -->
    <main class="zebra-childs">

        <section id="featured-ad" class="section-padding section-bg">
            <div class="container">
                <div class="section-title mt-3">
                    <h2 class="title">Featured Ad's</h2> <span class="subtitle">Maecenas mauris arcu, congue ac lorem vel libero.</span>
                </div>
                <div class="owl-carousel owl-theme">
                    @foreach($listings as $listing)
                        <div>
                            <div class="thumbnail thumbnail-property">
                                <div class="thumbnail-image"> <img src="{{ $listing->get_logo() }}" alt="{{ $listing->title }}" /> <a href="{{ route('front.listing.show', $listing->slug) }}"></a>
                                    <div class="icons"> <a href="https://www.facebook.com/share.html?u=http://test.com&amp;title="><i class="ion-android-share-alt"></i></a> <a href="#" class='add_to_favorites'><i class="ion-android-favorite"></i></a> <a
                                                href="listing.php"><i class="ion-location"></i></a> <a href="listing.php"><i class="ion-forward"></i></a> </div>
                                </div>
                                <div class="caption">
                                    <div class="caption-ls">
                                        <h3 class="thumbnail-title"><a href="{{ route('front.listing.show', $listing->slug) }}">{{ $listing->title }}</a></h3> <span class="thumbnail-ratings"> {{ $listing->avgReview() }} <i class="icon-star-ratings-{{ $listing->avgReview() }}"></i> </span>
                                        <span class="type"> <a href="{{ route('front.industry.show', $listing->industry->slug) }}">{{ $listing->industry->title }}</a> </span>
                                    </div>
                                    <div class="caption-rs"> <a href="listing.php" class="btn-marker"> <span class="box"><i class="fa fa-map-marker"></i></span> <span class="title">Location</span> </a> </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('front.listing.index') }}" class="btn btn-viewmore">View All <span class="typcn typcn-arrow-right-thick"></span></a>
            </div>
        </section>
        <section id="top-destination" class="section-padding">
            <div class="container">
                <div class="section-title mt-3">
                    <h2 class="title">Top Destinations</h2> <span class="subtitle">Maecenas mauris arcu, congue ac lorem vel libero.</span>
                </div>
                <div class="row">
                    @foreach($top_destinations as $top_destination)
                        <div class="col-md-3 mt-1">
                            <div class="inner-image">
                                <div class="imageininner">
                                    @if($top_destination->image)
                                        <a href="#"> <img src="{{ $top_destination->get_image() }}" alt="{{ $top_destination->district_name }}"></a>
                                    @else
                                        <a href="#"> <img src="{{ asset('public/assets/uploads/default_designation.jpg') }}" alt="{{ $top_destination->district_name }}"></a>
                                    @endif
                                </div>
                                <div class="imageintext">
                                    <a href="{{ route('front.destination.show', $top_destination->id) }}">
                                        <h3 class="text-center">{{ $top_destination->district_name }}</h3>
                                    </a>
                                    <a href="{{ route('front.destination.show', $top_destination->id) }}">
                                        <p class="text-center">{{ $top_destination->companies()->count() }} Listings</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('front.destination.index') }}" class="btn btn-viewmore">View All <span class="typcn typcn-arrow-right-thick"></span></a>
            </div>
        </section>
        <section id="lost" class="section-padding">
            <div class="container">
                <div class="fixed_link">
                    <a href="post_demand.php" class="demand"><img src="{{ asset('public/assets/user/assets/img/lost-items.png') }}" alt="" width="30px" class="mr-3">Report Lost</a>
                    <a href="post_resume.php" class="resume"><img src="{{ asset('public/assets/user/assets/img/location.png') }}" alt="" width="35px" class="mr-3">Report Found</a>
                </div>
                <div class="section-title mt-3">
                    <h2 class="title">Lost and Found</h2> <span class="subtitle">Maecenas mauris arcu, congue ac lorem vel libero.</span>
                </div>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="thumbnail thumbnail-property">
                            <div class="thumbnail-image"> <img src="{{ asset('public/assets/user/assets/img/pic/demo_main/italian-ciabatta-bread-cut-in-slices-on-wooden.jpg') }}" alt="" /> <a href="listing.php"></a>
                                <div class="icons"> <a href="https://www.facebook.com/share.html?u=http://test.com&amp;title="><i class="ion-android-share-alt"></i></a> <a href="#" class='add_to_favorites'><i class="ion-android-favorite"></i></a> <a
                                            href="listing.php"><i class="ion-location"></i></a> <a href="listing.php"><i class="ion-forward"></i></a> </div>
                            </div>
                            <div class="caption">
                                <div class="caption-ls">
                                    <h3 class="thumbnail-title"><a href="listing.php">Contraband Coffee Bar</a></h3> <span class="thumbnail-ratings"> 4.5 <i class="icon-star-ratings-4-5"></i> </span> <span class="type"> <a href="map-side-list.php">Restaurant Bars</a> </span>
                                </div>
                                <div class="caption-rs"> <a href="listing.php" class="btn-marker"> <span class="box"><i class="fa fa-map-marker"></i></span> <span class="title">Location</span> </a> </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="thumbnail thumbnail-property">
                            <div class="thumbnail-image"> <img src="{{ asset('public/assets/user/assets/img/pic/demo_main/italian-ciabatta-bread-cut-in-slices-on-wooden.jpg') }}" alt="" /> <a href="listing.php"></a>
                                <div class="icons"> <a href="https://www.facebook.com/share.html?u=http://test.com&amp;title="><i class="ion-android-share-alt"></i></a> <a href="#" class='add_to_favorites'><i class="ion-android-favorite"></i></a> <a
                                            href="listing.php"><i class="ion-location"></i></a> <a href="listing.php"><i class="ion-forward"></i></a> </div>
                            </div>
                            <div class="caption">
                                <div class="caption-ls">
                                    <h3 class="thumbnail-title"><a href="listing.php">Contraband Coffee Bar</a></h3> <span class="thumbnail-ratings"> 4.5 <i class="icon-star-ratings-4-5"></i> </span> <span class="type"> <a href="map-side-list.php">Restaurant
                      Bars</a> </span>
                                </div>
                                <div class="caption-rs"> <a href="listing.php" class="btn-marker"> <span class="box"><i class="fa fa-map-marker"></i></span> <span class="title">Location</span> </a> </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="thumbnail thumbnail-property">
                            <div class="thumbnail-image"> <img src="{{ asset('public/assets/user/assets/img/pic/demo_main/italian-ciabatta-bread-cut-in-slices-on-wooden.jpg') }}" alt="" /> <a href="listing.php"></a>
                                <div class="icons"> <a href="https://www.facebook.com/share.html?u=http://test.com&amp;title="><i class="ion-android-share-alt"></i></a> <a href="#" class='add_to_favorites'><i class="ion-android-favorite"></i></a> <a
                                            href="listing.php"><i class="ion-location"></i></a> <a href="listing.php"><i class="ion-forward"></i></a> </div>
                            </div>
                            <div class="caption">
                                <div class="caption-ls">
                                    <h3 class="thumbnail-title"><a href="listing.php">Contraband Coffee Bar</a></h3> <span class="thumbnail-ratings"> 4.5 <i class="icon-star-ratings-4-5"></i> </span> <span class="type"> <a href="map-side-list.php">Restaurant
                      Bars</a> </span>
                                </div>
                                <div class="caption-rs"> <a href="listing.php" class="btn-marker"> <span class="box"><i class="fa fa-map-marker"></i></span> <span class="title">Location</span> </a> </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="thumbnail thumbnail-property">
                            <div class="thumbnail-image"> <img src="{{ asset('public/assets/user/assets/img/pic/demo_main/italian-ciabatta-bread-cut-in-slices-on-wooden.jpg') }}" alt="" /> <a href="listing.php"></a>
                                <div class="icons"> <a href="https://www.facebook.com/share.html?u=http://test.com&amp;title="><i class="ion-android-share-alt"></i></a> <a href="#" class='add_to_favorites'><i class="ion-android-favorite"></i></a> <a
                                            href="listing.php"><i class="ion-location"></i></a> <a href="listing.php"><i class="ion-forward"></i></a> </div>
                            </div>
                            <div class="caption">
                                <div class="caption-ls">
                                    <h3 class="thumbnail-title"><a href="listing.php">Contraband Coffee Bar</a></h3> <span class="thumbnail-ratings"> 4.5 <i class="icon-star-ratings-4-5"></i> </span> <span class="type"> <a href="map-side-list.php">Restaurant
                      Bars</a> </span>
                                </div>
                                <div class="caption-rs"> <a href="listing.php" class="btn-marker"> <span class="box"><i class="fa fa-map-marker"></i></span> <span class="title">Location</span> </a> </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="thumbnail thumbnail-property">
                            <div class="thumbnail-image"> <img src="{{ asset('public/assets/user/assets/img/pic/demo_main/italian-ciabatta-bread-cut-in-slices-on-wooden.jpg') }}" alt="" /> <a href="listing.php"></a>
                                <div class="icons"> <a href="https://www.facebook.com/share.html?u=http://test.com&amp;title="><i class="ion-android-share-alt"></i></a> <a href="#" class='add_to_favorites'><i class="ion-android-favorite"></i></a> <a
                                            href="listing.php"><i class="ion-location"></i></a> <a href="listing.php"><i class="ion-forward"></i></a> </div>
                            </div>
                            <div class="caption">
                                <div class="caption-ls">
                                    <h3 class="thumbnail-title"><a href="listing.php">Contraband Coffee Bar</a></h3> <span class="thumbnail-ratings"> 4.5 <i class="icon-star-ratings-4-5"></i> </span> <span class="type"> <a href="map-side-list.php">Restaurant
                      Bars</a> </span>
                                </div>
                                <div class="caption-rs"> <a href="listing.php" class="btn-marker"> <span class="box"><i class="fa fa-map-marker"></i></span> <span class="title">Location</span> </a> </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="thumbnail thumbnail-property">
                            <div class="thumbnail-image"> <img src="{{ asset('public/assets/user/assets/img/pic/demo_main/italian-ciabatta-bread-cut-in-slices-on-wooden.jpg') }}" alt="" /> <a href="listing.php"></a>
                                <div class="icons"> <a href="https://www.facebook.com/share.html?u=http://test.com&amp;title="><i class="ion-android-share-alt"></i></a> <a href="#" class='add_to_favorites'><i class="ion-android-favorite"></i></a> <a
                                            href="listing.php"><i class="ion-location"></i></a> <a href="listing.php"><i class="ion-forward"></i></a> </div>
                            </div>
                            <div class="caption">
                                <div class="caption-ls">
                                    <h3 class="thumbnail-title"><a href="listing.php">Contraband Coffee Bar</a></h3> <span class="thumbnail-ratings"> 4.5 <i class="icon-star-ratings-4-5"></i> </span> <span class="type"> <a href="map-side-list.php">Restaurant
                      Bars</a> </span>
                                </div>
                                <div class="caption-rs"> <a href="listing.php" class="btn-marker"> <span class="box"><i class="fa fa-map-marker"></i></span> <span class="title">Location</span> </a> </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="thumbnail thumbnail-property">
                            <div class="thumbnail-image"> <img src="{{ asset('public/assets/user/assets/img/pic/demo_main/italian-ciabatta-bread-cut-in-slices-on-wooden.jpg') }}" alt="" /> <a href="listing.php"></a>
                                <div class="icons"> <a href="https://www.facebook.com/share.html?u=http://test.com&amp;title="><i class="ion-android-share-alt"></i></a> <a href="#" class='add_to_favorites'><i class="ion-android-favorite"></i></a> <a
                                            href="listing.php"><i class="ion-location"></i></a> <a href="listing.php"><i class="ion-forward"></i></a> </div>
                            </div>
                            <div class="caption">
                                <div class="caption-ls">
                                    <h3 class="thumbnail-title"><a href="listing.php">Contraband Coffee Bar</a></h3> <span class="thumbnail-ratings"> 4.5 <i class="icon-star-ratings-4-5"></i> </span> <span class="type"> <a href="map-side-list.php">Restaurant
                      Bars</a> </span>
                                </div>
                                <div class="caption-rs"> <a href="listing.php" class="btn-marker"> <span class="box"><i class="fa fa-map-marker"></i></span> <span class="title">Location</span> </a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- REport -->
                <div class="report-search">
                    <div class="section-title mt-3">
                        <h2 class="title">Report Your Missing Items</h2>
                    </div>
                    <!-- Search form -->
                    <input class="form-control search-report" type="text" placeholder="Track Your Missing Items" aria-label="Search">
                    <p class="text-center icon"><a href="#"><i class="fas fa-angle-double-right"></i> &nbsp;Get Tracking Number </a></p>
                </div>
            </div>
        </section>

        @if(count($blogs)>0)
            <section class="section-blog section-padding section container container-palette">
                <div class="container">
                    <div class="section-title">
                        <h2 class="title">Blogs</h2> <span class="subtitle">Curabitur commodo orci lacus, in lacinia ligula porta vitae.</span>
                    </div>
                    <div class="owl-carousel owl-theme">
                        @foreach($blogs as $blog)
                            <div class="thumbnail thumbnail-property">
                                <div class="thumbnail-image"> <img src="{{ $blog->get_image() }}" alt="" /> <a href="{{ route('front.blog.show', $blog->slug) }}"></a> </div>
                                <div class="caption caption-blog">
                                    <h3 class="thumbnail-title"><a href="{{ route('front.blog.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                    <span class="date"> <i class="ion-clock"></i>{{ date('m M, Y', strtotime($blog->created_at)) }}</span>
                                    <p>{{ \Illuminate\Support\Str::limit($blog->content, '100') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="" class="btn btn-viewmore">View All <span class="typcn typcn-arrow-right-thick"></span></a>
                </div>
            </section> <!-- /.section-blog -->
        @endif

        @if(count($testimonials)>0)
            <section class="section-reviews section-padding section container container-palette">
                <div class="container">
                    <div class="section-title">
                        <h2 class="title">Testimonials</h2> <span class="subtitle">Donecos a lacus ut nisl mattis sodales.</span>
                    </div>
                    <div class="reviews-carousel">
                        <div class="nav-r"> <a href="#" class="nav-r-btn btn-left"><i class="ion-ios-arrow-left"></i></a> <a href="#" class="nav-r-btn btn-right"><i class="ion-ios-arrow-right"></i></a> </div>
                        <div class="reviews-results clearfix">
                            @foreach($testimonials as $key => $testimonial)
                                <div class="review show">
                                    <div class="rating"><i class="icon-star-ratings-5"></i></div>
                                    <div class="description"> {!! $testimonial->message !!}</div>
                                    <div class="user-card">
                                        <div class="user-card-image image-cover"> <img src="{{ $testimonial->get_avatar() }}" alt="" /> </div>
                                        <div class="body">
                                            <h3 class="name">{{ $testimonial->name }}</h3>
                                            <div class="contact"><span>review for</span> <a href="#" class="link">{{ $testimonial->designation }}</a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section> <!-- /.section-reviews -->
        @endif
    </main>
@endsection
