<div class="tabcontent" id="notice">
    <div class="col-md-12 swap-bottom">
        <div class="widget widget-recentproperties" id="notices">
            <div class="row result-container row-flex">
                @php
                    $notices = $listing->notices()->where('status', 'Active')->paginate(5);
                @endphp
                @foreach($notices as $notice)
                    <div class="col-xs-12">
                        <div class="caption">
                            <div class="header">
                                <div class="left">
                                    <h2 class="thumbnail-title"><a href="javascript:">{{ $notice->title }}</a></h2>
                                </div>
                            </div>
                        </div>
                        <ul class="list-comment">
                            <li>
                                {!! $notice->description !!}
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <button id="loadMoreNotice" data-page="2" data-link="{{ $notices->resolveCurrentPath() }}?page=" data-div="#notices>.row" class="btn btn-custom btn-custom-secondary" >See
                    more results</button>
            </div>
        </div>
    </div>
</div>
