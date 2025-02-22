<div {{ $attributes->class(['rounded-md bg-white p-4 text-slate-500 shadow-sm']) }}>
    <div class="flex justify-between text-lg">
        <h1 class="font-bold text-black">{{ $job->title }}</h1>
        <h1>${{ number_format($job->salary) }}</h1>
    </div>
    <div class="mt-4 flex justify-between">
        <h1 class="flex gap-x-10">
            <span>{{ $job->employer->company_name }}</span>
            <span>{{ $job->location }}</span>
        </h1>
        <div class="flex gap-x-4">
            <x-tag>
                <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
                    {{ Str::ucfirst($job->experience) }}
                </a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
                    {{ Str::ucfirst($job->category) }}
                </a>
            </x-tag>
        </div>
    </div>
    {{ $slot }}
</div>
