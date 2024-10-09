<x-layout>
  <x-breadcrumbs class="mb-4"
    :links="['My Errand Applications' => '#']" />

  @forelse ($applications as $application)
    @if ($application->errand)
      <x-job-card :errand="$application->errand">
        <div class="flex items-center justify-between text-xs text-slate-500">
          <div>
            <div>
              Applied {{ $application->created_at->diffForHumans() }}
            </div>
            <div>
              @php
                $otherApplicantsCount = $application->errand->errand_application_count - 1;
              @endphp
              @if ($otherApplicantsCount > 0)
                Other {{ Str::plural('applicant', $otherApplicantsCount) }} ({{ $otherApplicantsCount }})
              @else
                No other applicants
              @endif
            </div>
            <div>
              Your asking salary Ksh{{ number_format($application->expected_salary) }}
            </div>
            <div>
              @if ($application->errand->errand_application_count > 1)
                Average asking salary Ksh{{ number_format($application->errand->errand_application_avg_expected_salary) }}
              @else
                No average salary
              @endif
            </div>
          </div>
          <div>
            <form action="{{route('my-errand-applications.destroy', $application)}}" method="POST">
              @csrf
              @method('DELETE')
              <x-button>Cancel</x-button>
            </form>
          </div>
        </div>
      </x-job-card>
    @endif
  @empty
  <div class="rounded-md border border-dashed border-slate-300 p-8">
<div class="text-center font-medium">
  No errands application yet

</div>
<div class="text-center">
Go find some jobs <a class="text-indigo-500 hover:underline" href="{{route('errands.index')}}">here!</a>
</div>
  </div>
  @endforelse
</x-layout>