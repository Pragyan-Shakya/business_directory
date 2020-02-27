<footer class="footer container container-palette">
    <div class="footer-content section">
        <div class="container">
            <div class="row footer-results">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4 f-box">
                            <div class="col-bottom">
                                <div class="title">Company Info</div>
                                <ul class="list-no">
                                    <li>About Us</li>
                                    <li>Our Listings</li>
                                    <li>Contact Us</li>
                                    <li>How We Work?</li>
                                    <li>Why Us?</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 f-box">
                            <div class="col-top">

                                <div class="title">Services</div>
                                <ul class="list-no">
                                    <li>Find Places</li>
                                    <li>Report Lost</li>
                                    <li>Find Job</li>
                                    <li>Classified</li>
                                    <li>Find Events</li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-4 f-box">
                            <div class="col-bottom">
                                <div class="title">Job Board</div>
                                <ul class="list-no">
                                    <li>Privacy Policy</li>
                                    <li>Terms & Condition</li>
                                    <li>Legal Notice</li>
                                    <li>Our Pricing</li>
                                    <li>Support</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14130.946795029693!2d85.34463115!3d27.694531700000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1560157408332!5m2!1sen!2snp" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 footer-social">
                    <ul class="list-social">
                        <li><a href="" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="facebook"><i class="typcn typcn-social-facebook"></i></a></li>
                        <li><a href=""><i class="typcn typcn-social-youtube"></i></a></li>
                        <li><a href=""><i class="typcn typcn-social-linkedin"></i></a></li>
                        <li><a href=""><i class="typcn typcn-social-google-plus"></i></a></li>
                        <!--  <li><a href="" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="twitter"><i class="fa fa-youtube"></i></a></li> -->

                    </ul>
                </div>
                <div class="col-md-6 copyright">
                    <span>&#169; &nbsp; Notice Bank 2019. Powered By in <a href="javascript:">Next Aussie Tech.</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /.footer -->
<!-- Back To Top -->
<div class="section">
</div>
<div class="section">
</div>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<div class="modal fade modal-form" id="login-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Log in to Directory</h4>
            </div>
            <div id="errors"></div>
            <div class="modal-body search-form">
                <form>
                    <div class="form-group"> <input type="text" class="form-control" id="user_email" name="mail" placeholder="Email" required /> </div>
                    <div class="form-group"> <input type="password" class="form-control" id="user_password" name="password" placeholder="Password" required /> </div>
                    <div class="form-group"> <button type="button" id="login_btn" onclick="ajax_login()" class="btn btn-custom btn-custom-secondary btn-wide">Sign In</button> </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group"> <a href="#" id="login_fb" class="btn btn-custom btn-custom-primary btn-wide" >Log In With Facebook</a> </div>
                <div class="bottom-actions"> New to Notice Bank? <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#creataccount-modal" class="link">Create an account</a> </div>
                <div class="bottom-actions"> Forgot Password? <a href="{{ route('password.request') }}" class="link">Reset password</a> </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade modal-form" id="creataccount-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Sign Up for Notice Bank</h4>
            </div>
            <div class="modal-body search-form">
                <form>
                    <div class="form-group"> <input type="text" class="form-control" name="name" placeholder="Name" /> </div>
                    <div class="form-group"> <input type="email" class="form-control" name="mail" placeholder="Email Address" /> </div>
                    <div class="form-group"> <button type="button" class="btn btn-custom btn-custom-secondary btn-wide">Create Account</button> </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group"> <a href="#" class="btn btn-custom btn-custom-primary btn-wide">Sign Up With Facebook</a> </div>
                <div class="bottom-actions"> Already on Notice Bank?<a href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-dismiss="modal" data-target="#login-modal" class="link">Log In</a> </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade modal-form" id="forgot-password-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Forgot Password</h4>
            </div>
            <p class="notice">Please enter your email address and we will send you an email about how to reset your password.</p>
            <div class="modal-body search-form">
                <form>
                    <div class="form-group"> <input type="email" class="form-control" name="mail" placeholder="Email Address" /> </div>
                    <div class="form-group"> <button type="button" class="btn btn-custom btn-custom-secondary btn-wide">Reset Password</button> </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<div class="se-pre-con"></div>
