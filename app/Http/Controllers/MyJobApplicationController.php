<?php

namespace App\Http\Controllers;

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
}
