// resources/views/reports/errands_applied.blade.php

<h1>Errands Applied Report</h1>

<!-- Report Filter Form -->
<form action="{{ route('errands.applied.report') }}" method="GET">
    <div class="form-group">
        <label for="date_from">Date From:</label>
        <input type="date" id="date_from" name="date_from" value="{{ request()->input('date_from') }}">
    </div>
    <div class="form-group">
        <label for="date_to">Date To:</label>
        <input type="date" id="date_to" name="date_to" value="{{ request()->input('date_to') }}">
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="">All</option>
            <option value="pending" {{ request()->input('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ request()->input('status') == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ request()->input('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Generate Report</button>
</form>

<!-- Report Table -->
<table>
    <thead>
        <tr>
            <th>Errand ID</th>
            <th>Errand Title</th>
            <th>Description</th>
            <th>Date Applied</th>
            <th>User Who Applied</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($errands as $errand)
            <tr>
                <td>{{ $errand->id }}</td>
                <td>{{ $errand->title }}</td>
                <td>{{ $errand->description }}</td>
                <td>{{ $errand->date_applied }}</td>
                <td>{{ $errand->user->name }}</td>
                <td>{{ $errand->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Links -->
{{ $errands->links() }}