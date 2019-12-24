<div class="tab-pane" id="ad">
    {{--Banner 1--}}
    <div class="col-md-8" style="margin-top:20px;">
       <div class="form-group{{ $errors->has('banner_1') ? ' has-error' : '' }}">
            <label for="footer_logo" class="col-sm-2 control-label">Banner 1</label>
            <div class="col-sm-10">
                <input type="file" name="banner_1" id="footer_logo" class="form-control">
                @if ($errors->has('banner_1'))
                    <span class="help-block">
                        {{ $errors->first('banner_1') }}
                    </span>
                @endif

                @if(getConfiguration('banner_1'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('banner_1') }}"
                            class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{--Banner 2--}}
    <div class="col-md-8" style="margin-top:20px;">
       <div class="form-group{{ $errors->has('banner_2') ? ' has-error' : '' }}">
            <label for="footer_logo" class="col-sm-2 control-label">Banner 2</label>
            <div class="col-sm-10">
                <input type="file" name="banner_2" id="footer_logo" class="form-control">
                @if ($errors->has('banner_2'))
                    <span class="help-block">
                        {{ $errors->first('banner_2') }}
                    </span>
                @endif

                @if(getConfiguration('banner_2'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('banner_2') }}"
                            class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{--Banner 3--}}
    <div class="col-md-8" style="margin-top:20px;">
       <div class="form-group{{ $errors->has('banner_3') ? ' has-error' : '' }}">
            <label for="footer_logo" class="col-sm-2 control-label">Banner 3</label>
            <div class="col-sm-10">
                <input type="file" name="banner_3" id="footer_logo" class="form-control">
                @if ($errors->has('banner_3'))
                    <span class="help-block">
                        {{ $errors->first('banner_3') }}
                    </span>
                @endif

                @if(getConfiguration('banner_3'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('banner_3') }}"
                            class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{--Banner 4--}}
    <div class="col-md-8" style="margin-top:20px;">
       <div class="form-group{{ $errors->has('banner_4') ? ' has-error' : '' }}">
            <label for="footer_logo" class="col-sm-2 control-label">Banner 4</label>
            <div class="col-sm-10">
                <input type="file" name="banner_4" id="footer_logo" class="form-control">
                @if ($errors->has('banner_4'))
                    <span class="help-block">
                        {{ $errors->first('banner_4') }}
                    </span>
                @endif

                @if(getConfiguration('banner_4'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('banner_4') }}"
                            class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{--Banner For Featured--}}
    <div class="col-md-8" style="margin-top:20px;">
       <div class="form-group{{ $errors->has('banner_for_featured') ? ' has-error' : '' }}">
            <label for="footer_logo" class="col-sm-2 control-label">Banner for Featured</label>
            <div class="col-sm-10">
                <input type="file" name="banner_for_featured" id="footer_logo" class="form-control">
                @if ($errors->has('banner_for_featured'))
                    <span class="help-block">
                        {{ $errors->first('banner_for_featured') }}
                    </span>
                @endif

                @if(getConfiguration('banner_for_featured'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('banner_for_featured') }}"
                            class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{--Banner for Recommended--}}
    <div class="col-md-8" style="margin-top:20px;">
       <div class="form-group{{ $errors->has('banner_for_recommended') ? ' has-error' : '' }}">
            <label for="footer_logo" class="col-sm-2 control-label">Banner for Recommended</label>
            <div class="col-sm-10">
                <input type="file" name="banner_for_recommended" id="footer_logo" class="form-control">
                @if ($errors->has('banner_for_recommended'))
                    <span class="help-block">
                        {{ $errors->first('banner_for_recommended') }}
                    </span>
                @endif

                @if(getConfiguration('banner_for_recommended'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('banner_for_recommended') }}"
                            class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{--Wide Banner 1--}}
    <div class="col-md-8" style="margin-top:20px;">
       <div class="form-group{{ $errors->has('wide_banner_1') ? ' has-error' : '' }}">
            <label for="footer_logo" class="col-sm-2 control-label">Wide banner 1</label>
            <div class="col-sm-10">
                <input type="file" name="wide_banner_1" id="footer_logo" class="form-control">
                @if ($errors->has('wide_banner_1'))
                    <span class="help-block">
                        {{ $errors->first('wide_banner_1') }}
                    </span>
                @endif

                @if(getConfiguration('wide_banner_1'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('wide_banner_1') }}"
                            class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{--Wide Banner 2--}}
    <div class="col-md-8" style="margin-top:20px;">
       <div class="form-group{{ $errors->has('wide_banner_2') ? ' has-error' : '' }}">
            <label for="footer_logo" class="col-sm-2 control-label">Wide Banner 2</label>
            <div class="col-sm-10">
                <input type="file" name="wide_banner_2" id="footer_logo" class="form-control">
                @if ($errors->has('wide_banner_2'))
                    <span class="help-block">
                        {{ $errors->first('wide_banner_2') }}
                    </span>
                @endif

                @if(getConfiguration('wide_banner_2'))
                    <div class="mt-15 half-width">
                        <img src="{{ url('storage') . '/' . getConfiguration('wide_banner_2') }}"
                            class="thumbnail img-responsive">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
