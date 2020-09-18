<?php

namespace App\Http\Controllers\Applicant;

use App\Job;
use App\Applicant;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
use Image;

class ProfileController extends Controller
{
    public function index($id)
    {
        $applicant = Applicant::find($id);
        // dd($applicant->first_name);
    	return view('applicant.profile.index', compact('applicant'));
    }

    public function edit($id)
    {
        return view('applicant.profile.edit');
    }

     public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'image',
        ]);

        $user = Auth::guard('applicant')->user();

        


//         if (isset($image))
//         {
//             $currentDate = Carbon::now()->toDateString();
//             $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//             if (!Storage::disk('public')->exists('profile'))
//             {
//                 Storage::disk('public')->makeDirectory('profile');
//             }
// //            Delete old image form profile folder
//             if (Storage::disk('public')->exists('profile/'.$user->image))
//             {
//                 Storage::disk('public')->delete('profile/'.$user->image);
//             }
//             $profile = Image::make($image)->resize(500,500)->save(storage_path('app/public/profile').'/'.$imageName);
//             // Storage::disk('public')->put('profile/'.$imageName,$profile);
//         } else {
//             $imageName = $user->image;
//         }

//         if (isset($resume))
//         {
//             $currentDate = Carbon::now()->toDateString();
//             $resumeName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$resume->getClientOriginalExtension();
//             if (!Storage::disk('public')->exists('profile'))
//             {
//                 Storage::disk('public')->makeDirectory('profile');
//             }
// //            Delete old image form profile folder
//             if (Storage::disk('public')->exists('profile/'.$user->resume))
//             {
//                 Storage::disk('public')->delete('profile/'.$user->resume);
//             }
//             // $profile = Image::make($image)->resize(500,500)->save();
//             Storage::disk('public')->put('profile/'.$resumeName);
//         } else {
//             $resumeName = $user->resume;
//         }
        $user = Applicant::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->resume =  $request->resume;
        $user->skill =  $request->skill;

        $image = $request->file('image');        
        if($image) {
            $random = mt_rand(10000, 99999);
            $imageName  = $random.'1'.'.'.$image->getClientOriginalExtension();
            $directory  = 'profile/images/';
            $image->move($directory, $imageName);
            $user->image    = $directory.$imageName;               
        }

        $resume = $request->file('resume');
        if($resume) {
            $random = mt_rand(10000, 99999);
            $resumeName  = $random.'1'.'.'.$resume->getClientOriginalExtension();
            $directory  = 'profile/resumes/';
            $resume->move($directory, $resumeName);
            $user->resume    = $directory.$resumeName;               
        }

        $user->update();

        return redirect(route('profile.index', $user->id))->with('message', 'profile update successfully');
    }

    public function show(){
    	$jobs = job::all();
    	return view('applicant.profile.showjob',compact('jobs'));
    }

    public function job_apply($user_id, $job_id)
    {
        $applicant = Applicant::find($user_id);
        if($applicant->resume){
            $applicant->is_applied = 1;
            $applicant->job_id = $job_id;
            $applicant->update();
            return redirect(route('profile.showjob'))->with('message', 'Applied successfully');
        } else {
            return redirect(route('profile.edit', $user_id))->with('message', 'Upload your resume first!');
        }
        
    }



}
