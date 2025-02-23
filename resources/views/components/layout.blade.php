<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Document</title>
    </head>

    <body class="bg-slate-200 p-6">
        <nav class="my-4 flex justify-between text-xl">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
            </ul>
            <ul class="flex gap-x-4">
                @auth
                    <li>
                        <a href="">Prof. Earl Hayes</a>
                    </li>
                    <li>
                        <a href="">Applications</a>
                    </li>
                    <li>
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <h1>Guest</h1>
                    </li>
                    <li>
                        <a href="{{ route('auth.create') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </nav>
        {{ $slot }}
    </body>
</html>
