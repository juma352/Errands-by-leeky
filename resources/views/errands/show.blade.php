<x-layout>
    <x-bread-crumbs class="mb-4"
        :links="[
            'errands' => route('errands.index'),
            $errand->title => route('errands.show', ['errand' => $errand->id]), 
        ]"/>

    <x-job-card :$errand>
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($errand->description)) !!}
        </p>

        <div class="mb-4 text-sm font-medium">
            Status: 
            <span class="{{ $errand->status === 'completed' ? 'text-green-500' : 'text-yellow-500' }}">
                {{ ucfirst($errand->status) }}
            </span>
        </div>

        <!-- Status Update Form -->
        <form action="{{ route('errands.updateStatus', $errand) }}" method="POST"> <!-- Change here -->
            @csrf
            <select name="status" class="mb-4">
                <option value="in_progress" {{ $errand->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $errand->status === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>

        @can('apply', $errand)
            <x-link-button :href="route('errands.application.create', $errand)">Apply</x-link-button>
        @else
            <div class="text-center text-sm font-medium text-slate-500">You already applied to this errand!</div>
        @endcan
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{$errand->customer->customer_name}} Errands 
        </h2>
        <div class="text-sm text-slate-500">
            @foreach ($errand->customer->errands as $othererrands)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('errands.show', ['errand' => $othererrands->id]) }}"> {{$othererrands->title}}</a>
                        </div>
                        <div class="text-xs">
                            {{$othererrands->created_at->diffForHumans()}}
                        </div>
                    </div>
                    <div class="text-xs">
                        Ksh{{ number_format($othererrands->salary) }}
                    </div>
                </div> 
            @endforeach
        </div>
    </x-card>
</x-layout>