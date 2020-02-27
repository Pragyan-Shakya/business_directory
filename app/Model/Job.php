<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_id',
        'industry_id',
        'title',
        'slug',
        'description',
        'specification',
        'vacancy',
        'location',
        'job_level',
        'job_type',
        'salary_type',
        'min_salary',
        'max_salary',
        'deadline',
        'education',
        'experience',
        'status',
        'view',
    ];
}
