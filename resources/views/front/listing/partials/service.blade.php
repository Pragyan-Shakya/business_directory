<div class="tabcontent" id="service">
    <div class="row">
        <ul>
            @foreach($listing->services->where('status', 'Active') as $service )
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 Services-tab item">
                    <div class="folded-corner service_tab_1">
                        <div class="text">
                            <i class="fa {{ $service->icon }} fa-5x fa-icon-image"></i>
                            <p class="item-title">
                            <h3> {{ $service->title }}</h3>
                            {{ $service->description }}
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
</div>