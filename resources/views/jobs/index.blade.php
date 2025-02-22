<x-layout>

    <x-breadcrumbs :links="[ 'Jobs' => route('jobs.index')]"/>

       
     
        

    <div class="max-w-[90vw]  pt-4">
        <x-card class="mb-4 "> 
            <form class="grid grid-cols-2 gap-2"> 
            <x-form-group  >
                <label for="search" class="font-bold">Search</label>
                <x-text-input placeholder="Search for any text" name="search" />
            </x-form-group>
            <x-form-group>
                <label for="salary" class="font-bold">Salary</label>
                <div>
                    <x-text-input placeholder="From"  type="number"   />
                    <x-text-input placeholder="To" type="number" />
                </div>
                
            </x-form-group>

            <x-form-group >
                <h1 class="font-bold" >Experience</h1>
                <div>
                    <input type="radio" name="experience" id="experience-1" value="" checked>
                    <label for="experience-1">All</label>
                </div>
                <div>
                    <input type="radio" name="experience" id="experience-2" value="">
                    <label for="experience-2">Entry</label>
                </div>
                <div>
                    <input type="radio" name="experience" id="experience-3" value="">
                    <label for="experience-3">Intermediate</label>
                </div>
                <div>
                    <input type="radio" name="experience" id="experience-4" value="">
                    <label for="experience-4">Senior</label>
                </div>
                
            </x-form-group>
            <x-form-group >
                <h1 class="font-bold" >Category</h1>
                <div>
                    <input type="radio" name="category" id="category-1" value="" checked>
                    <label for="category-1">All</label>
                </div>
                <div>
                    <input type="radio" name="category" id="category-2" value="">
                    <label for="category-2">IT</label>
                </div>
                <div>
                    <input type="radio" name="category" id="category-3" value="">
                    <label for="category-3">Finance</label>
                </div>
                <div>
                    <input type="radio" name="category" id="category-4" value="">
                    <label for="category-4">Sales</label>
                </div>
                <div>
                    <input type="radio" name="category" id="category-4" value="">
                    <label for="category-4">Marketing</label>
                </div>
                
            </x-form-group>

            <button class="w-full col-span-2 mt-3" type="submit" >Filter</button>
        </form> 
       
            
        </x-card>
        @forelse ($jobs as $job)
            <x-job-card class="mb-4" :$job> 
                <x-link href="{{ route('jobs.show', ['job' => $job]) }}">Show</x-link> 
            </x-job-card>
        @empty
            No jobs found!
        @endforelse

        @if (count($jobs))
            <nav class="mb-4">
                {{ $jobs->links() }}
            </nav>
        @endif

    </div>


</x-layout>
