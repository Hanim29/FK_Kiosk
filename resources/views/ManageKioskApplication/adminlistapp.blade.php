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
                        <a href="{{ route('applications.approve', $application->appID) }}" class="btn btn-info"><i class="fas fa-eye"></i> View</a>

            
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
