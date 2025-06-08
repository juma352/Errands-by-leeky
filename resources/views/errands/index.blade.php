<x-layout>
    <div class="mb-8">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Find Your Perfect <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Errand</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Browse through hundreds of available errands and start earning today. From simple tasks to specialized services.
            </p>
        </div>

        <!-- Search and Filters -->
        <x-card class="mb-8" x-data="">
            <form x-ref="filters" id="filtering-form" action="{{ route('errands.index') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div>
                        <x-label for="search">Search Errands</x-label>
                        <x-text-input name="search" value="{{ request('search') }}"
                            placeholder="Search by title, description, or customer..." form-ref="filters" />
                    </div>
                    
                    <div>
                        <x-label for="min_salary">Salary Range</x-label>
                        <div class="flex space-x-2">
                            <x-text-input name="min_salary" value="{{ request('min_salary') }}"
                                placeholder="Min" form-ref="filters" type="number" />
                            <x-text-input name="max_salary" value="{{ request('max_salary') }}"
                                placeholder="Max" form-ref="filters" type="number" />
                        </div>
                    </div>
                    
                    <div>
                        <x-label for="experience">Experience Level</x-label>
                        <select name="experience" class="w-full rounded-lg border-0 py-3 px-4 text-sm bg-white/80 backdrop-blur-sm shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">All Levels</option>
                            @foreach(\App\Models\Errand::$experience as $exp)
                                <option value="{{ $exp }}" {{ request('experience') === $exp ? 'selected' : '' }}>
                                    {{ ucfirst($exp) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <x-label for="category">Category</x-label>
                        <select name="category" class="w-full rounded-lg border-0 py-3 px-4 text-sm bg-white/80 backdrop-blur-sm shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">All Categories</option>
                            @foreach(\App\Models\Errand::$category as $cat)
                                <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        Showing {{ $errands->count() }} of {{ $errands->total() }} errands
                    </div>
                    <x-button type="submit" class="px-8">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search & Filter
                    </x-button>
                </div>
            </form>
        </x-card>
    </div>

    <!-- Errands Grid -->
    <div class="space-y-6">
        @forelse ($errands as $errand)
            <x-job-card :$errand>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <div class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>{{ $errand->errandApplication->count() }} applicants</span>
                        </div>
                        @if($errand->errandApplication->count() > 0)
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                <span>Avg: Ksh {{ number_format($errand->errandApplication->avg('expected_salary')) }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <x-link-button :href="route('errands.show', $errand)" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white hover:from-blue-700 hover:to-indigo-700 border-0">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View Details
                    </x-link-button>
                </div>
            </x-job-card>
        @empty
            <div class="text-center py-16">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No errands found</h3>
                <p class="text-gray-600 mb-6">Try adjusting your search criteria or check back later for new errands.</p>
                <x-link-button href="{{ route('errands.index') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white hover:from-blue-700 hover:to-indigo-700 border-0">
                    Clear Filters
                </x-link-button>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($errands->hasPages())
        <div class="mt-12">
            {{ $errands->links() }}
        </div>
    @endif
</x-layout>