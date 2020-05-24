<div class="tabcontent" id="job">
        <div class="col-md-12 swap-bottom">
            <div class="widget widget-recentproperties" id="jobs">
                <div class="row result-container row-flex">
                    @php
                        $jobs = $listing->jobs()->where('status', 'Active')->paginate(5);
                    @endphp
                    @foreach($jobs as $job)
                        <div class="col-xs-12">
                            <div class="thumbnail thumbnail-property thumbnail-property-list nohover">
                                <div class="caption">
                                    <div class="header">
                                        <div class="left">
                                            <h2 class="thumbnail-title"><a href="listing.php">{{ $job->title }}</a></h2>
                                            <div class="options"><span class="thumbnail-ratings"><b> {{ $job->vacancy }} Vacancies </b></span>
                                                <span class="type"> {{ $job->location }} </span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="address">{{ date('d-M, Y', strtotime($job->deadline)) }}</div>
                                        </div>
                                    </div>
                                    <ul class="list-comment">
                                        <li>
                                            {!! \Illuminate\Support\Str::limit($job->description, 200) !!}
                                            <a href="#">View</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <button id="loadMoreJob" data-page="2" data-link="{{ $jobs->resolveCurrentPath() }}?page=" data-div="#jobs>.row" class="btn btn-custom btn-custom-secondary" >See
                        more results</button>
                </div>
            </div>
        </div>

</div>
