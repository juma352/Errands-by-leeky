<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Errands By Leeky</title>
</head>

<body class="font-sans bg-gray-100"> 
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <a href="{{route('errands.index')}}" class="text-xl font-bold text-gray-800">Errands By Leeky</a>
            <ul class="flex space-x-6">
                <li>
                    <a href="{{route('errands.index')}}" class="text-gray-700 hover:text-blue-500">Home</a>
                </li>
                @auth
                <li>
                    <a href="{{route('my-errand-applications.index')}}" class="text-gray-700 hover:text-blue-500">
                        {{auth()->user()->name ?? 'Anonymous'}}: Applications
                    </a>
                </li>
                <li>
                    <a href="{{route('my-errands.index')}}" class="text-gray-700 hover:text-blue-500">My Errands</a>
                </li>
                <li>
                    <a href="{{route('reports.index')}}" class="text-gray-700 hover:text-blue-500">Reports</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-red-500">Logout</button>
                    </form>
                </li>
                @else
                <li>
                    <a href="{{route('login')}}" class="text-gray-700 hover:text-blue-500">Sign In</a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>