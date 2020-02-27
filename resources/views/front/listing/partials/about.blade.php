<div class="tabcontent" id="about">
    <div class="widget-styles">
        <div class="content-box">
            {!! $listing->description !!}
        </div>
    </div>
    {{--<div class="widget-styles widget-animities">--}}
    {{--<div class="content-box">--}}
    {{--<ul class="list-animities">--}}
    {{--<li><i class="ion-card"></i>Accepts Credit Cards</li>--}}
    {{--<li><i class="ion-ios-paw"></i>Pets Friendly</li>--}}
    {{--<li><i class="ion-pricetag"></i>Offering a Deal</li>--}}
    {{--<li><i class="ion-android-car"></i>Parking</li>--}}
    {{--<li><i class="ion-android-wifi"></i>Wireless Internet</li>--}}
    {{--<li><i class="ion-social-apple"></i>Apple Pay</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="widget-styles">
        <div class="header content t-left">
            <h2>Reviews & Tips</h2>
        </div>
        <ul class="list-reviews">
            @foreach($listing->reviews->where('status', 'Active') as $review)
                <li class="content-box">
                    <a href="javascript:"> <img src="{{ $review->user->get_avatar() }}" alt="{{ $review->user->full_name() }}"/> </a>
                    <div class="list-reviews-body">
                        <div class="list-reviews-title">
                            <h2><a href="page_profile.html">{{ $review->user->full_name() }}</a></h2>
                        </div>
                        <div class="raiting"><i class="icon-star-ratings-{{ $review->rating }}"></i></div>
                        <div class="description">{{ $review->comment }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>


    </div>
</div>