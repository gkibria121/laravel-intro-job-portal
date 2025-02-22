<x-layout>


    <x-job-card :$job>

        <p class="my-4">
            {!! nl2br($job->description) !!}
        </p>
    </x-job-card>
</x-layout>
