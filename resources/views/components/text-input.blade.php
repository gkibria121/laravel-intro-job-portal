<div class="relative">
    <button
        class="absolute right-1 h-full"
        type="button"
        onclick="document.querySelector('#{{ $attributes['name'] }}').value ='';document.querySelector('#{{ $attributes['name'] }}').closest('form')?.submit()"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-6"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>

    <input
        type="{{ $attributes['type'] ?? 'text' }}"
        id="{{ $attributes['name'] }}"
        {{ $attributes }}
        {{ $attributes->class(['w-full rounded-md px-2 py-1 pr-8 outline-none ring-1 ring-slate-400 focus:ring-2 focus:ring-blue-400']) }}
    />
</div>
