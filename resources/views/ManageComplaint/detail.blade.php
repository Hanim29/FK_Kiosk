    @extends('index')
    @section('content')

      <div class="container text-center mt-3">
        <h1>Complaint Details</h1>

        <!-- Display Complaint Details -->
        <div class="row">
          <div class="col">

            <!-- Title of Complaints -->
            <div class="mb-3">
              <label for="title" class="form-label">Title of Complaints:</label>
              <input type="text" class="form-control" id="title" value="{{$complaint->title}}" readonly>
            </div>

            {{-- <!-- Name -->
            <div class="mb-3">
              <label for="name" class="form-label">Name:</label>
              <input type="text" class="form-control" id="name" value="John Doe" readonly>
            </div> --}}

            <!-- Phone Number -->
            {{-- <div class="mb-3">
              <label for="phone_number" class="form-label">Phone Number:</label>
              <input type="text" class="form-control" id="phone_number" value="123-456-7890" readonly>
            </div> --}}

            <!-- Email -->
            {{-- <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="text" class="form-control" id="email" value="john.doe@example.com" readonly>
            </div> --}}

            <!-- Date -->
            <div class="mb-3">
              <label for="date" class="form-label">Date:</label>
              <input type="text" class="form-control" id="date" value="{{$complaint->created_at}}" readonly>
            </div>

            <!-- Kiosk Number -->
            <div class="mb-3">
              <label for="kiosk_number" class="form-label">Kiosk Number:</label>
              <input type="text" class="form-control" id="kiosk_number" value="{{$complaint->kiosk_number}}" readonly>
            </div>

            <!-- Type of Maintenance -->
            <div class="mb-3">
              <label for="maintenance_type" class="form-label">Type of Maintenance:</label>
              <input type="text" class="form-control" id="maintenance_type" value="{{$complaint->maintainance_type}}" readonly>
            </div>

          </div>
          <div class="col">

            <!-- Complaint Descriptions Textarea -->
            <div class="mb-3">
              <label for="complaint_description" class="form-label">Complaint Descriptions:</label>
              <textarea class="form-control" id="complaint_description" rows="5" readonly>{{$complaint->description}}</textarea>
            </div>

            <!-- Photo Display (Add logic to display uploaded photos) -->
            <div class="mb-3">
              <label for="photo_display" class="form-label">Photos:</label>
              <div>
                <img src="{{asset('storage/photos/' . $complaint->image_path);}}" alt="">
             <!-- Example: <img src="path/to/photo.jpg" alt="Complaint Photo"> -->
              </div>
            </div>

          </div>
        </div>

        <!-- Back Button -->
        <div class="container text-center">
          <div class="row">
            <div class="col">
              <a href="{{ route('complaint.index') }}" class="btn btn-secondary">Back</a>
            </div>
          </div>
        </div>

      </div>

    @endsection
