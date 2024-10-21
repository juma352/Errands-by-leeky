<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Create an account</h1>
    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-8">
                <x-label for="name" :required="true">Name</x-label>
                <x-text-input name="name" />
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-8">
                <x-label for="email" :required="true">E-mail</x-label>
                <x-text-input name="email" />
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-8">
                <x-label for="password" :required="true">Password</x-label>
                <x-text-input name="password" type="password" />
                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-8">
                <x-label for="password_confirmation" :required="true">Confirm Password</x-label>
                <x-text-input name="password_confirmation" type="password" />
                @error('password_confirmation')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-button class="w-full bg-green-50">Register</x-button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Sign in here</a>
        </p>
    </x-card>
</x-layout>