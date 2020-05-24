<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_name">Organization Name</label>
            <input type="text" name="title" class="form-control"
                   value="{{ isset($company->title)?$company->title:old('title') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_email">Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ isset($company->email)?$company->email:old('email') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_address">Address</label>
            <input type="text" name="address" class="form-control"
                   value="{{ isset($company->address)?$company->address:old('address') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="province_id">Province</label>
            <select name="province_id" id="province_id" class="form-control" required>
                <option value="">Select Province</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->id }}" {{ isset($company)?$company->province_id == $province->id?'selected':'':'' }}>{{ $province->province_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="district_id">District</label>
            <select name="district_id" id="district_id" class="form-control" required>

            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="municipal_id">Municipal</label>
            <select name="municipal_id" id="municipal_id" class="form-control" required>

            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_phone">Phone no.</label>
            <input type="number" name="phone" class="form-control"
                   value="{{ isset($company->phone)?$company->phone:old('phone') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_mobile">Mobile no.</label>
            <input type="number" name="mobile" class="form-control"
                   value="{{ isset($company->mobile)?$company->mobile:old('mobile') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_fax">Fax</label>
            <input type="number" name="fax" class="form-control"
                   value="{{ isset($company->fax)?$company->fax:old('fax') }}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="company_description">Company Description</label>
            <textarea name="description" id="description" cols="30" rows="10" required>
                {!! isset($company->description)?$company->description:old('description') !!}
            </textarea>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_website">Website</label>
            <input type="url" name="website" class="form-control"
                   value="{{ isset($company->website)?$company->website:old('website') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_total_employees">Total Employees</label>
            <input type="number" name="total_employees" class="form-control"
                   value="{{ isset($company->total_employees)?$company->total_employees:old('total_employees') }}"
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_branches">Branches</label>
            <input type="number" name="branches" class="form-control"
                   value="{{ isset($company->branches)?$company->branches:old('branches') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_branches">Industry</label>
            <select name="industry_id" class="form-control" id="industry_id" required>
                <option value="">Select Industry</option>
                @foreach($industries as $industry)
                    <option value="{{$industry->id}}"
                            {{isset($company->industry_id)?($company->industry_id == $industry->id?'selected':''):''}}>
                        {{ $industry->title }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_ownership">Ownership Type</label>
            <select name="ownership" class="form-control" id="ownership" required>
                <option value="">Select Type</option>
                <option value="Private"
                        {{isset($company->ownership)?($company->ownership == 'Private'?'selected':''):''}}>
                    Private
                </option>
                <option value="Public"
                        {{isset($company->ownership)?($company->ownership == 'Public'?'selected':''):''}}>
                    Public
                </option>
                <option value="Government"
                        {{isset($company->ownership)?($company->ownership == 'Government'?'selected':''):''}}>
                    Government
                </option>
                <option value="NGO"
                        {{isset($company->ownership)?($company->ownership == 'NGO'?'selected':''):''}}>
                    NGO
                </option>
                <option value="INGOS"
                        {{isset($company->ownership)?($company->ownership == 'INGOS'?'selected':''):''}}>
                    INGOS
                </option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="company_established_date">Established Date</label>
            <input type="text" class="form-control" id="datepicker" name="established_date"
                   value="{{ isset($company->established_date)?$company->established_date:'' }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="company_logo">Company Logo</label>
            <input type="file" class="form-control-file" name="logo">
        </div>
        @if(isset($company) && isset($company->logo))
            <img src="{{ $company->get_logo() }}" alt="{{ $company->title }}" style="width: 100px;">
        @endif
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="company_cover">Cover Image</label>
            <input type="file" class="form-control-file" name="cover_image">
        </div>
        @if(isset($company) && isset($company->cover_image))
            <img src="{{ $company->get_cover_image() }}" alt="{{ $company->title }}" style="width: 100%;">
        @endif
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="company_cover">Embed Google Map</label>
            <input type="text" class="form-control" value="{{ isset($company->map)?$company->map:old('map') }}" name="map" placeholder='<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.276891975016!2d85.29111309519689!3d27.709031933725658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1579239653448!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>'>
        </div>
        @if(isset($company) && isset($company->map))
            {!! $company->map !!}
        @endif
    </div>
    <input type="hidden" value="{{ $company->employers_id }}" name="employers_id">


</div>
