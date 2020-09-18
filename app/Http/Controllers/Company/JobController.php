<?php

namespace App\Http\Controllers\Company;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Applicant;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(5);
        return view('company.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('company.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'country' => 'required',
        ]);

         $job = new Job();

        $job->title = $request->title;
        $job->description = $request->description;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->country = $request->country;

         $job->save();
          return redirect(route('job.create'))->with('message', 'New job post is stored successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return view('company.job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $job = Job::find($id);

        $job->title = $request->title;
        $job->description = $request->description;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->country = $request->country;

        $job->save();
        return redirect(route('job.index'))->with('message', 'New job post is stored successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        // dd($job);
        $job->delete();
        return redirect()->back()->with('message', 'Job is deleted successfully');
    }

    // public function get_applicants_list()
    // {
    //     $applicants = Applicant::orderBy('created_at', 'desc')->paginate(5);
    //     return view('company.applicants_list', compact('applicants'));
    // }

    public function show_applicant($id)
    {
        $applicant = Applicant::find($id);
        return view('company.view_applicant', compact('applicant'));
    }

    public function applicant_destroy($id)
    {
        $applicant = Applicant::find($id);
        $applicant->delete();
        return redirect()->back()->with('message', 'Applicant is deleted successfully');
    }
}
