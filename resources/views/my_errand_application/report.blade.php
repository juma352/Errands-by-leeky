<x-layout>
    <x-breadcrumbs :links="['My Errand Applications' => route('my-errand-applications.index'), 'Report' => '#']" class="mb-4"/>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Errand Applications Report</h2>
        <a href="{{ route('my-errand-applications.download') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Download Report</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Location</th>
                <th class="border px-4 py-2">Phone Number</th>
                <th class="border px-4 py-2">Salary</th>
                <th class="border px-4 py-2">Description</th>
                <th class="border px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td class="border px-4 py-2">{{ $application->title }}</td>
                    <td class="border px-4 py-2">{{ $application->location }}</td>
                    <td class="border px-4 py-2">{{ $application->phone_number }}</td>
                    <td class="border px-4 py-2">{{ $application->salary }}</td>
                    <td class="border px-4 py-2">{{ $application->description }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($application->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>