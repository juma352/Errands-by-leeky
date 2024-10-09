  <x-layout> 
    <x-bread-crumbs  class="mb-4"
    :links="[
        'errands' => route('errands.index'),
        $errand->title => route('errands.show', ['errand' => $errand->id]), 
        'Apply'=>'#',
    ]"/> 
        <x-job-card :$errand/>

        <x-card>
          <h2 class="mb-4 text-lg font-medium">
            Your Errands Application
          </h2>
      
          <form action="{{ route('errands.application.store', $errand) }}" method="POST"
          enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
              <x-label for="expected_salary" :required="true">Expected Salary</x-label>
              <x-text-input type="number" name="expected_salary" />
            </div>
              <div class="mb-4 ">
                <x-label for="cv" :required="true">Upload CV</x-label>
                <x-text-input type="file" name="cv"/>
              </div>
      
            <x-button class="w-full">Apply</x-button>
          </form>
        </x-card>
      </x-layout>
