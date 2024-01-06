@extends('index')
@section('content')

<!-- Dashboard content -->

{{-- <div class="card">
    <h2>DASHBOARD</h2>
</div> --}}

<!-- Complaints card -->
<div class="container">

    <h2 class="mt-3">List of complaint</h2>

    <a href="{{route('complaint.show', 99) }}" class="text-decoration-none text-reset">
        <div class="card mb-3">
            <div class="card-body">
              <p>Complaint #1</p>
              <div class="d-flex justify-content-end">
                <a href="{{ route('complaint.edit', 99) }}" class="btn btn-primary me-2">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <a href="{{ route('complaint.destroy', 99) }}" onclick="alert('Are you sure you want to delete?')" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
              </div>
            </div>
        </div>
    </a>

    <a href="{{route('complaint.show', 99) }}" class="text-decoration-none text-reset">
        <div class="card mb-3">
            <div class="card-body">
              <p>Complaint #2</p>
              <div class="d-flex justify-content-end">
                <a href="{{ route('complaint.edit', 99) }}" class="btn btn-primary me-2">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <a href="{{ route('complaint.destroy', 99) }}" onclick="alert('Are you sure you want to delete?')" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
              </div>
            </div>
        </div>
    </a>


    <a class="btn btn-danger mt-3" href="{{ route('complaint.create') }}">ADD COMPLAINT</a>
</div>

@endsection
