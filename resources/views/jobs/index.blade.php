<x-layout>

    <div class="max-w-[90vw] mx-auto pt-4">
        @forelse ($jobs as $job)
            <x-card class="mb-4 text-slate-500">
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

                <p class="mt-4">
                    {!! nl2br($job->description) !!}
                </p>
            </x-card>
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
