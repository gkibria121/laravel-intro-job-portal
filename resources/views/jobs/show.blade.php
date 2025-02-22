<x-layout>
    <x-breadcrumbs :links="[ 'Jobs' => route('jobs.index')  , $job->title => route('jobs.show',['job' => $job])]" />
    <x-job-card :$job class="mt-4">
        <p class="my-4">
            {!! nl2br($job->description) !!}
        </p>
    </x-job-card>
</x-layout>
