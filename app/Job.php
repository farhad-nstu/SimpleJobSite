<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Applicant;
use App\Company;

class Job extends Model
{
    protected $fillable = [
        'title','description', 'salary', 'location', 'country',
    ];

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
