 <div {{ $attributes->class(['bg-white p-4 rounded-md shadow-sm']) }}>
     <div class="flex justify-between text-lg">
         <h1 class=" font-bold text-black"> {{ $job->title }}</h1>
         <h1>${{ number_format($job->salary) }}</h1>
     </div>
     <div class="flex justify-between mt-4">
         <h1 class="flex  gap-x-10">
             <span>Company Name</span>
             <span>{{ $job->location }}</span>
         </h1>
         <div class="flex  gap-x-4">
             <x-tag>{{ Str::ucfirst($job->experience) }}</x-tag>
             <x-tag>{{ $job->category }}</x-tag>
         </div>
     </div>
     {{ $slot }}
 </div>
