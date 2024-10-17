<x-layout>

    @section('content')
        <div class="container mx-auto px-4">
            <div class="flex flex-col">
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">Reports</h1>
                    <ol class="breadcrumb mt-2 text-gray-600">
                        <li><a href="{{ route('errands.index') }}" class="text-blue-500 hover:underline">Home</a></li>
                   
                    </ol>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="panel-body">
                        <p class="text-lg text-gray-700">Select a report type:</p>
                        <ul class="mt-4">
                            <li>
                                <a href="{{ route('reports.errands_applied') }}" class="text-blue-600 hover:underline">Errands Applied</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            
    </x-layout>