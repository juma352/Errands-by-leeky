<label class="block text-sm font-semibold text-gray-900 mb-2" for="{{ $for }}">
    {{ $slot }}
    @if ($required)
        <span class="text-red-500 ml-1">*</span>  
    @endif
</label>