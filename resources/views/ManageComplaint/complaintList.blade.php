@extends('index')
@section('content')

<!-- Dashboard content -->

{{-- <div class="card">
    <h2>DASHBOARD</h2>
</div> --}}

<!-- Complaints card -->
<div class="container">
    <h2 class="mt-3">List of complaint</h2>

    <div class="card m-2">
        <div class="card-body">
            Complaint Title #1


        </div>
    </div>
    <div class="card m-2">
        <div class="card-body">
            Complaint Title #2
        </div>
    </div>
    <div class="card m-2">
    <div class="row">
        <div class="col">
            <div class="card-body">
                Complaint Title #3
            </div>
        </div>
        <div class="col">
            <a href="#" class="btn"><i class ="fa fa-camera"></i></a>
        </div>
    </div>
    </div>


    <a class="btn btn-danger mt-3" href="{{ route('complaint.create') }}">ADD COMPLAINT</a>
</div>

@endsection
