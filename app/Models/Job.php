<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory,SoftDeletes;

    public static array $experience  =  ['entry', 'intermediate', 'senior'];
    public static array $categories  =  ['IT', 'Finance', 'Sales', 'Marketing'];
    protected $fillable =['title','salary','location','description','category','experience'];
    protected   $table = 'job_circulars';
    public function employer() :BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
    public function jobApplications() :HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
    public function hasApplied( Authenticatable|User|int $user) :bool
    {
        $id = $user->id??$user; 
        $jobId = $this->id; 
        return $this->whereHas('jobApplications',fn (Builder $query) => $query->where('user_id',$id))
        ->where('id',$jobId)
        ->exists();
         
    }
    public function scopeFilter(Builder $query , array $filters){

        
        return $query->when(
            $filters['search']??null  ,
            function($query , $search ){
                
                $query->where('title',"LIKE", '%'. $search   .'%')
                ->orWhere('description',"LIKE", '%'. $search   .'%');
             
            }
        )->when(
            $filters['salary_min']??null  ,
            function($query, $salaryMin ){
                $query->where('salary',">=",$salaryMin    );
            }
        )->when(
            $filters['salary_max']??null  ,
            function($query ,$salaryMax){
                $query->where('salary',"<=", $salaryMax    );
            }
        )
        ->when(
            $filters['experience']??null  ,
            function($query,$experience ){
                $query->where('experience',$experience   );
            }
        )  
        ->when(
            $filters['category']??null  ,
            function($query ,$catagory){
                $query->where('category', $catagory    );
            }
        );
    }
}
