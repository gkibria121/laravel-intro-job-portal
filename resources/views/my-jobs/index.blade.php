<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index')]" />

    <div class="mt-1 flex justify-end">
        <x-link :href="route('my-jobs.create')" class="w-fit rounded-md bg-white px-2 py-1">Add Job</x-link>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :$job class="mt-4">
            @if ($job->trashed())
                <form action="{{ route('my-jobs.restore', $job) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-button class="w-[fit-content] px-2" type="submit">Restore</x-button>
                    <x-button class="w-[fit-content] border-none px-2 text-red-500" type="button">Deleted</x-button>
                </form>
            @else
                <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button class="w-[fit-content] px-2" type="submit">Delete</x-button>
                </form>
            @endif
        </x-job-card>
    @empty
        <x-card class="mt-4">No jobs found!</x-card>
    @endforelse
</x-layout>
