<input
    type="{{ $attributes['type'] ?? 'text' }}"
    {{ $attributes }}
    {{ $attributes->class(['rounded-md px-2 py-1 outline-none ring-1 ring-slate-400 focus:ring-2 focus:ring-blue-400']) }}
/>
