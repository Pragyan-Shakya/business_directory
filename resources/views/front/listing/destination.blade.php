@extends('front.listing.master')
@section('content')
    <div class="section-search-area section container container-palette mask-grey" data-parallax="scroll" data-image-src="assets/img/architecture-buildings-church-338515.jpg">
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
                    <h2 class="title">All Destinations</h2>
                    {{--<span class="subtitle">Maecenas mauris arcu, congue ac lorem vel libero.</span>--}}
                </div>
                <div class="row">
                    <div class="col-md-12 swap-bottom left-side">
                        <div id="products" class="row list-group">
                            @foreach($destinations as $key => $destination)
                                <div class="col-md-3 mt-1">
                                    <div class="inner-image">
                                        <div class="imageininner">
                                            @if($destination->image)
                                                <a href="{{ route('front.destination.show', $destination->id) }}"> <img src="{{ $destination->get_image() }}" alt="{{ $destination->district_name }}"></a>
                                            @else
                                                <a href="{{ route('front.destination.show', $destination->id) }}"> <img src="{{ asset('public/assets/uploads/default_designation.jpg') }}" alt="{{ $destination->district_name }}"></a>
                                            @endif
                                        </div>
                                        <div class="imageintext">
                                            <a href="{{ route('front.destination.show', $destination->id) }}">
                                                <h3 class="text-center">{{ $destination->district_name }}</h3>
                                            </a>
                                            <a href="{{ route('front.destination.show', $destination->id) }}">
                                                <p class="text-center">{{ $destination->companies()->count() }} Listings</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <div style="margin: auto">
                                    {{ $destinations->links() }}
                                </div>
                            </div>
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
