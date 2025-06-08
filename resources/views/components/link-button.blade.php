<a href="{{ $href }}" {{ $attributes->class([
    'inline-flex items-center justify-center px-4 py-2 rounded-lg font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2',
    'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50 hover:border-gray-400 focus:ring-gray-500 shadow-sm hover:shadow-md'
]) }}>
    {{ $slot }}
</a>