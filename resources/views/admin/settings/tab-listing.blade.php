<div class="tab-pane" id="listing">
    <div class="col-md-10" style="margin-top:20px;">
        <div class="form-group{{ $errors->has('listing_categories') ? ' has-error' : '' }}">
            <label for="listing_categories" class="col-sm-2 control-label">Listing Categories <br><small>(Any 5)</small></label>
            <div class="col-sm-10">
                <select name="listing_categories[]" id="listing_categories" multiple="multiple" style="width: 100%">
                    @php
                        $listing_categories = json_decode(getConfiguration('listing_categories'));
                    @endphp
                    @foreach($industries as $industry)
                        <option value="{{$industry->id}}" {{ in_array($industry->id, $listing_categories)?'selected':'' }}>
                            {{ $industry->title }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('company_name'))
                    <span class="help-block">
                        {{ $errors->first('company_name') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- /.tab-pane -->

