<x-form-group>
    <h1 class="mb-1 font-bold">{{ Str::ucfirst($name) }}</h1>
    <div>
        <input type="radio" name="{{ $name }}" id="{{ $name }}" value="" checked />
        <label for="{{ $name }}">All</label>
    </div>
    @foreach ($options as $label => $value)
        <div>
            <input
                type="radio"
                name="{{ $name }}"
                id="{{ $value }}"
                value="{{ $value }}"
                @checked(request($name) === $value)
            />
            <label for="{{ $value }}">{{ $label }}</label>
        </div>
    @endforeach
</x-form-group>
