
    @extends('index')
    @section('content')

      <div class="container text-center mt-3">
        <h1>Edit Complaint</h1>
        <form action="{{ route('complaint.update',$complaint->id) }}" method="POST">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="title" class="form-label">Title of Complaints:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{$complaint->title}}">
                  </div>

              {{-- <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="NAME" style="width:100%">
              </div>

              <div class="mb-3">
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="PHONE NUMBER" style="width:100%">
              </div>

              <div class="mb-3">
                <input type="text" class="form-control" id="email" name="email" placeholder="EMAIL" style="width100%">
              </div> --}}

              <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="text" class="form-control" name="date" id="date" value="{{$complaint->created_at}}">
              </div>

              <select name="kiosk_number" class="form-select mt-3">
                @foreach(range(1, 5) as $y)
                <option value="{{$y}}" {{ $complaint->kiosk_number == $y ? 'selected' : '' }}>{{$y}}</option>
                @endforeach
            </select>

            <select name="type_maintenance" class="form-select mt-3" aria-label="Default select example">
                <option value="{{ App\Models\Complaint::TYPE_KIOSK_APPLICATION }}" {{ $complaint->maintainance_type ==  App\Models\Complaint::TYPE_KIOSK_APPLICATION ? 'selected' : ''}}>{{ App\Models\Complaint::TYPE_KIOSK_APPLICATION}}</option>
                <option value="{{ App\Models\Complaint::TYPE_KIOSK_PAYMENT }}" {{ $complaint->maintainance_type ==  App\Models\Complaint::TYPE_KIOSK_PAYMENT ? 'selected' : ''}}>{{ App\Models\Complaint::TYPE_KIOSK_PAYMENT}}</option>
                <option value="{{ App\Models\Complaint::TYPE_REPORT }}" {{ $complaint->maintainance_type ==  App\Models\Complaint::TYPE_REPORT ? 'selected' : ''}}>{{ App\Models\Complaint::TYPE_REPORT}}</option>
                <option value="{{ App\Models\Complaint::TYPE_PERSONAL_ACCOUNT }}" {{ $complaint->maintainance_type ==  App\Models\Complaint::TYPE_PERSONAL_ACCOUNT ? 'selected' : ''}}>{{ App\Models\Complaint::TYPE_PERSONAL_ACCOUNT}}</option>
                <option value="{{ App\Models\Complaint::TYPE_OTHERS }}" {{ $complaint->maintainance_type ==  App\Models\Complaint::TYPE_OTHERS ? 'selected' : ''}}>{{ App\Models\Complaint::TYPE_OTHERS}}</option>
            </select>


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
                    <label for="complaint_description" class="form-label">Complaint Descriptions:</label>
                    <textarea class="form-control" name="description" class="complaint_description" rows="5" >{{$complaint->description}}</textarea>
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

      </div>

    @endsection
</body>
</html>
