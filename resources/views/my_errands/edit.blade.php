<x-layout>
    <x-breadcrumbs :links="['My Errands'=>route('my-errands.index'), 'Edit errand' =>'#']" class="mb-4"/>
        <x-card class="mb-8">
            <form action="{{ route('my-errands.update', ['my_errand' => $errand]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4 grid grid-cls-2 gap-4">
                    <div>
                        <x-label for="title" :required="true">Errand Title</x-label>
                        <x-text-input name="title" :value="$errand->title"/>
                    </div>
                    <div>
                        <x-label for="location" :required="true">Location</x-label>
                        <x-text-input name="location" :value="$errand->location"/>
                    </div>
                    <div>
                        <x-label for="phone_number" :required="true">Phone Number</x-label>
                        <x-text-input name="phone_number" type="number" :value="$errand->phone_number"/>
                    </div>
                    <div class="col-span-2">
                        <x-label for="salary" :required="true">Salary</x-label>
                        <x-text-input name="salary" type="number" :value="$errand->salary"/>
                    </div>
                    <div class="col-span-2">
                        <x-label for="description" :required="true">Description</x-label>
                        <x-text-input name="description" type="textarea" :value="$errand->description"/>
                    </div>
                    <div>
                        <x-label for="experience" :required="true">Experience</x-label>
                        <x-radio-group name="experience" :value="$errand->experience"
                        :all-option="false"
                        :options="array_combine(
                  array_map('ucfirst', \App\Models\Errand::$experience),
                  \App\Models\Errand::$experience,
              )"/>
                    </div>
                    <div>
                        <x-label for="category" :required="true">Category</x-label>
                        <x-radio-group name="category" :all-option="false" :value="$errand->category"
              :options="\App\Models\Errand::$category" />
                    </div>
                    <div class="col-span-2">
                    <x-button class="w-full ">Edit Errand</x-button>
                </div>
                </div>
            </form>


       
        </x-card>
</x-layout>