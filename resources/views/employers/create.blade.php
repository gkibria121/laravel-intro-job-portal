<x-layout>
    <x-card>
        <form action="{{ route('employers.store') }}" class="flex flex-col gap-y-2" method="POST">
            @csrf
            <div class="flex flex-col gap-y-1">
                <label for="" class="mb-4 font-semibold">Company Name*</label>
                <x-text-input :name='"company_name"' />
            </div>

            <x-button class="mt-2">Create</x-button>
        </form>
    </x-card>
</x-layout>
