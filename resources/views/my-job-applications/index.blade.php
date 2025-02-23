<x-layout>
    <x-success-message />
    <x-breadcrumbs :links="['My Job Applications' => route('my-job-applications.index')]" />

    @forelse ($applications as $application)
        <x-card class="my-4 text-slate-500">
            <div class="grid grid-cols-2 gap-4">
                <h1 class="text-xl font-semibold text-black">{{ $application->job->title }}</h1>
                <h1 class="justify-self-end">${{ $application->job->salary }}</h1>
                <h2>
                    {{ $application->job->employer->company_name }}
                    <span>{{ $application->job->location }}</span>
                </h2>
                <div class="flex justify-end gap-x-2">
                    <x-tag>{{ $application->job->experience }}</x-tag>
                    <x-tag>{{ $application->job->category }}</x-tag>
                </div>

                <div>
                    <p>Applied {{ $application->created_at->diffForHumans() }} ago</p>
                    <p>Other applicants {{ $application->job->job_applications_count }}</p>
                    <p>You asking salary ${{ number_format($application->expected_salary) }}</p>
                    <p>
                        Average asking salary
                        ${{ number_format($application->job->job_applications_avg_expected_salary) }}
                    </p>
                </div>
                <form
                    class="flex items-center justify-self-end"
                    method="POST"
                    action="{{ route('my-job-applications.destroy', ['my_job_application' => $application]) }}"
                >
                    @csrf
                    @method('DELETE')
                    <x-button class="px-2 font-semibold text-black">Cancel</x-button>
                </form>
            </div>
        </x-card>
    @empty
        
    @endforelse
</x-layout>
