<x-layout>
    <x-breadcrumbs
        :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show',$job), 'Apply' => route('jobs.applyView', $job)]"
    />

    <x-job-card :$job class="mt-4" />

    <x-card class="mt-4">
        <form action="{{ route('jobs.apply', $job) }}" method="POST">
            @csrf
            <h1 class="font-semibold">Your Job Application</h1>

            <x-form-group>
                <label class="mb-1 mt-2 font-semibold">Expected Salary</label>
                <x-text-input type="number" name="expected_salary" />
            </x-form-group>
            <x-button class="mt-4">Apply</x-button>
        </form>
    </x-card>
</x-layout>
