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
                @foreach($applications as $applications)
                    <tr>
                     <td>{{ $applications->appID }}</td>
                     <td>{{ $applications->bizName }}</td>
                     <td>{{ $applications->appStatus }}</td>
                     <td>
                     <form action="{{route('applications.delete', $applications->appID)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
                            </form>
                     </td>
                     <td><a href="{{route('applications.edit', $applications->appID)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
<tr>

        <td><a href = "{{route('applications.create') }}" class="btn btn-success">Add New Application</a></td>
        </tr>  </table>
        
    </div>
@endsection