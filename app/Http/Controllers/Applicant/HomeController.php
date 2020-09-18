<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/applicant/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('applicant.auth:applicant');
    }

    /**
     * Show the Applicant dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('applicant.home');
    }

}