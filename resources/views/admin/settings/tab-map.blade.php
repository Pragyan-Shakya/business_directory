<div class="tab-pane" id="map">
    <div class="form-group{{ $errors->has('google_map') ? ' has-error' : '' }}">
        <label for="facebook_link" class="control-label">Google Map</label>
        <input type="text" name="google_map" class="form-control" id="google_map"
               value="{{ getConfiguration('google_map') }}">
        @if ($errors->has('google_map'))
            <span class="help-block">
                {{ $errors->first('google_map') }}
            </span>
        @endif
    </div>

    <div class="form-group">
        {!!  getConfiguration('google_map')  !!}
    </div>

</div>
<!-- /.tab-pane -->