<x-layout>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Reports</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('errands.index') }}">Home</a></li>
                    <li class="active">Reports</li>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Select a report type:</p>
                        <ul>
                            <li><a href="{{ route('reports.errands_applied') }}">Errands Applied</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</x-layout>
