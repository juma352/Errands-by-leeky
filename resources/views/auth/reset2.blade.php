<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Reset Password</h1>
    <x-card class="py-8 px-16">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-8">
                <x-label for="email" :required="true">E-mail</x-label>
                <x-text-input name="email" type="email" value="{{ old('email', $email) }}" required />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-8">
                <x-label for="password" :required="true">New Password</x-label>
                <x-text-input name="password" type="password" required />
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-8">
                <x-label for="password_confirmation" :required="true">Confirm Password</x-label>
                <x-text-input name="password_confirmation" type="password" required />
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <x-button class="w-full bg-green-50">Reset Password</x-button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">
            Remembered your password? 
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login here</a>
        </p>
    </x-card>
</x-layout>