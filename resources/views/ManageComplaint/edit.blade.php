
    @extends('index')
    @section('content')

      <div class="container text-center mt-3">
        <h1>Edit Complaint</h1>
        <form action="{{ route('complaint.store') }}" method="POST">
            @csrf
            @method('POST')
          <div class="row">
            <div class="col">

              <div class="mb-3">
                <input type="text" class="form-control" id="title" name="title" placeholder="TITLE OF COMPLAINTS" style="width:100%">
              </div>

              <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="NAME" style="width:100%">
              </div>

              <div class="mb-3">
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="PHONE NUMBER" style="width:100%">
              </div>

              <div class="mb-3">
                <input type="text" class="form-control" id="email" name="email" placeholder="EMAIL" style="width100%">
              </div>

              <div class="mb-3">
                <input type="date" class="form-control" id="date" name="date" placeholder="DATE" style="width:100%">
              </div>

              <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%;">
                    KIOSK NUMBER
                  </button>
                  <ul class="dropdown-menu" style="width: 100%;">
                    <li><a class="dropdown-item" href="#">1</a></li>
                    <li><a class="dropdown-item" href="#">2</a></li>
                    <li><a class="dropdown-item" href="#">3</a></li>
                    <li><a class="dropdown-item" href="#">4</a></li>
                    <li><a class="dropdown-item" href="#">5</a></li>
                  </ul>
              </div>

              <div class="dropdown" style="padding-top: 1%; margin-bottom:1%">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%;">
                    TYPE OF MAINTENANCE
                  </button>
                  <ul class="dropdown-menu" style="width: 100%;">
                    <li><a class="dropdown-item" href="#">Kiosk Application</a></li>
                    <li><a class="dropdown-item" href="#">Kiosk Payment</a></li>
                    <li><a class="dropdown-item" href="#">Report</a></li>
                    <li><a class="dropdown-item" href="#">Personal Account</a></li>
                    <li><a class="dropdown-item" href="#">Others</a></li>
                  </ul>
              </div>

              <br>

              <div class="container text-center">
                <div class="row">
                  <div class="col">
                    <button type="button" class="btn btn-danger" style="width: 100%; padding-top: 1%; margin-bottom:1%" >Add Photo
                        <i class ="fa fa-camera"></i>
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <div class="col">

                <div class="mb-3">
                    <textarea class="form-control" name="complaint_description" placeholder="COMPLAINT DESCRIPTIONS" rows="3" style="width: 100%; height: 325px;"></textarea>
                </div>

                    <div class="col">
                      <button type="submit" class="btn btn-danger">SUBMIT</button>
                    </div>
                  </div>
              </div>

            </div>
          </div>
        </form>
      </div>

      <!-- Details Modal -->
      <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="detailsModalLabel">Complaint Details</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('complaint.update', 99) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Copy the editable display code here -->
                <div class="mb-3">
                  <label for="title" class="form-label">Title of Complaints:</label>
                  <input type="text" class="form-control" id="title" name="title" value="Sample Complaint Title">
                </div>

                <div class="mb-3">
                  <label for="name" class="form-label">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" value="John Doe">
                </div>

                <div class="mb-3">
                  <label for="phone_number" class="form-label">Phone Number:</label>
                  <input type="text" class="form-control" id="phone_number" name="phone_number" value="123-456-7890">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email:</label>
                  <input type="text" class="form-control" id="email" name="email" value="john.doe@example.com">
                </div>

                <div class="mb-3">
                  <label for="date" class="form-label">Date:</label>
                  <input type="date" class="form-control" id="date" name="date" value="2024-01-06">
                </div>

                <div class="mb-3">
                  <label for="kiosk_number" class="form-label">Kiosk Number:</label>
                  <input type="text" class="form-control" id="kiosk_number" name="kiosk_number" value="3">
                </div>

                <div class="mb-3">
                  <label for="maintenance_type" class="form-label">Type of Maintenance:</label>
                  <input type="text" class="form-control" id="maintenance_type" name="maintenance_type" value="Report">
                </div>
                <div class="mb-3">
                  <label for="complaint_description" class="form-label">Complaint Descriptions:</label>
                  <textarea class="form-control" id="complaint_description" name="complaint_description" rows="5">Sample complaint descriptions go here.</textarea>
                </div>

                <div class="mb-3">
                  <label for="photo_display" class="form-label">Photos:</label>
                  <div>
                    <!-- Add logic to display uploaded photos here -->
                    <!-- Example: <img src="path/to/photo.jpg" alt="Complaint Photo"> -->
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    @endsection
</body>
</html>
