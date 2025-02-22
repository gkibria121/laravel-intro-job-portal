<x-layout>
    <x-breadcrumbs :links="[ 'Jobs' => route('jobs.index')]" />

    <div class="max-w-[90vw] pt-4">
        <x-card class="mb-4">
            <form class="grid grid-cols-2 gap-2">
                <x-form-group>
                    <label for="search" class="font-bold">Search</label>
                    <x-text-input placeholder="Search for any text" name="search" value="{{request('search')}}" />
                </x-form-group>
                <x-form-group>
                    <label for="salary" class="font-bold">Salary</label>
                    <div class="flex gap-x-4">
                        <x-text-input
                            placeholder="From"
                            type="number"
                            name="salary_min"
                            value="{{request('salary_min')}}"
                        />
                        <x-text-input
                            placeholder="To"
                            type="number"
                            name="salary_max"
                            value="{{request('salary_max')}}"
                        />
                    </div>
                </x-form-group>

                <x-radio-options :name="'experience'" :options="$experienceOptions" />
                <x-radio-options :name="'category'" :options="$categoryOptions" />

                <x-button class="col-span-2 mt-3" type="submit">Filter</x-button>
            </form>
        </x-card>
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
