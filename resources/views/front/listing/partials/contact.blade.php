<div class="tabcontent" id="contact">
    <div class="section widget-top-map container container-palette">
        <div class="contact-map">
            {!! $listing->map !!}
        </div>
    </div>
    <main class="">
        <div class="section container container-palette">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="widget body">
                            <h2>Leave a message</h2>
                            <h3>We'll get back to you soon!</h3>
                        </div>
                        <div class="widget body">
                            <form action="{{ route('front.listing.addContactMessage', $listing->id) }}" method="POST" class="local-form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group"><input type="text"
                                                                       class="form-control"
                                                                       name="name"
                                                                       placeholder="Your Name" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group"><input type="email"
                                                                       class="form-control"
                                                                       name="email"
                                                                       placeholder="Email" required/>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group"><textarea name="message"
                                                                          class="form-control"
                                                                          rows="10" placeholder="Your message" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="cliearfix text-center">
                                    <button type="submit"
                                            class="btn btn-custom btn-custom-secondary"> Send
                                        Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget widget-ads"><a href="#"><img
                                        src="{{ asset('public/assets/user/assets/img/placeholder/ads.jpg') }}" alt=""/></a></div>
                    </div>
                </div>
            </div>
        </div> <!-- /.section-form -->
    </main>
</div>