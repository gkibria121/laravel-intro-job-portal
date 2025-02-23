<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $employer = $user->employer;
        $jobs = Job::where('employer_id',$employer->id)->withTrashed()->get();
         
        return view('my-jobs.index' ,['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $experienceOptions = arrayToAccosArray(Job::$experience) ;
        $categoryOptions =   arrayToAccosArray(Job::$categories);
         
        return view('my-jobs.create',[ 'experienceOptions'=> $experienceOptions,"categoryOptions" => $categoryOptions] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'title' => "required",
            'location' => 'required',
            'salary' => 'required|numeric|min:1|max:100000',
            'description' => 'required',
            'experience' => 'required',
            'category' => 'required',
         ]);
        $request->user()->employer->jobs()->create($validated );
         
         return redirect()->route('my-jobs.index');
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
    public function destroy(Job $myJob)
    {
      
        if(Gate::denies('delete',$myJob)){
            return redirect()->back()->with("error","You are not allowed to delete!");
        } 
        $myJob->delete();
        return redirect()->back()->with('success',"Successfully delete!");
    }
    public function restore(string $myJob)
    {
         $myJob =  Job::withTrashed()->find($myJob);

         
      
        if(Gate::denies('delete',$myJob)){
            return redirect()->back()->with("error","You are not allowed to delete!");
        } 
        $myJob->restore();
        return redirect()->back()->with('success',"Successfully delete!");
    }
   
}
