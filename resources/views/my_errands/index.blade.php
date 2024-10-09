<x-layout>
    <x-breadcrumbs :links=" ['My Errands'=> '#']" class="mb-4"/>
        <div class="mb-8 text-right">
            <x-link-button href="{{route('my-errands.create')}}" >Add New</x-link-button>
        </div>
        @forelse ($errands as $errand )
          <x-job-card :$errand>
            <div class="text-xs text-slate-500">
                @forelse ($errand->errandApplication as $application )
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{$application->user->name}}</div>
                            <div>
                                Applied{{$application->created_at->diffForHumans()}}
                            </div>
                            <div>
                                Dowload CV
                            </div>
                        </div>
                        <div>Ksh{{number_format($application->expected_salary)}}</div>
                    </div>
                @empty
                  <div>No applications yet</div> 

                @endforelse
                <div>
                <div class="flex space-x-2">

                    <x-link-button href="{{route('my-errands.edit',$errand)}}">Edit</x-link-button>
                </div>
            </div>
          </x-job-card>
     
        @empty
           <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                No errands yet

            </div>
            <div class="text-center">
                Post your first errand <a class="text-indigo-500 hover:underline" href="{{route('my-errands.create')}}">here!</a>

            </div>
            </div> 
        @endforelse
</x-layout>