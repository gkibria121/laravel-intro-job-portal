@if (session()->has('error'))
    <div class="my-2 rounded-md border-l-4 border-l-red-300 bg-red-100 p-4">
        <h1 class="font-semibold text-red-600">Error!</h1>
        <h2 class="mt-1 text-red-600">{{ session()->get('error') }}</h2>
    </div>
@endif
