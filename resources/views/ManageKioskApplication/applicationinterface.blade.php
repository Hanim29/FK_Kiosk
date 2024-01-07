@extends('index')
@section('content')
<div class="container">
        <h1>List of Application</h1>
        <table class="table">
            <thead>
                <tr>
                     <th>Application Number</th>
                     <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $applications)
                    <tr>
                     <td>{{ $applications->appID }}</td>
                     <td>{{ $applications->appStatus }}</td>
                     <td>
                     <form action="{{route('applications.delete', $applications->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                     </td>
                     <td><a href="{{route('applications.edit', $applications->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
<tr>

        <td><a href = "{{route('applications.create') }}" class="btn btn-success">Add New Application</a></td>
        </tr>  </table>
        
    </div>
@endsection