<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index') , 'Create' => route('my-jobs.create')]" />

    <x-card class="mt-4">
        <form action="{{ route('my-jobs.store') }}" method="Post">
            @csrf
            <div class="flex justify-between gap-x-4">
                <x-form-group class="flex-grow">
                    <x-label>Job Title*</x-label>
                    <x-text-input :name="'title'" />
                </x-form-group>
                <x-form-group class="flex-grow">
                    <x-label>Location *</x-label>
                    <x-text-input :name="'location'" />
                </x-form-group>
            </div>
            <x-form-group>
                <x-label>Salary *</x-label>
                <x-text-input type="number" :name="'salary'" />
            </x-form-group>
            <x-form-group>
                <x-label>Description *</x-label>
                <x-text-area :name="'description'" />
            </x-form-group>

            <div class="mt-4 grid grid-cols-2">
                <x-radio-options :name='"experience"' :isLink="false" :options="$experienceOptions" />
                <x-radio-options :name='"category"' :isLink="false" :options="$categoryOptions" />
            </div>

            <x-button class="mt-4">Create Job</x-button>
        </form>
    </x-card>
</x-layout>
