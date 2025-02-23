@if (session()->has('success'))
    <div class="my-2 rounded-md border-l-4 border-l-emerald-300 bg-emerald-100 p-4">
        <h1 class="font-semibold text-emerald-600">Sucess!</h1>
        <h2 class="mt-1 text-emerald-600">{{ session()->get('success') }}</h2>
    </div>
@endif
