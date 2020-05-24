@extends('front.listing.master')
@section('styles')
    <style>
        .animated {
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }

        .stars
        {
            margin: 20px 0;
            font-size: 24px;
            color: #d17581;
        }
    </style>
@endsection
@section('content')
    <main class="main container container-palette">
        <div class="widget container container-palette listing-gallery">
            <div class="container">
                <div class="content">
                    <div class="row-s">
                        <div class="col-sm-12"><a href="{{ $listing->get_cover_image() }}" class="image-cover-div"><img
                                        src="{{ $listing->get_cover_image() }}" alt="{{ $listing->title }}"/></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="tabs-single-page">
            <div class="tab">
                <button class="tablinks active" onclick="openCategory(event, 'about')">About</button>
                <button class="tablinks" onclick="openCategory(event, 'gallery')">Gallery</button>
                <button class="tablinks" onclick="openCategory(event, 'service')">Services</button>
                <button class="tablinks" onclick="openCategory(event, 'events')">Events</button>
                <button class="tablinks" onclick="openCategory(event, 'job')">Job</button>
                <button class="tablinks" onclick="openCategory(event, 'notice')">Notice</button>
                <button class="tablinks" onclick="openCategory(event, 'contact')">Contact</button>
                <button class="tablinks dropdown-tab" onclick="dropdown_tab()">More</button>
                <div id="tabdropdown" class="dropdown-c">
                    <a href="javacript:" class="tablinks" onclick="opencategory(event, 'more1')">More1</a>
                    <a href="javacript:" class="tablinks" onclick="opencategory(event, 'more2')">More2</a>
                    <a href="javacript:" class="tablinks" onclick="opencategory(event, 'more2')">More3</a>
                </div>
            </div>
        </div>
        <div class="widget container container-palette widget-listing-title">
            <div class="container wb">
                <div class="options">
                    <div class="type-box">
                        <img src="{{ $listing->get_logo()  }}" alt="{{ $listing->title }}" style="width: 120px;">
                    </div>
                    <div class="options-body">
                        <h1 class="title">{{ $listing->title }}</h1>
                        <div class="ratings"> {{ $listing->avgReview() }} <i class="icon-star-ratings-{{ $listing->avgReview() }}"></i></div>
                        <div class="types"> {{ $listing->industry->title }} </div>
                    </div>
                </div>
                <div class="actions">
                    <a href="#write_review" class="btn btn-custom-s btn-custom-secondary">
                        <i class="ion-ios-star"></i>
                        Write a Review
                    </a>
                    @if(Auth::check())
                        <a href="javascript:" data="{{ $listing->id }}" id="add_to_favorites" class="btn btn-custom-s btn-custom-default saveListing">
                            <i class="ion-heart"></i>
                            Save
                        </a>
                    @else
                        <a href="javascript:" id="add_to_favorites" class="btn btn-custom-s btn-custom-default" data-toggle="modal" data-target="#login-modal">
                            <i class="ion-heart"></i>
                            Save
                        </a>
                    @endif
                    <a class="btn btn-custom-s btn-custom-default" href="https://www.facebook.com/share.php?u=http://test.com&amp;title=" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                        <i class="ion-share"></i>
                        Share
                    </a>
                </div>
            </div>
        </div>
        <div class="container container-palette widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        @include('front.listing.partials.about')
                        @include('front.listing.partials.gallery')
                        @include('front.listing.partials.service')
                        @include('front.listing.partials.event')
                        @include('front.listing.partials.job')
                        @include('front.listing.partials.notice')
                        @include('front.listing.partials.contact')
                        <div class="widget-styles" style="margin-top: 10px;">
                            <div class="caption-title t-left content" id="write_review">Rate and Write a Review
                            </div>
                            @if(Auth::check())
                                <div class="content-box">
                                    <form action="{{ route('front.review.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <div class="rating-action">
                                                        <div class="stars starrr" data-rating="0"></div>
                                                    </div>
                                                    Select Your Rating
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <input id="ratings-hidden" name="rating" type="hidden" value="0">
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="company_id" value="{{ $listing->id }}">
                                                <div class="form-group">
                                                            <textarea name="comment" required class="form-control"
                                                                      rows="10" placeholder="Help other to choose perfect place"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cliearfix">
                                            <button type="submit" id="submit_review"
                                                    class="btn btn-custom btn-custom-secondary">Submit Review
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="content-box">
                                    <h4>Login to add review.</h4>
                                    <div>
                                        <a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-info">Login/Register</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget widget-styles widget-form">
                            <h2 class="widget-title text-center content">Is This Your Business?</h2>
                            <div class="content-box">
                                <a href="" class="btn btn-claim"> Claim</a>
                                <a href="" class="btn btn-claim"> Improve Listing</a>
                            </div>
                        </div>
                        @if(count($relatedListings)>0)
                            <div class="widget widget-other-location">
                                <h2 class="widget-title content t-left">You might also like</h2>
                                <div class="content">
                                    @foreach($relatedListings as $listing)
                                        <div class="location-box">
                                            <a href="{{ route('front.listing.show', $listing->slug) }}" class="preview-image image-cover-div">
                                                <img src="{{ $listing->get_logo() }}" alt="{{ $listing->title }}"/></a>
                                            <div class="location-box-content">
                                                <h3 class="title"><a href="{{ route('front.listing.show', $listing->slug) }}">{{ $listing->title }}</a></h3>
                                                <div class="ratings"> {{ $listing->avgReview() }} <i class="icon-star-ratings-{{ $listing->avgReview() }}"></i></div>
                                                <div class="types">{{ $listing->industry->title }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

        var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

        $(function(){

            $('#new-review').autosize({append: "\n"});

            var reviewBox = $('#post-review-box');
            var newReview = $('#new-review');
            var openReviewBtn = $('#open-review-box');
            var closeReviewBtn = $('#close-review-box');
            var ratingsField = $('#ratings-hidden');

            openReviewBtn.click(function(e)
            {
                reviewBox.slideDown(400, function()
                {
                    $('#new-review').trigger('autosize.resize');
                    newReview.focus();
                });
                openReviewBtn.fadeOut(100);
                closeReviewBtn.show();
            });

            closeReviewBtn.click(function(e)
            {
                e.preventDefault();
                reviewBox.slideUp(300, function()
                {
                    newReview.focus();
                    openReviewBtn.fadeIn(200);
                });
                closeReviewBtn.hide();

            });

            $('.starrr').on('starrr:change', function(e, value){
                ratingsField.val(value);
            });
        });
    </script>
    <script>
        $('.saveListing').on('click', function(){
           var id = $(this).attr('data');
           var url = '{{ route('front.listing.saveListing', ':id') }}';
           url = url.replace(':id', id);
           $.ajax({
               type: 'post',
               url: url,
               data: {
                   '_token' : '{{ csrf_token() }}',
               },
               success: function (data) {
                   console.log(data);
                   console.log(data.message);
               }
           })
        });
    </script>
    <script>
        //For Event
           $('#loadMoreEvent').on('click', function (){
               var $div = $($(this).attr('data-div')); //div to append
               var $link = $(this).attr('data-link')
               var $page = $(this).attr('data-page'); //get the next page #
               var $href = $link + $page; //complete URL
               $.ajax({
                  type: 'get',
                  url: $href,
                  beforeSend: function(){
                      $('#loadMoreEvent').html('Loading....');
                  },
                  success: function (data) {
                      var $html = $(data).find('#events > .row').html();
                      if($($html)[0] == undefined){
                          $('#loadMoreEvent').parent().html('<h3>Opps!!! No more results found.</h3>');
                      }else{
                          $div.append($html);
                          $('#loadMoreEvent').attr('data-page', (parseInt($page) + 1));
                          $('#loadMoreEvent').html('See more results');
                      }
                  },
                  error: function (error) {
                      $('#loadMoreEvent').parent().html('<h3>Opps!!! No more results found.</h3>');
                  }
               });
           });

           //For Jobs
           $('#loadMoreJob').on('click', function (){
               var $div = $($(this).attr('data-div')); //div to append
               var $link = $(this).attr('data-link')
               var $page = $(this).attr('data-page'); //get the next page #
               var $href = $link + $page; //complete URL
               $.ajax({
                  type: 'get',
                  url: $href,
                  beforeSend: function(){
                      $('#loadMoreJob').html('Loading....');
                  },
                  success: function (data) {
                      var $html = $(data).find('#jobs > .row').html();
                      if($($html)[0] == undefined){
                          $('#loadMoreJob').parent().html('<h3>Opps!!! No more results fount.</h3>');
                      }else{
                          $div.append($html);
                          $('#loadMoreJob').attr('data-page', (parseInt($page) + 1));
                          $('#loadMoreJob').html('See more results');
                      }
                  },
                  error: function (error) {
                      $('#loadMoreJob').parent().html('<h3>Opps!!! No more results fount.</h3>');
                  }
               });
           });

           //For Notice
           $('#loadMoreNotice').on('click', function (){
               var $div = $($(this).attr('data-div')); //div to append
               var $link = $(this).attr('data-link')
               var $page = $(this).attr('data-page'); //get the next page #
               var $href = $link + $page; //complete URL
               $.ajax({
                  type: 'get',
                  url: $href,
                  beforeSend: function(){
                      $('#loadMoreNotice').html('Loading....');
                  },
                  success: function (data) {
                      var $html = $(data).find('#notices > .row').html();
                      if($($html)[0] == undefined){
                          $('#loadMoreNotice').parent().html('<h3>Opps!!! No more results fount.</h3>');
                      }else{
                          $div.append($html);
                          $('#loadMoreNotice').attr('data-page', (parseInt($page) + 1));
                          $('#loadMoreNotice').html('See more results');
                      }
                  },
                  error: function (error) {
                      $('#loadMoreNotice').parent().html('<h3>Opps!!! No more results fount.</h3>');
                  }
               });
           });
    </script>
@endsection
