<x-layout>

    <x-breadcrumbs :links="[ 'Jobs' => route('jobs.index')]"/>

    <div class="max-w-[90vw]  pt-4">
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
