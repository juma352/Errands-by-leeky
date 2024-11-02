<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Sign in to your account
    </h1>
    <x-card class="py-8 px-16">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-8">
                <x-label for="email" :required="true">E-mail</x-label>
                <x-text-input name="email"/>
            </div>
            <div class="mb-8">
                <x-label for="password" :required="true" >Password</x-label>
                <x-text-input name="password" type="password"/>
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="rounded-sm border-slate-400">
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <div>
                        <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">Forgot password?</a>
                    </div>
                </div>
            </div>
            <x-button class="w-full bg-green-50">Login</x-button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">
            Don't have an account? 
            <a href="{{ route('auth.create') }}" class="text-indigo-600 hover:underline">Register here</a>
        </p>
    </x-card>
</x-layout>