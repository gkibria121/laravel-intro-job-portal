<div class="relative">
    <textarea
        name="{{ $name }}"
        {{ $attributes }}
        {{ $attributes->class(['w-full rounded-md px-2 py-1 outline-none ring-1 ring-slate-400 focus:ring-2 focus:ring-blue-400']) }}
    >

    {{ old($name, '') }}</textarea
    >

    <x-validation-error-message :name="$name" />
</div>
