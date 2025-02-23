<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    public function index(Request $request){
        $applications = $request->user()
        ->jobApplications()
        ->with(['job'=> fn( $query) =>  $query->withCount('jobApplications' )->withAvg('jobApplications',
        'expected_salary')
         ,'job.employer'])
        ->get(); 
        return view('my-job-applications.index',['applications' =>  $applications]);
    }
    public function destroy(Request $request,JobApplication $myJobApplication){
         
        $myJobApplication->delete();
        return redirect()->back()->with('success',"Successfully deleted job application!");
    }
}
