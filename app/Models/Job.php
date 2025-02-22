<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public static array $experience  =  ['entry', 'intermediate', 'senior'];
    public static array $categories  =  ['IT', 'Finance', 'Sales', 'Marketing'];

    protected   $table = 'job_circulars';

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
