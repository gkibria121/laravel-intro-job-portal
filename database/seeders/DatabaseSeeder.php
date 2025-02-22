<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public int $usersAmount = 100;
    public int $employersAmount = 10;
    public int $jobApplicationsAmount = 100;

    public function run(): void
    {

        User::factory($this->usersAmount)->create();
        $users = User::all()->shuffle();

        for ($i=0; $i < $this->employersAmount; $i++) { 
          Employer::factory()->create(['user_id' => $users->pop()->id]);
        }
        
        $employers  = Employer::all();

        for ($i=0; $i <$this->jobApplicationsAmount; $i++) { 
            $employer = $employers->random();
            Job::factory()->create(['employer_id' => $employer->id]);
        }



       
        
    }
}
