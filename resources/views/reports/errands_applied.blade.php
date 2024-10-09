// resources/views/reports/errands_applied.blade.php

<h1>Errands Applied Report</h1>

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