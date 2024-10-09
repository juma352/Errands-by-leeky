<x-card class="mb-4">
    <div class="mb-4 flex justify-between">
      <h2 class="text-lg font-medium">{{ $errand->title }}</h2>
      <div class="text-slate-500">
        ${{ number_format($errand->salary) }}
      </div>
    </div>
  
    <div class="mb-4 flex items-center justify-between text-sm text-slate-500">
      <div class="flex space-x-4">
        <div>{{$errand->customer->customer_name }}</div>
        <div>{{ $errand->location }}</div>
      </div>
      <div class="flex space-x-1 text-xs">
        <x-tag>
          <a href="{{ route('errands.index', ['experience' => $errand->experience]) }}">
            {{ Str::ucfirst($errand->experience) }}
          </a>
        </x-tag>
        <x-tag>
          <a href="{{ route('errands.index', ['category' => $errand->category]) }}">
            {{ $errand->category }}
          </a>
        </x-tag>
      </div>
    </div>
  
    {{ $slot }}
  </x-card>