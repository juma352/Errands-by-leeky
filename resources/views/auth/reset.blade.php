<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">Reset Password</h1>
    <x-card class="py-8 px-16">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-8">
                <x-label for="email" :required="true">E-mail</x-label>
                <x-text-input name="email" type="email" required />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <x-button class="w-full bg-green-50">Send Password Reset Link</x-button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-600">
            Remembered your password? 
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login here</a>
        </p>
    </x-card>
</x-layout>