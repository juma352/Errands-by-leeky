<x-layout>
    <x-bread-crumbs  class="mb-4"
    :links="[
        'errands' => route('errands.index'),
        $errand->title => route('errands.show', ['errand' => $errand->id]), 
    ]"/>

    <x-job-card :$errand>
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($errand->description))!!}

        </p>
     @can('apply', $errand)
     <x-link-button :href="route('errands.application.create',$errand)">Apply
    </x-link-button>
         @else
         <div class="text-center text-sm font-medium text-slate-500">You alredy applied to this errand!</div>
     @endcan
    </x-job-card>
      <x-card class="mb-4">
       <h2 class="mb-4 text-lg font-medium" >
        More {{$errand->customer->customer_name}} Errands 
       </h2>
       <div class="text-sm text-slate-500">
        @foreach ($errand->customer->errands as $othererrands)
           <div class="mb-4 flex justify-between">
            <div>
                <div class="text-slate-700">
                   <a href="{{route('errands.show', ['errand' => $othererrands->id])}}"> {{$othererrands->title}}</a>
                </div>
                <div class="text-xs">
                    {{$othererrands->created_at->diffForHumans()}}
                </div>
            </div>
            <div class="text-xs">
                Ksh{{number_format($othererrands->salary)}}
            </div>
            </div> 
        @endforeach
       </div>
      </x-card>
</x-layout>