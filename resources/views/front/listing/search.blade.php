@extends('front.listing.master')
@section('content')
    <div class="section-search-area section container container-palette mask-grey" data-parallax="scroll" data-image-src="assets/img/architecture-buildings-church-338515.jpg">
        <!--<div id="map" class="map-bg"> </div>-->
        <div class="container">
            <div class="body">
                <div class="h-area">
                    <h1 class="title">Search more</h1>
                    <span class="subtitle">Looking for more options?</span>
                </div>
                <div class="mega-search">
                    <form action="{{ route('front.listing_search') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="keyword" placeholder="Keyword" value="{{ $keyword }}">
                            </div>
                            <div class="col-md-3">
                                <select name="industry" class="form-control">
                                    <option value="" >Select Industry</option>
                                    @foreach($industries as $industry)
                                        <option value="{{ $industry->slug }}" {{ $industry->slug == $search_industry?'selected':''}}>
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
                                    <select name="municipal" id="municipal_id" class="form-control">

                                    </select>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </header><!-- /.header -->
    <main class="zebra-childs">
        <section class="listing-category">
            <div class="container">
                <div class="section-title mt-3">
                    <h2 class="title">Search Result</h2>
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
                                                        <span class="type"> <a href="#">{{ $listing->industry->title }}</a> </span>
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
