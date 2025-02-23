<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        
        $experienceOptions = arrayToAccosArray(Job::$experience) ;
        $categoryOptions =   arrayToAccosArray(Job::$categories);
        
        $jobs = Job::filter([])->with('employer'); 
        


        return view('jobs.index', ['jobs' => $jobs->paginate(10),'experienceOptions'=> $experienceOptions,"categoryOptions" => $categoryOptions]);
    }

    public function applyView(Job $job)
    {
       return view('jobs.apply',['job'=>$job]);
    }
    public function apply(Job $job,Request $request)
    {
       $validated = $request->validate([
        'expected_salary' =>'required|min:1|max:200000'
       ]);
       if($job->hasApplied($request->user())){
         return redirect()->route( 'jobs.show',$job)->with('error', "You already applied for this job!");
       }

       $job->jobApplications()->create([
        'user_id' => $request->user()->id,
        ...$validated
       ]);
       return redirect()->route('jobs.show',$job)->with('success', 'Successfully Applied to the job!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
       
       
        return view('jobs.show', ['job' => $job->load('employer.jobs')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