<script src="{{ asset('public/assets/user/assets/js/jquery-2.2.1.min.js') }}"></script>
<script async src='{{ asset('public/assets/user/assets/cache/js.min.js') }}'></script>
<script src='{{ asset('public/assets/user/assets/js/owl.carousel.min.js') }}'></script>
<script src="{{ asset('public/assets/user/assets/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('public/assets/user/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('public/assets/user/assets/js/simple-list-grid.js') }}" charset="utf-8"></script>
<script src="http://maps.googleapis.com/maps/api/js?v=3&amp;libraries=weather,geometry,visualization,places,drawing&amp;&amp;key=AIzaSyAqLlMqwv4wpy6cfSBGJddPpyoZ_eP14Kc" type="text/javascript"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        dots: false,
        autoplayHoverPause: true,
        autoplay: true,
        autoplayTimeout: 2000,
        navText: ["<img src='{{ asset('public/assets/user/assets/img/left-arrow.png') }}'>","<img src='{{ asset('public/assets/user/assets/img/right-arrow.png') }}'>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>
<script>
    function dropdown_btn() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
    function dropdown_tab() {
        document.getElementById("tabdropdown").classList.toggle("show");
    }
    window.onclick = function(event) {
        if (!event.target.matches('.btn-gridbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-tab')) {
            var dropdowns = document.getElementsByClassName("dropdown-c");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
<script>
    function openCategory(evt, catName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(catName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementsByClassName('tablinks')[0].click();
</script>
<script>
    var rangeSlider = function(){
        var slider = $('.range-slider'),
            range = $('.range-slider__range'),
            value = $('.range-slider__value');

        slider.each(function(){

            value.each(function(){
                var value = $(this).prev().attr('value');
                $(this).html("Rs.&nbsp;"+ value +"&nbsp;/-");
            });

            range.on('input', function(){
                $(this).next(value).html("Rs.&nbsp;"+this.value +"&nbsp;/-");
            });
        });
    };

    rangeSlider();
</script>
<script>
    $('#advance-check').change(function() {
        $('.advance-search').fadeToggle();
    });
</script>
<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>
<script>
    $(document).ready(function() {
        $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
        $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    });
</script>
<script>
    (function($) { "use strict";

        //Switch dark/light

        $(".switch").on('click', function () {
            if ($("body").hasClass("light")) {

                $(".switch").removeClass("switched");
            }
        });

        $(document).ready(function(){"use strict";

            //Scroll back to top

            var progressPath = document.querySelector('.progress-wrap path');
            var pathLength = progressPath.getTotalLength();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
            progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
            var updateProgress = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
            }
            updateProgress();
            $(window).scroll(updateProgress);
            var offset = 50;
            var duration = 550;
            jQuery(window).on('scroll', function() {
                if (jQuery(this).scrollTop() > offset) {
                    jQuery('.progress-wrap').addClass('active-progress');
                } else {
                    jQuery('.progress-wrap').removeClass('active-progress');
                }
            });
            jQuery('.progress-wrap').on('click', function(event) {
                event.preventDefault();
                jQuery('html, body').animate({scrollTop: 0}, duration);
                return false;
            })


        });

    })(jQuery);
</script>
<script>
    function ajax_login(){
        var email = $('#user_email').val();
        var password = $('#user_password').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ route('login') }}",
            data: {
                email: email,
                password: password,
            },
            beforeSend: function(){
                $('#login_btn').attr('disabled', 'disabled');
                $('#login_btn').html('Loading...');
            },
            success: function (data) {
                console.log(data);
                if(data.status == 'success'){
                    window.location.reload();
                }
            },
            error: function(data){
                $('#errors').html('<p style="color: red"><b>!!!'+data.responseJSON.message+'</b></p>');
                $('#user_email').val('').focus();
                $('#user_password').val('');
                $('#login_btn').removeAttr('disabled');
                $('#login_btn').html('Sign In');
            }
        })
    }
</script>
@yield('scripts')
</body>
</html>
