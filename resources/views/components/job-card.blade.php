<x-card class="mb-6 hover:scale-[1.02] transition-transform duration-300">
    <div class="flex justify-between items-start mb-4">
        <div class="flex-1">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $errand->title }}</h2>
            <div class="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span>{{ $errand->customer->customer_name }}</span>
                </div>
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>{{ $errand->location }}</span>
                </div>
                <div class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ $errand->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
        <div class="text-right">
            <div class="text-2xl font-bold text-green-600 mb-1">
                Ksh {{ number_format($errand->salary) }}
            </div>
            <div class="flex space-x-2">
                <x-tag class="bg-blue-50 text-blue-700 border-blue-200">
                    <a href="{{ route('errands.index', ['experience' => $errand->experience]) }}" class="flex items-center space-x-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span>{{ Str::ucfirst($errand->experience) }}</span>
                    </a>
                </x-tag>
                <x-tag class="bg-purple-50 text-purple-700 border-purple-200">
                    <a href="{{ route('errands.index', ['category' => $errand->category]) }}" class="flex items-center space-x-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <span>{{ $errand->category }}</span>
                    </a>
                </x-tag>
            </div>
        </div>
    </div>

    {{ $slot }}
</x-card>