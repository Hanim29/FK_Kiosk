@extends('index')
@section('content')

<!-- Dashboard content -->

{{-- <div class="card">
    <h2>DASHBOARD</h2>
</div> --}}

<!-- Complaints card -->
<div class="container">

        <h2 class="mt-3">List of complaint</h2>
        @foreach ($complaints as $complaint)
        <a href="{{route('complaint.show', $complaint->id) }}" class="text-decoration-none text-reset">
            <div class="card mb-3">
                <div class="card-body">
                <p>{{ $complaint->title }}</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('complaint.edit', $complaint->id) }}" class="btn btn-primary me-2">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="{{ route('complaint.destroy', $complaint->id) }}" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </a>
                </div>
                </div>
            </div>
        </a>
    @endforeach


    <a class="btn btn-danger mt-3" href="{{ route('complaint.create') }}">ADD COMPLAINT</a>
</div>

@endsection
