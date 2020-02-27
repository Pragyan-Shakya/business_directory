<div class="tabcontent" id="events">
    <div class="row">
        @php
            $events = $listing->events()->where('status', 'Active')->paginate(1);
        @endphp
        @foreach($events as $event )
            <div class="col-md-6">
                <div class="thumbnail">
                    <div class="overlay">
                        <a href=""><i class="fa fa-share md"></i></a>
                    </div>
                    <img class="img-responsive" alt="{{ $event->title }}"
                         src="{{ $event->get_image() }}">
                </div>
                <div class="row">
                    <div class="col-md-4 mtb-5">
                        <h3><span class="label label-info">{{ date('d-M, Y', strtotime($event->event_date)) }}</span></h3>
                    </div>
                    <div class="col-md-8 mtb-10">
                        <strong>{{ $event->title }}</strong><br>
                        <em>{{ $event->location }}</em><br>
                        {{--<span class="small">15:00</span>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center">
        <button id="loadMoreEvent" data-page="2" data-link="{{ $events->resolveCurrentPath() }}?page=" data-div="#events>.row" class="btn btn-custom btn-custom-secondary" >See
            more results</button>
    </div>
</div>
