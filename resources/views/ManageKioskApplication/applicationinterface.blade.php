@extends('index')
@section('content')
<div class="container">
    <h1>List of Application</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Application Number</th>
                <th>Business Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->appID }}</td>
                    <td>{{ $application->bizName }}</td>
                    <td>{{ $application->appStatus }}</td>
                    <td style="display: flex; gap: 10px;">
                        <form action="{{ route('applications.delete', $application->appID) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                        <a href="{{ route('applications.edit', $application->appID) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('applications.show', $application->appID) }}" class="btn btn-info"><i class="fas fa-eye"></i> View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tr>
            <td colspan="4" class="text-right">
                <a href="{{ route('applications.create') }}" class="btn btn-success">Add New Application</a>
            </td>
        </tr>
    </table>
</div>
@endsection
