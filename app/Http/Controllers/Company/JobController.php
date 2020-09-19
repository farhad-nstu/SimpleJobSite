<?php

namespace App\Http\Controllers\Company;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Applicant;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(5);
        return view('company.job.index', compact('jobs'));
    }

    public function create()
    {
         return view('company.job.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'country' => 'required',
            'deadline' => 'required'
        ]);

        $job = new Job();

        $job->title = $request->title;
        $job->description = $request->description;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->country = $request->country;
        $job->deadline = $request->deadline;

        $job->save();
        return redirect(route('job.create'))->with('message', 'New job post is stored successfully');
    }

    public function edit($id)
    {
        $job = Job::find($id);
        return view('company.job.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        $job->title = $request->title;
        $job->description = $request->description;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->country = $request->country;
        $job->deadline = $request->deadline;

        $job->save();
        return redirect(route('job.index'))->with('message', 'Job post is updated successfully');
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
        return redirect()->back()->with('message', 'Job is deleted successfully');
    }

    public function view_applicant($id)
    {
        $applicant = Applicant::find($id);
        $jobs = Job::all(); 
        return view('company.view_applicant', compact('applicant', 'jobs'));
    }

    public function applicant_destroy($id)
    {
        $applicant = Applicant::find($id);
        $applicant->delete();
        return redirect()->back()->with('message', 'Applicant is deleted successfully');
    }

    public function view_resume($id)
    {
        $applicant = Applicant::find($id);
        $resume = $applicant->resume;
        return view('company.applicant_resume', compact('resume'));
    }
}
