<div class="relative">
  @if ('textarea' != $type)
    @if ($formRef)
      <button type="button" class="absolute top-0 right-0 flex h-full items-center pr-3 z-10"
        @click="$refs['input-{{ $name }}'].value = ''; $refs['{{ $formRef }}'].submit();">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="h-4 w-4 text-slate-400 hover:text-slate-600">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    @endif
    <input x-ref="input-{{ $name }}" type="{{ $type }}"
      placeholder="{{ $placeholder }}"
      name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $name }}"
      @class([
          'w-full rounded-lg border-0 py-3 px-4 text-sm bg-white/80 backdrop-blur-sm shadow-sm placeholder:text-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200',
          'pr-10' => $formRef,
          'ring-1 ring-slate-200' => !$errors->has($name),
          'ring-2 ring-red-300 bg-red-50' => $errors->has($name),
      ]) />
  @else
    <textarea id="{{ $name }}" name="{{ $name }}" rows="4" @class([
        'w-full rounded-lg border-0 py-3 px-4 text-sm bg-white/80 backdrop-blur-sm shadow-sm placeholder:text-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none',
        'ring-1 ring-slate-200' => !$errors->has($name),
        'ring-2 ring-red-300 bg-red-50' => $errors->has($name),
    ]) placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
  @endif

  @error($name)
    <div class="mt-2 text-sm text-red-600 flex items-center space-x-1">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <span>{{ $message }}</span>
    </div>
  @enderror
</div>