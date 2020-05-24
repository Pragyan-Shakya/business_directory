@extends('front.listing.master')
@section('content')
<div class="section-search-area section container container-palette mask-grey" data-parallax="scroll" style="background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('{{ asset(getConfiguration('front_banner')) }}') !important;" data-image-src="assets/img/architecture-buildings-church-338515.jpg">
    <!--<div id="map" class="map-bg"> </div>-->
    <div class="container">
        <div class="body">
            <div class="h-area">
                <h1 class="title">Place</h1>
                <span class="subtitle">We will help you to find the best possible items in this world .</span>
            </div>
            <div class="mega-search">
                <form action="{{ route('front.listing_search') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="keyword" placeholder="Keyword" >
                        </div>
                        <div class="col-md-3">
                            <select name="industry" class="form-control">
                                <option value="" >Select Industry</option>
                                @foreach($industries as $industry)
                                    <option value="{{ $industry->slug }}" >
                                        {{ $industry->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="rating" class="form-control">
                                <option value="">Select Star Rating</option>
                                <option value="5">5 Star Rating</option>
                                <option value="4">4 Star Rating</option>
                                <option value="3">3 Star Rating</option>
                                <option value="2">2 Star Rating</option>
                                <option value="1">1 Star Rating</option>
                            </select>

                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-search-submit">Search</button>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right">
                                <input type="checkbox" name="advancesearch" id="advance-check">  Advance Search
                            </div>
                        </div>
                        <div class="row advance-search">
                            <div class="col-md-4">
                                <select name="province_id" id="province_id" class="form-control">
                                    <option value="" >Select Province</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">
                                            {{ $province->province_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="location" id="district_id" class="form-control">

                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="municipal_id" id="municipal_id" class="form-control">

                                </select>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.section-search-area -->
</header><!-- /.header -->
<main class="zebra-childs">
    <section class="listing-category">
        <div class="container">
            <div class="section-title mt-3">
                <h2>Popular Destinations</h2>
                {{--<span class="subtitle">Maecenas mauris arcu, congue ac lorem vel libero.</span>--}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($top_destinations->chunk(2) as $top_destination)
                            @php
                                $i=0;
                            @endphp
                            <div class="item">
                                @foreach($top_destination as $key => $destination)
                                    @if($destination->image)
                                        <img src="{{ $destination->get_image() }}" alt="{{ $destination->district_name }}" class="{{ $i==1?'mt5':'' }}">
                                    @else
                                        <img src="{{ asset('public/assets/uploads/default_designation.jpg') }}" alt="{{ $destination->district_name }}" class="{{ $i==1?'mt5':''}}">
                                    @endif
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="section-title mt-3">
                <h2 class="title">{{ isset($title)?$title:'Listings' }}</h2>
                {{--<span class="subtitle">Maecenas mauris arcu, congue ac lorem vel libero.</span>--}}
            </div>
            <div class="row">
                <div class="col-md-8 swap-bottom left-side">
                    <div class="well well-sm">
                        <div class="btn-group">
                            <a href="#" id="list" class="btn btn-default btn-sm pull-right"><span class="glyphicon glyphicon-th-list">
                     </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm pull-right"><span
                                        class="glyphicon glyphicon-th"></span>Grid</a>
                        </div>
                    </div>
                    <div id="products" class="row list-group">
                        @foreach($listings as $key => $listing)
                            <div class="item  col-xs-4 col-lg-4">
                                <div class="thumbnail thumbnail-property nohover">
                                    <img class="group list-group-image thumbnail-image img-responsive" src="{{ $listing->get_logo() }}" alt="{{ $listing->name }}" />
                                    <div class="caption">
                                        <!--  <h2 class="group inner list-group-item-heading thumbnail-title">
                                           <a href="listing.php">Contraband Coffee Bar</a></h2> -->
                                        <div class="header">
                                            <div class="left">
                                                <h2 class="thumbnail-title"><a href="{{ route('front.listing.show', $listing->slug) }}">{{ $listing->title }}</a></h2>
                                                <div class="options"> <span class="thumbnail-ratings"> {{ $listing->avgReview() }} <i class="icon-star-ratings-{{ $listing->avgReview() }}"></i> </span>
                                                    <span class="type"> <a href="{{ route('front.industry.show', $listing->industry->slug) }}">{{ $listing->industry->title }}</a> </span>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="address">{{ $listing->address }}</div>
                                            </div>
                                        </div>
                                        <div class="group inner list-group-item-text">
                                            {!! \Illuminate\Support\Str::limit($listing->description, 500)  !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            <div style="margin: auto">
                                {{ $listings->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget-styles widget-other-location">
                        <h2 class="widget-title content-box t-left">Popular Posts</h2>
                        <div class="content-box">
                            <div class="location-box">
                                <a href="listing.php" class="preview-image image-cover-div"><img src="assets/img/pic/business/outdoor-restaurant.jpg" alt="" /></a>
                                <div class="location-box-content">
                                    <h3 class="title"><a href="listing.php">Best Coffee Bars</a></h3>
                                    <div class="types date"> April 11, 2017 </div>
                                </div>
                            </div>
                            <div class="location-box">
                                <a href="listing.php" class="preview-image image-cover-div"><img src="assets/img/pic/places/contraband-coffe.jpg" alt="" /></a>
                                <div class="location-box-content">
                                    <h3 class="title"><a href="listing.php">Party Hard on Weekends</a></h3>
                                    <div class="types date"> April 10, 2017 </div>
                                </div>
                            </div>
                            <div class="location-box">
                                <a href="listing.php" class="preview-image image-cover-div"><img src="assets/img/pic/places/meal.jpg" alt="" /></a>
                                <div class="location-box-content">
                                    <h3 class="title"><a href="listing.php">Perfect Sushi Place</a></h3>
                                    <div class="types date"> April 05, 2017 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-ads"> <a href="#"><img src="assets/img/placeholder/ads.jpg" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="category-foot">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="category1">
                                    <h4><strong></i>Business</strong></h4>
                                    <ul class="list-no">
                                        <li><a href="#">Kathmandu(1)</a></li>
                                        <li><a href="#">Bhaktapur(2)</a></li>
                                        <li><a href="#">Lalitpur(4)</a></li>
                                        <li><a href="#">Sunsari(5)</a></li>
                                        <li><a href="#">View All <i class="typcn typcn-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="category1">
                                    <h4><strong></i>Restaurants</strong></h4>
                                    <ul class="list-no">
                                        <li><a href="">Machinery(1)</a></li>
                                        <li><a href="">Handicraft(2)</a></li>
                                        <li><a href="">Bagpacks(3)</a></li>
                                        <li><a href="">Keys(4)</a></li>
                                        <li><a href="#">View All <i class="typcn typcn-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="category1">
                                    <h4><strong></i>Shopping Malls</strong></h4>
                                    <ul class="list-no">
                                        <li><a href="">Kathmandu(1)</a></li>
                                        <li><a href="">Janakpur(2)</a></li>
                                        <li><a href="">Hetauda(3)</a></li>
                                        <li><a href="">Chitwan(4)</a></li>
                                        <li><a href="#">View All <i class="typcn typcn-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="category1">
                                    <h4><strong></i>Hotels</strong></h4>
                                    <ul class="list-no">
                                        <li><a href="">Kathmandu(1)</a></li>
                                        <li><a href="">Solukhumbu(2)</a></li>
                                        <li><a href="">Sankhuwasabha(3)</a></li>
                                        <li><a href="">Jhapa(4)</a></li>
                                        <li><a href="#">View All <i class="typcn typcn-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="category1">
                                    <h4><strong></i>Clinics</strong></h4>
                                    <ul class="list-no">
                                        <li><a href="">One(1)</a></li>
                                        <li><a href="">Two(2)</a></li>
                                        <li><a href="">Three(3)</a></li>
                                        <li><a href="">Four(4)</a></li>
                                        <li><a href="#">View All <i class="typcn typcn-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="category1">
                                    <h4><strong></i>Salons</strong></h4>
                                    <ul class="list-no">
                                        <li><a href="">One(1)</a></li>
                                        <li><a href="">Two(2)</a></li>
                                        <li><a href="">Three(3)</a></li>
                                        <li><a href="">Four(4)</a></li>
                                        <li><a href="#">View All <i class="typcn typcn-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('scripts')
    <script>
        $('#province_id').on('change', function (e) {
            e.preventDefault();
            $('#district_id').html('');
            $('#municipal_id').html('');
            var provinceId = $(this).val();
            var districts = getDistrict(provinceId);
        });
        $('#district_id').on('change', function (e) {
            e.preventDefault();
            $('#municipal_id').html('');
            var districtId = $(this).val();
            var municiaps = getMunicipal(districtId);
        });
        function getDistrict(provinceId){
            $.ajax({
                type: 'get',
                url: '{{ route('getDistrict') }}',
                data: {
                    'province_id' : provinceId,
                },
                success: function(data){
                    var districtOptions = '<option value="">Select District</option>';
                    data.data.forEach(function (item, index) {
                        districtOptions += '<option value="'+item.id+'">'+item.district_name+'</option>';
                    });
                    $('#district_id').html(districtOptions);
                },
                error: function (error) {
                    console.error(error)
                }
            })
        }
        function getMunicipal(districtId){
            $.ajax({
                type: 'get',
                url: '{{ route('getMunicipal') }}',
                data: {
                    'district_id' : districtId,
                },
                success: function(data){
                    var municipalOptions = '<option value="">Select Municpals</option>';
                    data.data.forEach(function (item, index) {
                        municipalOptions += '<option value="'+item.id+'">'+item.municipal_name+'</option>';
                    });
                    $('#municipal_id').html(municipalOptions);
                },
                error: function (error) {
                    console.error(error)
                }
            })
        }
    </script>
@endsection
