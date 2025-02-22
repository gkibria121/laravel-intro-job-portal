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
        
        $jobs = Job::query(); 
        $jobs->when(
            request('search'),
            function($query ){
                $query->where('title',"LIKE", '%'. request('search') .'%')
                ->orWhere('description',"LIKE", '%'. request('search') .'%');
            }
        )->when(
            request('salary_min'),
            function($query ){
                $query->where('salary',">=", request('salary_min')  );
            }
        )->when(
            request('salary_max'),
            function($query ){
                $query->where('salary',"<=", request('salary_max')  );
            }
        )
        ->when(
            request('experience'),
            function($query ){
                $query->where('experience', request('experience')  );
            }
        )  
        ->when(
            request('category'),
            function($query ){
                $query->where('category', request('category')  );
            }
        );


        return view('jobs.index', ['jobs' => $jobs->paginate(10),'experienceOptions'=> $experienceOptions,"categoryOptions" => $categoryOptions]);
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
       
       
        return view('jobs.show', ['job' => $job]);
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
