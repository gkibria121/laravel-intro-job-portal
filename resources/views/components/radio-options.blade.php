<x-form-group>
    <h1 class="mb-1 font-bold">{{ Str::ucfirst($name) }}</h1>

    @if ($isLink)
        <div>
            <input type="radio" name="{{ $name }}" id="{{ $name }}" value="" checked />
            <label for="{{ $name }}">All</label>
        </div>
    @endif

    @foreach ($options as $label => $value)
        <div>
            <input
                type="radio"
                name="{{ $name }}"
                id="{{ $value }}"
                value="{{ $value }}"
                @checked(request($name) === $value)
            />
            <label for="{{ $value }}">
                @if ($isLink)
                    <a href="{{ route('jobs.index', [$name => $value]) }}">{{ $label }}</a>
                @else
                    {{ $label }}
                @endif
            </label>
        </div>
    @endforeach

    <x-validation-error-message :name="$name" />
</x-form-group>
