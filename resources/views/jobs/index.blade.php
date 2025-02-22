<x-layout>

    <div class="max-w-[90vw] mx-auto pt-4">
        @forelse ($jobs as $job)
            <x-job-card class="mb-4 text-slate-500" :$job>

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
