<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
    
    public function __construct()
    {
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('employers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required'
        ]);

        
        if(Gate::denies('create',Employer::class) ){
            return redirect()->back()->with('error' ,"You are already an Employer!");
        }

        $request->user()->employer()->create([
            ...$validated
        ]);
        return redirect()->route('my-jobs.index')->with('success' ,"You employer account was created!");
         
    }
 
}
