<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index')]" />

    <div class="mt-1 flex justify-end">
        <x-link :href="route('my-jobs.create')" class="w-fit rounded-md bg-white px-2 py-1">Add Job</x-link>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :$job class="mt-4" />
    @empty
        <x-card class="mt-4">No jobs found!</x-card>
    @endforelse
</x-layout>
