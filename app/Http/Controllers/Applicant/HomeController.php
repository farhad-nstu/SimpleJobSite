<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Job;

class HomeController extends Controller
{

    protected $redirectTo = '/applicant/login';

    public function __construct()
    {
        $this->middleware('applicant.auth:applicant');
    }

    public function index() {
        $jobs = job::all();
        return view('applicant.home', compact('jobs'));
    }

}