<x-layout>
    <x-card>
        <form action="{{route('customer.store')}}" method="POST">
            @csrf
            <div class="mb-4">
               <x-label for="customer_name" :required="true">Customer Name</x-label> 
               <x-text-input name="customer_name"/>
            </div>
            <div class="mb-4">
                <x-label for="email" :required="true">Customer Email</x-label> 
                <x-text-input name="email"/>
             </div>
            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>