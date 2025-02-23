<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index')]" />

    @forelse ($jobs as $job)
    @empty
        <x-card class="mt-4">No jobs found!</x-card>
    @endforelse
</x-layout>
