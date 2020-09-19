<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Applicant;
use App\Job;

class HomeController extends Controller
{

    protected $redirectTo = '/company/login';

    public function __construct()
    {
        $this->middleware('company.auth:company');
    }

    public function index()
    {
        $jobs = Job::all();
        $applicants = Applicant::where('is_applied', 1)->orderBy('created_at', 'desc')->paginate(5);
        return view('company.home', compact('applicants', 'jobs'));
    }

}