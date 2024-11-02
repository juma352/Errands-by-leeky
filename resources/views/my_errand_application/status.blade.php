<x-layout>
    <x-breadcrumbs :links="['My Errand Applications' => route('my-errand-applications.index'), 'Update Status' => '#']" class="mb-4"/>

    <div class="flex items-center">
        <form action="{{ route('my-errand-applications.update-status', $application) }}" method="POST" class="w-full">
            @csrf
            @method('PATCH')
            
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $application->status === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    Update Status
                </button>
            </div>
        </form>
    </div>
</x-layout>