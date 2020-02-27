<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ isset($job)?$job->title:old('title') }}" required>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="industry">Industry</label>
            <select name="industry_id" id="industry_id" class="form-control" required>
                <option value="">Select a Industry</option>
                @foreach($industries as $industry)
                    <option value="{{ $industry->id }}" {{ isset($job)?$job->industry_id == $industry->id ?'selected':'':'' }}>{{ $industry->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="job_level">Job Level</label>
            <select name="job_level" id="job_level" class="form-control" required>
                <option value="">Select Job Level</option>
                <option value="Internship" {{ isset($job)?$job->job_level == 'Internship'?'selected':'':'' }}>Internship</option>
                <option value="Fresher" {{ isset($job)?$job->job_level == 'Fresher'?'selected':'':'' }}>Fresher</option>
                <option value="Mid Level" {{ isset($job)?$job->job_level == 'Mid Leve'?'selected':'':'' }}>Mid Level</option>
                <option value="Senior Level" {{ isset($job)?$job->job_level == 'Senior Level'?'selected':'':'' }}>Senior Level</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="job_type">Job Type</label>
            <select name="job_type" id="job_type" class="form-control" required>
                <option value="">Select Job Type</option>
                <option value="Freelance" {{ isset($job)?$job->job_type == 'Freelance'?'selected':'':'' }}>Freelance</option>
                <option value="Contract" {{ isset($job)?$job->job_type == 'Contract'?'selected':'':'' }}>Contract</option>
                <option value="Part Time" {{ isset($job)?$job->job_type == 'Part Time'?'selected':'':'' }}>Part Time</option>
                <option value="Full Time" {{ isset($job)?$job->job_type == 'Full Time'?'selected':'':'' }}>Full Time</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ isset($job)?$job->location:old('location') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="vacancy">Number of Vacancy</label>
            <input type="number" name="vacancy" class="form-control" min="1" value="{{ isset($job)?$job->vacancy:old('vacancy') }}" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="text" name="deadline" id="deadline" class="form-control" value="{{ isset($job)?date('Y-m-d',strtotime($job->deadline)):old('deadline') }}" required>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" required>
        {!! isset($job)?$job->description:old('description') !!}
    </textarea>
</div>
<div class="form-group">
    <label for="specification">Specification</label>
    <textarea name="specification" class="form-control" required>
        {!! isset($job)?$job->specification:old('specification') !!}
    </textarea>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="salary_type">Salary Type</label>
            <select name="salary_type" id="salary_type" class="form-control" required>
                <option value="Negotiable" {{ isset($job)?$job->salary_type == 'Negotiable'?'selected':'':'' }}>Negotiable</option>
                <option value="Fixed" {{ isset($job)?$job->salary_type == 'Fixed'?'selected':'':'' }}>Fixed</option>
                <option value="Range" {{ isset($job)?$job->salary_type == 'Range'?'selected':'':'selected' }}>Range</option>
            </select>
        </div>
    </div>
    <div class="col-md-4" id="min-salary">
        <div class="form-group">
            <label for="min_salary">Min. Salary</label>
            <input type="number" name="min_salary" value="{{ isset($job)?$job->min_salary:old('min_salary') }}" class="form-control" >
        </div>
    </div>
    <div class="col-md-4" id="max-salary">
        <div class="form-group">
            <label for="max_salary">Max. Salary</label>
            <input type="number" name="max_salary" value="{{ isset($job)?$job->max_salary:old('max_salary') }}" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="experience">Experience Level</label>
            <select name="experience" id="experience" class="form-control" required>
                <option value="" {{ isset($job)?'':'selected' }}>Select Required Experience</option>
                <option value="Not Required" {{ isset($job)?$job->experience == 'Not Required'?'selected':'':'' }}>Not Required</option>
                <option value="Less than 1 year" {{ isset($job)?$job->experience == 'Less than 1 year'?'selected':'':'' }}>Less than 1 year</option>
                <option value="More than or equals to 1 years" {{ isset($job)?$job->experience == 'More than or equals to 1 years'?'selected':'':'' }}>More than or equals to 1 years</option>
                <option value="More than or equals to 3 years" {{ isset($job)?$job->experience == 'More than or equals to 3 years'?'selected':'':'' }}>More than or equals to 3 years</option>
                <option value="More than or equals to 5 years" {{ isset($job)?$job->experience == 'More than or equals to 5 years'?'selected':'':'' }}>More than or equals to 5 years</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="education">Education Required</label>
            <input type="text" name="education" class="form-control" value="{{ isset($job)?$job->education:old('education') }}" required>
        </div>
    </div>

</div>
