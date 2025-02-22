<x-layout>
    <x-breadcrumbs :links="[ 'Jobs' => route('jobs.index')  , $job->title => route('jobs.show',['job' => $job])]" />
    <x-job-card :$job class="mt-4">
        <p class="my-4">
            {!! nl2br($job->description) !!}
        </p>
    </x-job-card>
    <x-card class="mt-4">
        <h1 class="mb-4 text-xl font-semibold">More {{ $job->employer->company_name }} Jobs</h1>

        @foreach ($job->employer->jobs as $otherJob)
            <div class="mb-3">
                <div class="flex justify-between">
                    <h1>{{ $otherJob->title }}</h1>
                    <span class="text-slate-500">${{ number_format($otherJob->salary) }}</span>
                </div>
                <small class="text-slate-500">{{ $otherJob->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </x-card>
</x-layout>
