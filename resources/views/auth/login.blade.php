<x-layout>
    <div class="container mx-auto mt-20 max-w-[600px]">
        <h1 class="mb-10 text-center text-3xl font-semibold">Sign in to your account</h1>
        <form class="rounded-md bg-white p-10" method="POST" action="{{ route('auth.store') }}">
            @csrf
            <x-form-group>
                <label for="" class="mb-1 font-semibold">E-mail</label>
                <x-text-input name="email" />
            </x-form-group>
            <x-form-group>
                <label for="" class="mb-1 font-semibold">Password</label>
                <x-text-input name="password" type="password" />
            </x-form-group>
            <div class="mt-4 flex justify-between">
                <div class="flex flex-row space-x-1">
                    <input type="checkbox" name="remember_me" id="remember_me" />
                    <label for="remember_me">Remember me</label>
                </div>
                <a class="text-blue-800" href="/">Forget password?</a>
            </div>

            <x-button class="mt-10">Login</x-button>
        </form>
    </div>
</x-layout>
