<!-- file-input.blade.php -->

<div class="mb-4">
    <label for="{{ $name }}" class="mb-2 block text-sm font-medium text-slate-900">{{ $label }}</label>
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100">
    @error($name)
        <p class="text-red-500 text-xs">{{ $message }}</p>
    @enderror
</div>